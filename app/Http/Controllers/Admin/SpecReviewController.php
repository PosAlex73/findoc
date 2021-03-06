<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSpecReviewRequest;
use App\Http\Requests\UpdateSpecReviewRequest;
use App\Models\SpecReview;
use Illuminate\Http\Request;

class SpecReviewController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.views.spec_reviews.list');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSpecReviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpecReviewRequest $request)
    {
        $fields = $request->safe()->only(['user_id', 'type', 'rating', 'text']);
        SpecReview::create($fields);

        return redirect()->to(route('spec_reviews.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SpecReview  $specReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(SpecReview $specReview)
    {
        SpecReview::destroy($specReview->id);

        return redirect()->to(route('spec_reviews.index'));
    }

    public function massDelete(Request $request)
    {
        $ids = $request->get('reviews');
        SpecReview::destroy($ids);

        $request->session()->flash('status', __('vars.reviews_were_deleted'));

        return redirect()->to(route('spec_reviews.index'));
    }
}
