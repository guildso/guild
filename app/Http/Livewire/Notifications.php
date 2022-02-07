<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use Livewire\Component;

class Notifications extends Component
{
    public $type;
    public $webhook;

    protected $rules = [
        'webhook' => 'min:6',
    ];

    public function mount()
    {
        $webhook = Notification::select('webhook')->where('type', $this->type)->where('team_id', auth()->user()->currentTeam->id)->first();
        if($webhook) {
            $this->webhook = $webhook->webhook;
        } else {
            $this->webhook = '';
        }
    }

    public function render()
    {
        return view('livewire.notifications');
    }

    public function update()
    {
        if (auth()->user()->hasTeamPermission(auth()->user()->currentTeam, 'update')) {

            try {
                $notification = Notification::updateOrCreate(
                    ['team_id' => auth()->user()->currentTeam->id, 'type' => $this->type],
                    ['webhook' => $this->webhook]
                );
                $this->dispatchBrowserEvent('notification', ['type' => 'success', 'message' => ucfirst($this->type) . ' WebHook Updated Successfully!']);
            } catch (\Throwable $th) {
                $this->dispatchBrowserEvent('notification', ['type' => 'warning', 'message' => 'Something went wrong, try again later.']);
            }
        } else {
            $this->dispatchBrowserEvent('notification', ['type' => 'warning', 'message' => 'You can not edit this team!']);
        }
    }
}
