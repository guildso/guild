<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Airdrop;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Process\Process;

class AirdropList extends Component
{

    public $listeners = [
        'refreshAirdrops' => 'refreshAirdrops',
    ];

    public $numResults = 10;

    public function loadMore(){
        $this->numResults += 10;
    }

    public function refreshAirdrops()
    {
        return;
    }

    public function approve($id)
    {

        $airdrop = Airdrop::find($id);

        if(auth()->user()->hasTeamPermission(auth()->user()->currentTeam, 'airdrop')){
            try {
                $airdrop = Airdrop::find($id);
                $airdrop->status = 'approved';

                Artisan::call('solana:approve', [
                    'token' => env('SOLANA_TOKEN_ADDRESS'),
                    'recipient' => $airdrop->wallet,
                    'amount' => $airdrop->amount,
                    'id' => $id,
                ]);

                $airdrop->user->airdrop += $airdrop->amount;

                //$airdrop->transaction = $txHash;
                $airdrop->save();
                $airdrop->user->save();

                $this->dispatchBrowserEvent('notification', ['type' => 'success', 'message' => 'Airdrop approved successfully!']);
                return;
            } catch (\Exception $e) {
                throw $e;
            }
        } else {
            $this->dispatchBrowserEvent('notification', ['type' => 'warning', 'message' => 'You do not have permission to approve airdrops!']);
            return;
        }
    }

    public function render()
    {
        $airdrops = Airdrop::where('team_id', auth()->user()->currentTeam->id)
                            ->orderBy('created_at', 'desc')
                            ->with('user');

        // If user is admin, show all airdrops
        if (auth()->user()->hasTeamPermission(auth()->user()->currentTeam, 'airdrop')) {
            $airdrops = $airdrops->paginate($this->numResults);
        } else {
            $airdrops = $airdrops->where('user_id', auth()->user()->id)->paginate($this->numResults);
        }

        return view('livewire.airdrop-list', compact('airdrops'));
    }
}
