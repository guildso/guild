<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Badge;
use App\Events\BadgeEarned;

class BadgesController extends Controller
{
    public function index()
    {
        return view('badges.index');
    }

}
