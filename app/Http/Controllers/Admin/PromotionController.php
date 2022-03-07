<?php

namespace App\Http\Controllers\Admin;
use App\Enums\Settings\SettingTypes;
use App\Facades\Set;
use App\Http\Controllers\Controller;
use App\Http\Requests\Promotions\StorePromotionRequest;
use App\Http\Requests\Promotions\UpdatePromotionRequest;
use App\Models\Promotion;

class PromotionController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = Promotion::paginate(Set::get(SettingTypes::ADMIN_PAGINATION));

        return view('admin.views.promotions.list', ['promotions' => $promotions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.views.promotions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Promotions\StorePromotionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePromotionRequest $request)
    {
        $fields = $request->safe()->only(['title', 'description', 'status']);
        $promotion = Promotion::create($fields);

        $request->session()->flash('status', __('vars.promotion_was_created'));

        return redirect()->to('promotions.edit', ['promotion' => $promotion]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion)
    {
        return view('admin.views.promotions.edit', ['promotion' => $promotion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Promotions\UpdatePromotionRequest  $request
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePromotionRequest $request, Promotion $promotion)
    {
        $fields = $request->safe()->only(['title', 'description', 'status']);
        $promotion->update($fields);

        $request->session()->flash('status', __('vars.promotion_was_created'));

        return redirect()->to('promotions.edit', ['promotion' => $promotion]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        Promotion::destroy($promotion->id);

        request()->session()->flash('status', __('vars.promotion_was_deleted'));

        return redirect()->to('promotions.index');
    }
}
