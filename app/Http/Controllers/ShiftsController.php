<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShiftsController extends Controller
{
    public function index()
    {
        return view('shifts.index');
    }
}
