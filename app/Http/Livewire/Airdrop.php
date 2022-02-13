<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Airdrop extends Component
{
    public $points;
    public $payout;
    public $solWallet;
    public $solBalance;

    protected $listeners = [
        'getSolWallet' => 'getSolWallet',
        'getSolBalance' => 'getSolBalance',
    ];

    public function getSolWallet($value)
    {
        if(!is_null($value)) {
            $this->solWallet = $value;
        }
    }

    public function getSolBalance($value)
    {
        if(!is_null($value)) {
            $this->solBalance = $value;
        }
    }

    public function render()
    {

        return view('livewire.airdrop');
    }
}
