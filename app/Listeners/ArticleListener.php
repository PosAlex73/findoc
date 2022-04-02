<?php

namespace App\Listeners;

use App\Enums\User\UserTypes;
use App\Events\Blog\ArticlePublished;
use App\Models\User;
use Illuminate\Support\Facades\Notification;

class ArticleListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ArticlePublished $event)
    {
        $article = $event->article;
        $this->notifyUsers($article);
    }

    private function notifyUsers($article)
    {
        $users = User::where('type', UserTypes::SIMPLE)->get();

        /** @var User $user $user */
        Notification::send($users, new \App\Notifications\ArticlePublished($article));
    }
}
