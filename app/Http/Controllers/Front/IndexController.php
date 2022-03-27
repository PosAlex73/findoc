<?php

namespace App\Http\Controllers\Front;

use App\Enums\BlogStatuses;
use App\Enums\CommonStatuses;
use App\Enums\Promo\PromoStatuses;
use App\Enums\Settings\SettingTypes;
use App\Enums\Specs\ClinicStatuses;
use App\Enums\Specs\SpecStatuses;
use App\Facades\Set;
use App\Filters\Filter;
use App\Filters\Front\Clinics;
use App\Filters\Front\Doctors;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Clinic;
use App\Models\Promotion;
use App\Models\Spec;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use PhpParser\Comment\Doc;

class IndexController extends Controller
{
    public function index()
    {
        $clinics = Clinic::where(
            ['status' => ClinicStatuses::ACTIVE,])
            ->limit(10)
            ->get(['id', 'title']);

        $categories = Category::where(['status' => CommonStatuses::ACTIVE])
            ->limit(10)
            ->get(['id', 'title']);

        $doctors = Spec::where(['spec_status' => SpecStatuses::ACTIVE])
            ->limit(5)
            ->get();

        return view('front.views.index',
            ['clinics_list' => $clinics, 'categories_list' => $categories, 'doctors_list' => $doctors]
        );
    }

    public function services()
    {
        $categories = Category::where(['status' => CommonStatuses::ACTIVE])->get();

        return view('front.views.services.list',
            ['categories' => $categories]
        );
    }

    public function doctors()
    {
        $doctors = Spec::paginate(Set::get(SettingTypes::FRONT_PAGINATION));

        return view('front.views.doctors.list', [
            'doctors' => $doctors
        ]);
    }

    public function clinics()
    {
        $clinics = Clinic::paginate(Set::get(SettingTypes::FRONT_PAGINATION));

        return view('front.views.clinics.list', [
            'clinics' => $clinics
        ]);
    }

    public function promotions()
    {
        $promotions = Promotion::where(['status' => PromoStatuses::ACTIVE])
            ->paginate(Set::get(SettingTypes::FRONT_PAGINATION));

        return view('front.views.promotions.list', [
            'promotions' => $promotions
        ]);
    }

    public function articles()
    {
        $articles = Blog::where(['status' => BlogStatuses::ACTIVE])->paginate(Set::get(SettingTypes::FRONT_PAGINATION));
        $recent_articles = Blog::where(['status' => BlogStatuses::ACTIVE])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('front.views.articles.list', [
            'articles' => $articles,
            'recent_articles' => $recent_articles
        ]);
    }

    public function search(Request $request)
    {
        $type = $request->has('radio_search') ? $request->get('radio_search') : Filter::SEARCH;

        if ($type === Filter::SEARCH) {
            $doctors = (new Doctors(Spec::class))->getItemsForSearch($request);
            $clinics = (new Clinics(Clinic::class))->getItemsForSearch($request);
        } elseif ($type === Doctors::SEARCH) {
            $doctors = (new Doctors(Spec::class))->getItemsForSearch($request);
        } elseif ($type === Clinics::SEARCH) {
            $clinics = (new Clinics(Clinics::SEARCH))->getItemsForSearch($request);
        } else {
            redirect()->to('front.doctors');
        }

        return view('front.views.search.list', [
           'doctors' => $doctors ?? new Collection(),
           'clinics' => $clinics ?? new Collection()
        ]);
    }
}
