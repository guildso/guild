<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShiftLogs extends Component
{
    public $numResults = 10;

    public function loadMore(){
        $this->numResults += 10;
    }

    public function render()
    {
        $shifts = auth()->user()->shiftLogs()->paginate($this->numResults);
        return view('livewire.shift-logs', compact('shifts'));
    }
}
