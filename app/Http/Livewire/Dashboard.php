<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Events\NotificationSent;
use App\Models\Notification;
use App\Traits\WithShift;

class Dashboard extends Component
{
    use WithShift;

    public $body;
    public $onboardModal = false;

    protected $listeners = [
        Shifts::SHIFT_CHANGED // calls shiftChanged()
    ];

    protected $rules = [
        'body' => 'required|max:500',
    ];

    public function render()
    {
        return view('livewire.dashboard');
    }

    public function store()
    {
        if (auth()->user()->hasTeamPermission(auth()->user()->currentTeam, 'create')) {
            $this->validate();
            $post = new Post;
            $post->team_id = auth()->user()->currentTeam->id;
            $post->user_id = auth()->user()->id;
            $post->body = $this->body;
            $post->save();

            $PostCreated = new \App\Gamify\Points\PostCreated($post);
            auth()->user()->givePoint($PostCreated);

            $this->dispatchBrowserEvent('notification', ['type' => 'success', 'message' => 'Post Created Successfully!']);

            $this->resetInputFields();

            $this->emit('feed-update');
            event(new NotificationSent(new Notification, ['title' => 'New Post Added', 'description' => $post->body]));
        } else {
            $this->dispatchBrowserEvent('notification', ['type' => 'error', 'message' => 'You do not have permissions to add posts to this team!']);
        }
    }

    private function resetInputFields(){
        $this->body = '';
    }
}
