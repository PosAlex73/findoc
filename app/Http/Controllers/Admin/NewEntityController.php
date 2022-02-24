<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewEntityRequest;
use App\Http\Requests\UpdateNewEntityRequest;
use App\Models\NewEntity;

class NewEntityController extends Controller
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
     * @param  \App\Http\Requests\StoreNewEntityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewEntityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewEntity  $newEntity
     * @return \Illuminate\Http\Response
     */
    public function show(NewEntity $newEntity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewEntity  $newEntity
     * @return \Illuminate\Http\Response
     */
    public function edit(NewEntity $newEntity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNewEntityRequest  $request
     * @param  \App\Models\NewEntity  $newEntity
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewEntityRequest $request, NewEntity $newEntity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewEntity  $newEntity
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewEntity $newEntity)
    {
        //
    }
}
