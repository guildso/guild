<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Notification;

class NotificationSent
{
    use Dispatchable, InteractsWithSockets;

    public $notification;
    public $body;
    public $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Notification $notification, $body)
    {
        $this->notification = $notification;
        $this->body         = $body;
        $this->user         = auth()->user();
    }
}
