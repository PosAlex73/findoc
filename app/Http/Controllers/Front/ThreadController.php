<?php

namespace App\Http\Controllers\Front;

use App\Enums\MessageStatuses;
use App\Enums\User\MessageOwner;
use App\Http\Controllers\Controller;
use App\Http\Requests\Threads\StoreThreadMessageRequest;
use App\Models\Thread;
use App\Models\ThreadMessage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{
    public function thread()
    {
        $thread = Auth::user()->thread;
        $messages = $thread->messages;

        return view('front.views.profile.index',
            [
                'thread' => $thread,
                'messages' => $messages
            ]
        );
    }

    /**
     * Generates new message
     *
     * @param StoreThreadMessageRequest $request
     * @param Thread $thread
     * @return \Illuminate\Http\RedirectResponse
     */
    public function newMessage(StoreThreadMessageRequest $request, Thread $thread)
    {
        $fields = $request->safe()->only(['message']);
        $thread->messages()->create([
            'user_id' => $thread->user->id,
            'message' => $fields['message'],
            'owner' => MessageOwner::USER,
            'status' => MessageStatuses::UNREAD
        ]);

        $request->session()->flash('status', __('vars.message_was_created'));

        return redirect()->to(route('front.thread'));
    }
}
