<?php

namespace App\Subscribers;

use App\Events\UserRecordDeleted;
use App\Events\UserRecordUpdated;
use App\Events\Users\UserRecordedCreated;

class UserRecordSubscriber
{
    public function userRecordCreated($event)
    {

    }

    public function userRecordUpdated($event)
    {

    }

    public function userRecordDeleted($event)
    {

    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     * @return void
     */
    public function subscribe($events)
    {
        $events->listen(
            UserRecordedCreated::class,
            [__CLASS__, 'userRecordCreated']
        );

        $events->listen(
            UserRecordUpdated::class,
            [__CLASS__, 'userRecordUpdated']
        );

        $events->listen(
            UserRecordDeleted::class,
            [__CLASS__, 'userRecordDeleted']
        );
    }
}
