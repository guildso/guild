<?php

namespace App\Traits;

use App\Traits\WithShift;

trait WithShift
{

    public $shift;

    public function shiftChanged($value){
        $this->shift = $value;
    }

    public function mount(){
        $this->shift = auth()->user()->isOnShift();
    }

}
