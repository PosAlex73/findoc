<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSpecRequest;
use App\Http\Requests\UpdateSpecRequest;
use App\Models\Spec;

class SpecController extends Controller
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
     * @param  \App\Http\Requests\StoreSpecRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpecRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spec  $spec
     * @return \Illuminate\Http\Response
     */
    public function show(Spec $spec)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spec  $spec
     * @return \Illuminate\Http\Response
     */
    public function edit(Spec $spec)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSpecRequest  $request
     * @param  \App\Models\Spec  $spec
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpecRequest $request, Spec $spec)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spec  $spec
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spec $spec)
    {
        //
    }
}
