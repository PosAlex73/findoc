<?php

namespace App\Http\Controllers\Admin;

use App\Enums\MessageStatuses;
use App\Enums\User\MessageOwner;
use App\Http\Requests\Threads\StoreThreadMessageRequest;
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
        $messages = $thread->messages;

        return view('admin.views.users.thread',
            ['thread' => $thread, 'user' => $user, 'messages' => $messages]
        );
    }

    public function createMessage(StoreThreadMessageRequest $request, Thread $thread)
    {
        $fields = $request->safe()->only(['message']);
        $thread->messages()->create([
            'user_id' => $thread->user->id,
            'owner' => MessageOwner::ADMIN,
            'status' => MessageStatuses::UNREAD,
            'message' => $fields['message']
        ]);

        $request->session()->flash('status', __('vars.message_was_add'));

        return redirect()->to('users.edit', ['user' => $thread->user]);
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
