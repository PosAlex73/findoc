<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Threads\UpdateThreadRequest;
use App\Models\Thread;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        return view('admin.views.threads.edit', ['thread' => $thread]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Threads\UpdateThreadRequest  $request
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateThreadRequest $request, Thread $thread)
    {
        $fields = $request->safe()->only(['status']);
        $thread->update($fields);

        $request->session()->flash('status', __('vars.thread_was_updated'));

        return redirect()->to('threads.edit');
    }
}
