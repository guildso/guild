<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CheckUserBadges extends Component
{
    public $badge;

    public function render()
    {
        \App\Models\Badge::checkIfUserEarnedBadge();
        if(\Session::get('badge_earned')){
            $this->badge = collect(json_decode(\Session::get('badge_earned')));
        }
        return view('livewire.check-user-badges');
    }
}
