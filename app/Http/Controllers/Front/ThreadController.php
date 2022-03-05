<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Threads\StoreThreadMessageRequest;
use App\Models\ThreadMessage;
use App\Models\User;

class ThreadController extends Controller
{
    public function thread()
    {
        return view('front.views.threads.view');
    }

    public function newMessage(StoreThreadMessageRequest $request, User $user)
    {
        $fields = $request->get('message');
        $fields['thread_id'] = $user->thread->id;
        ThreadMessage::create($fields);

        return redirect()->to('front.thread');
    }
}
