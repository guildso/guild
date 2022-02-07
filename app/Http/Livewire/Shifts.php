<?php

namespace App\Http\Livewire;
use App\Models\Notification;
use App\Events\NotificationSent;
use App\Models\User;
use App\Models\Shift;
use Livewire\Component;
use App\Traits\WithShift;

class Shifts extends Component
{
    use WithShift;

    public $timer;
    public $action;
    public $status;
    public $totalHours;
    public $onShift;

    // Events
    const SHIFT_CHANGED = 'shiftChanged';
    const TOGGLE_SHIFT = 'toggleShift';

    protected $listeners = [
        self::TOGGLE_SHIFT,
        self::SHIFT_CHANGED
    ];

    public function render()
    {
        $this->totalHours();

        if (auth()->user()->isOnShift()) {
            $this->action = 'Stop';
            $this->status = 'On Shift';
        } else {
            $this->action = 'Start';
            $this->status = 'Not On Shift';
        }
        return view('livewire.shifts');
    }

    public function startShift()
    {
        auth()->user()->startShift();
        $this->status = 'On Shift';
        $this->dispatchBrowserEvent('notification', ['type' => 'success', 'message' => 'You are now on shift!']);
        event(new NotificationSent(new Notification, ['title' => 'Shift Started', 'description' => 'The user started their shift!']));
        $this->emit(self::SHIFT_CHANGED, true);
    }

    public function endShift()
    {
        auth()->user()->endShift();
        $this->status = 'Not On Shift';
        $this->dispatchBrowserEvent('notification', ['type' => 'success', 'message' => 'You have ended your shift!']);
        event(new NotificationSent(new Notification, ['title' => 'Shift Ended', 'description' => 'The user ended their shift!']));
        $this->emit(self::SHIFT_CHANGED, false);
    }

    public function toggleShift()
    {
        if (auth()->user()->isOnShift()) {
            $this->endShift();
        } else {
            $this->startShift();
        }
    }

    public function totalHours()
    {
        $this->totalHours = auth()->user()->totalHoursWorked();
    }
}
