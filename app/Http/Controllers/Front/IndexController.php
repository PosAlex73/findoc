<?php

namespace App\Http\Controllers\Front;

use App\Enums\Settings\SettingTypes;
use App\Facades\Set;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Clinic;
use App\Models\Promotion;
use App\Models\Spec;
use App\Settings\Settings;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('front.views.index');
    }

    public function services()
    {
        $services = Settings::paginate(Set::get(SettingTypes::FRONT_PAGINATION));

        return view('front.pages.services.list', [
            'services' => $services
        ]);
    }

    public function doctors()
    {
        $doctors = Spec::paginate(Set::get(SettingTypes::FRONT_PAGINATION));

        return view('front.views.services.list', [
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
        $promotions = Promotion::paginate(Set::get(SettingTypes::FRONT_PAGINATION));

        return view('front.views.promotions.list', [
            'promotions' => $promotions
        ]);
    }

    public function articles()
    {
        $articles = Blog::paginate(Set::get(SettingTypes::FRONT_PAGINATION));

        return view('front.views.articles.list', [
            $articles => $articles
        ]);
    }
}
