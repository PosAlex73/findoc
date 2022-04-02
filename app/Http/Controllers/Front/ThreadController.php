<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Threads\StoreThreadMessageRequest;
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

    public function newMessage(StoreThreadMessageRequest $request, User $user)
    {
        $fields = $request->get('message');
        $fields['thread_id'] = $user->thread->id;
        ThreadMessage::create($fields);

        return redirect()->to('front.thread');
    }
}
