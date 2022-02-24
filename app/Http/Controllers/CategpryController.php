<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategpryRequest;
use App\Http\Requests\UpdateCategpryRequest;
use App\Models\Categpry;

class CategpryController extends Controller
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
     * @param  \App\Http\Requests\StoreCategpryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategpryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categpry  $categpry
     * @return \Illuminate\Http\Response
     */
    public function show(Categpry $categpry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categpry  $categpry
     * @return \Illuminate\Http\Response
     */
    public function edit(Categpry $categpry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategpryRequest  $request
     * @param  \App\Models\Categpry  $categpry
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategpryRequest $request, Categpry $categpry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categpry  $categpry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categpry $categpry)
    {
        //
    }
}
