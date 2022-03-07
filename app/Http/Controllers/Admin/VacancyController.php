<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Settings\SettingTypes;
use App\Facades\Set;
use App\Http\Requests\Vacancies\StoreVacancyRequest;
use App\Http\Requests\Vacancies\UpdateVacancyRequest;
use App\Models\Vacancy;

class VacancyController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacancies = Vacancy::paginate(Set::get(SettingTypes::ADMIN_PAGINATION));

        return view('admin.views.vacancies.list', ['vacancies' => $vacancies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.views.vacancies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Vacancies\StoreVacancyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVacancyRequest $request)
    {
        $fields = $request->safe()->only(['title', 'text', 'category_id', 'status']);
        $vacancy = Vacancy::create($fields);

        $request->session()->flash('status', __('vars.vacancy_was_created'));

        return redirect()->to('vacancies.edit', ['vacancy' => $vacancy]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function show(Vacancy $vacancy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacancy $vacancy)
    {
        return view('admin.views.vacancies.edit', ['category' => $vacancy]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Vacancies\UpdateVacancyRequest  $request
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVacancyRequest $request, Vacancy $vacancy)
    {
        $fields = $request->safe()->only(['title', 'text', 'category_id', 'status']);
        $vacancy->update($fields);

        $request->session()->flash('status', __('vars.vacancy_was_updated'));

        return redirect()->to('vacancies.edit', ['vacancy' => $vacancy]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacancy $vacancy)
    {
        Vacancy::destroy($vacancy->id);

        request()->session()->flash('status', __('vars.vacancy_was_deleted'));

        return redirect()->to('vacancies.index');
    }
}
