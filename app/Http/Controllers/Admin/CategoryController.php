<?php

namespace App\Http\Controllers\Admin;
use App\Enums\Settings\SettingTypes;
use App\Facades\Set;
use App\Http\Requests\Services\StoreCategoryRequest;
use App\Http\Requests\Services\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(Set::get(SettingTypes::ADMIN_PAGINATION));

        return view('admin.views.categories.list', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.views.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Services\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $fields = $request->safe()->only(['title', 'description', 'status']);
        $category = Category::create($fields);

        $request->session()->flash('status', __('vars.category_was_created'));

        return redirect()->to(route('categories.edit', ['category' => $category]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.views.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Services\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $fields = $request->safe()->only(['title', 'description', 'status']);
        $category->update($fields);

        $request->session()->flash('status', __('vars.category_was_updated'));

        return redirect()->to(route('categories.edit', ['category' => $category]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);

        request()->session()->flash('status', __('vars.category_was_deleted'));

        return redirect()->to(route('categories.index'));
    }

    public function massDelete(Request $request)
    {
        $ids = $request->get('clinics');
        Category::destroy($ids);
        $request->session()->flash('status', __('vars.categories_were_deleted'));

        return redirect()->to(route('categories.index'));
    }
}
