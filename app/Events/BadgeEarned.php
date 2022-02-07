<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Badge;

class BadgeEarned
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $badge;
    public $user;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Badge $badge)
    {
        $this->badge = $badge;
        $this->user = auth()->user();
    }
}
