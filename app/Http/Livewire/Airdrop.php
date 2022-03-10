<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Artisan;
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
        $airdrop->status = 'processing';
        $airdrop->wallet = $this->solWallet;
        $airdrop->amount = auth()->user()->availablePayout();

        $airdrop->save();

        Artisan::call('solana:approve', [
            'token' => env('SOLANA_TOKEN_ADDRESS'),
            'recipient' => $airdrop->wallet,
            'amount' => $airdrop->amount,
            'id' => $airdrop->id,
        ]);

        $airdrop->user->airdrop += $airdrop->amount;

        $airdrop->save();
        $airdrop->user->save();

        if(auth()->user()->airdrops()->where('status', 'processing')->exists()) {
            $this->dispatchBrowserEvent('notification', ['type' => 'success', 'message' => 'Airdrop already requested!']);
            return;
        }

        $airdrop->save();
        $this->dispatchBrowserEvent('notification', ['type' => 'success', 'message' => 'Airdrop transferred successfully!']);
        $this->emit('refreshAirdrops');

    }

    public function render()
    {

        return view('livewire.airdrop');
    }
}
