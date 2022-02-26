<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSpecReviewRequest;
use App\Http\Requests\UpdateSpecReviewRequest;
use App\Models\SpecReview;

class SpecReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSpecReviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpecReviewRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SpecReview  $specReview
     * @return \Illuminate\Http\Response
     */
    public function show(SpecReview $specReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SpecReview  $specReview
     * @return \Illuminate\Http\Response
     */
    public function edit(SpecReview $specReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSpecReviewRequest  $request
     * @param  \App\Models\SpecReview  $specReview
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpecReviewRequest $request, SpecReview $specReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SpecReview  $specReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(SpecReview $specReview)
    {
        //
    }
}
