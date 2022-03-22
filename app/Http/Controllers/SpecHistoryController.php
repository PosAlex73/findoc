<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSpecHistoryRequest;
use App\Http\Requests\UpdateSpecHistoryRequest;
use App\Models\SpecHistory;

class SpecHistoryController extends Controller
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
     * @param  \App\Http\Requests\StoreSpecHistoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpecHistoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SpecHistory  $specHistory
     * @return \Illuminate\Http\Response
     */
    public function show(SpecHistory $specHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SpecHistory  $specHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(SpecHistory $specHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSpecHistoryRequest  $request
     * @param  \App\Models\SpecHistory  $specHistory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpecHistoryRequest $request, SpecHistory $specHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SpecHistory  $specHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SpecHistory $specHistory)
    {
        //
    }
}
