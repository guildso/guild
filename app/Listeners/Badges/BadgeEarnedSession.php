<?php

namespace App\Listeners\Badges;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\BadgeEarned;

class BadgeEarnedSession
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
    public function handle(BadgeEarned $event)
    {
        // If the user is not a guest
        if(!auth()->guest()){
            // And the user does not already have this badge
            if(!auth()->user()->hasBadge( $event->badge->slug ) ){
                // Only set the session if the user being awarded the badge is the authenticated user
                if( auth()->user()->id == $event->user->id ){
                    \Session::put('badge_earned', json_encode($event->badge->toArray()));
                }
            }
        }
    }
}
