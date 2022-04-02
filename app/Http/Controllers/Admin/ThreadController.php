<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Threads\UpdateThreadRequest;
use App\Models\Thread;
use App\Models\User;

class ThreadController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $thread = $user->thread;

        return view('admin.views.users.edit', ['thread' => $thread, 'user' => $user]);
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

        return redirect()->to(route('threads.edit'));
    }
}
