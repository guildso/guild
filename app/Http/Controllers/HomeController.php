<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Home Route
     * If User is authenticated redirect to dashboard
     * Otherwise, redirect to login page.
     *
     * @param Request $request
     * @return view
     */
    public function index(Request $request){
        if(auth()->guest()){
            return redirect('login');
        } else {
            return redirect('dashboard');
        }
    }
}
