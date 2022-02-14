<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Airdrop;

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
        if(auth()->user()->hasTeamPermission(auth()->user()->currentTeam, 'airdrop')){
            $airdrop = Airdrop::find($id);
            $airdrop->status = 'approved';
            $airdrop->save();

            $airdrop->user->airdrop += $airdrop->amount;
            $airdrop->user->save();

            $this->dispatchBrowserEvent('notification', ['type' => 'success', 'message' => 'Airdrop approved successfully!']);
            return;
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
