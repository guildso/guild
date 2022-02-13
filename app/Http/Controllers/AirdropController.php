<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AirdropController extends Controller
{
    public function index()
    {
        return view('airdrop.index');
    }
}
