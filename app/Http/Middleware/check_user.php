<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class check_user
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
      
if(!$request->session()->has('pass')){
        $request->session()->flash('error', 'enter login details');
         return redirect('login'); 
      }
       
        
     
        return $next($request);
    }
}
