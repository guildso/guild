<?php

namespace App\Listeners\Badges;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AwardUserBadge
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
    public function handle($event)
    {
        // And the user does not already have this badge
        if(!$event->user->hasBadge( $event->badge->id ) ){
            // Then, award the user this badge
            $event->user->awardBadge( $event->badge->id );
        }
    }
}
