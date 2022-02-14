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

    public function request()
    {

        if(auth()->user()->availablePayout() <= 0) {
            $this->dispatchBrowserEvent('notification', ['type' => 'warning', 'message' => 'You do not have enough points!']);
            return;
        }

        if(is_null($this->solWallet)) {
            $this->dispatchBrowserEvent('notification', ['type' => 'warning', 'message' => 'Please set your SolWallet!']);
            return;
        }

        $airdrop = new \App\Models\Airdrop;
        $airdrop->user_id = auth()->user()->id;
        $airdrop->team_id = auth()->user()->currentTeam->id;
        $airdrop->status = 'requested';
        $airdrop->wallet = $this->solWallet;
        $airdrop->amount = auth()->user()->availablePayout();

        if(auth()->user()->airdrops()->where('status', 'requested')->exists()) {
            $this->dispatchBrowserEvent('notification', ['type' => 'success', 'message' => 'Airdrop already requested!']);
            return;
        }

        $airdrop->save();
        $this->dispatchBrowserEvent('notification', ['type' => 'success', 'message' => 'Airdrop requested successfully!']);
        $this->emit('refreshAirdrops');

    }

    public function render()
    {

        return view('livewire.airdrop');
    }
}
