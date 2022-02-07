<?php

namespace App\Listeners\Notifications;

use App\Events\NotificationSent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SlackNotification
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
     * @param  NotificationSent  $event
     * @return void
     */
    public function handle(NotificationSent $event)
    {
        $event->notification->slackNotification($event->body['title'], $event->body['description'], $event->user);
    }
}
