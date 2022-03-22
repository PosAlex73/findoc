<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSpecServiceRequest;
use App\Http\Requests\UpdateSpecServiceRequest;
use App\Models\SpecService;

class SpecServiceController extends Controller
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
     * @param  \App\Http\Requests\StoreSpecServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpecServiceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SpecService  $specService
     * @return \Illuminate\Http\Response
     */
    public function show(SpecService $specService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SpecService  $specService
     * @return \Illuminate\Http\Response
     */
    public function edit(SpecService $specService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSpecServiceRequest  $request
     * @param  \App\Models\SpecService  $specService
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpecServiceRequest $request, SpecService $specService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SpecService  $specService
     * @return \Illuminate\Http\Response
     */
    public function destroy(SpecService $specService)
    {
        //
    }
}
