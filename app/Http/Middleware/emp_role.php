<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class emp_role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    { if(session()->get('role')==2){
      return redirect()->back();
    }
        return $next($request);
    }
}
