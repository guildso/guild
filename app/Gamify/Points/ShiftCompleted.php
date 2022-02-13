<?php

namespace App\Gamify\Points;

use QCod\Gamify\PointType;

class ShiftCompleted extends PointType
{
    /**
     * Number of points
     *
     * @var int
     */
    public $points = 0;

    /**
     * Point constructor
     *
     * @param $subject
     */
    public function __construct($subject)
    {
        $this->subject = $subject;
        if($subject->total_hours > 0) {
            $this->points = $subject->total_hours;
        }
    }

    /**
     * User who will be receive points
     *
     * @return mixed
     */
    public function payee()
    {
        return $this->getSubject()->user;
    }

}
