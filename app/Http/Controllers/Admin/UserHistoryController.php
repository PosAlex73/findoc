<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserHistoryRequest;
use App\Http\Requests\UpdateUserHistoryRequest;
use App\Models\UserHistory;

class UserHistoryController extends Controller
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
     * @param  \App\Http\Requests\StoreUserHistoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserHistoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserHistory  $userHistory
     * @return \Illuminate\Http\Response
     */
    public function show(UserHistory $userHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserHistory  $userHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(UserHistory $userHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserHistoryRequest  $request
     * @param  \App\Models\UserHistory  $userHistory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserHistoryRequest $request, UserHistory $userHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserHistory  $userHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserHistory $userHistory)
    {
        //
    }
}
