<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Services\CheckSetupService;
use Illuminate\Support\Facades\Schema;

class EnsureSiteIsSetup
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
        if (! CheckSetupService::check()) {
            return redirect()->route('setup.index');
        }
        
        return $next($request);
    }
}
