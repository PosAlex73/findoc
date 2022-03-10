<?php

namespace App\Http\Controllers\Admin;
use App\Enums\Settings\SettingTypes;
use App\Events\Blog\ArticlePublished;
use App\Events\Users\NewPublished;
use App\Facades\Set;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\StoreBlogRequest;
use App\Http\Requests\Blog\UpdateBlogRequest;
use App\Models\Blog;
use Illuminate\Support\Facades\Event;

class BlogController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Blog::paginate(Set::get(SettingTypes::ADMIN_PAGINATION));

        return view('admin.views.blog.list', [
            'articles' => $articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.views.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Blog\StoreBlogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        $fields = $request->safe()->only(['title', 'text', 'image', 'status', 'category_id']);
        $article = Blog::create($fields);

        $request->sassion()->flash('status', __('vars.article_was_created'));
        Event::dispatch(new ArticlePublished($article));

        return redirect()->to(route('blogs.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.views.blog.edit', [
            'article' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Blog\UpdateBlogRequest  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $fields = $request->safe()->only(['title', 'text', 'image', 'status', 'category_id']);
        $blog->update($fields);

        $request->session()->flash('status', __('vars.articles_was_updated'));

        return redirect()->to(route('blogs.edit', ['blog' => $blog]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        Blog::destroy($blog->id);
        request()->session()->flash('status', __('vars.articles_was_deleted'));

        return redirect()->to(route('blogs.index'));
    }
}
