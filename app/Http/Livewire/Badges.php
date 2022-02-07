<?php

namespace App\Http\Livewire;

use App\Models\Badge;
use App\Models\Notification;
use App\Events\NotificationSent;
use Livewire\Component;

class Badges extends Component
{

    public $badges, $name, $description, $details, $color, $award_message, $requirement_class, $requirement_value, $badge_id;
    public $updateMode = false;

    protected $rules = [
        'name' => 'required|min:6',
        'description' => 'required',
        'details' => 'required',
        'award_message' => 'required',
        'requirement_class' => 'required',
        'requirement_value' => 'required',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->badges = Badge::where('team_id', auth()->user()->currentTeam->id)->get();
        return view('livewire.badges');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->name = '';
        $this->description = '';
        $this->color = '';
        $this->details = '';
        $this->award_message = '';
        $this->requirement_class = '';
        $this->requirement_value = '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        if (auth()->user()->hasTeamPermission(auth()->user()->currentTeam, 'create')) {
            $this->validate();
            $badge = new Badge;
            $badge->team_id = auth()->user()->currentTeam->id;
            $badge->name = $this->name;
            $badge->description = $this->description;
            $badge->color = $this->color;
            $badge->details = $this->details ;
            $badge->award_message = $this->award_message ;
            $badge->requirement_class = $this->requirement_class ;
            $badge->requirement_value = $this->requirement_value ;
            $badge->save();

            $this->dispatchBrowserEvent('notification', ['type' => 'success', 'message' => 'Badge Created Successfully!']);

            $this->resetInputFields();

            event(new NotificationSent(new Notification, ['title' => 'New Badge Added', 'description' => $badge->name]));
        } else {
            $this->dispatchBrowserEvent('notification', ['type' => 'error', 'message' => 'You do not have permissions to add tasks to this team!']);
        }
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        if (auth()->user()->hasTeamPermission(auth()->user()->currentTeam, 'update')) {
            $badge = Badge::findOrFail($id);
            $this->badge_id = $id;
            $this->name = $badge->name;
            $this->description = $badge->description;
            $this->color = $badge->color;
            $this->details = $badge->details;
            $this->award_message = $badge->award_message;
            $this->requirement_class = $badge->requirement_class;
            $this->requirement_value = $badge->requirement_value;

            $this->updateMode = true;

        } else {
            $this->dispatchBrowserEvent('notification', ['type' => 'error', 'message' => 'You do not have permissions to edit tasks!']);
        }

    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function update()
    {
        if (auth()->user()->hasTeamPermission(auth()->user()->currentTeam, 'update')) {
            $validatedDate = $this->validate([
                'name' => 'required',
                'description' => 'required',
                'details' => 'required',
                'award_message' => 'required',
                'requirement_class' => 'required',
                'requirement_value' => 'required',
            ]);

            $badge = Badge::find($this->badge_id);
            $badge->update([
                'name' => $this->name,
                'description' => $this->description,
                'details' => $this->details,
                'color' => $this->color,
                'award_message' => $this->award_message,
                'requirement_class' => $this->requirement_class,
                'requirement_value' => $this->requirement_value,
            ]);

            $this->updateMode = false;

            $this->resetInputFields();
            $this->dispatchBrowserEvent('notification', ['type' => 'success', 'message' => 'Badge Updated Successfully!']);
        } else {
            $this->dispatchBrowserEvent('notification', ['type' => 'error', 'message' => 'You do not have permissions to edit badges!']);
        }
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        if (auth()->user()->hasTeamPermission(auth()->user()->currentTeam, 'delete')) {
            $badge = Badge::find($id);
            $badge->users()->detach();
            $badge->delete();
            $this->dispatchBrowserEvent('notification', ['type' => 'warning', 'message' => 'You have deleted the badge!']);

        } else {
            $this->dispatchBrowserEvent('notification', ['type' => 'error', 'message' => 'You do not have permissions to delete badges!']);
        }
    }

}
