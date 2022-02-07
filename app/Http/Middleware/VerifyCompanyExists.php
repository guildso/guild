<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Company;

class VerifyCompanyExists
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if a company does not exist
        if(!Company::first() && !$request->is('install') && !$request->is('livewire/message/install')){
            return redirect('install');
        }
        return $next($request);
    }
}
