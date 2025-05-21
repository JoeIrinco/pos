<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class inventoryMiddleware
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

        if ( !Auth::user() ){
            return redirect('login');
        }


       if (Auth::user()->is_admin == 1) {
        return redirect('pos');
        }

         $response = $next($request);
         $response->headers->set('Cache-Control','nocache, no-store, max-age=0, must-revalidate');
         $response->headers->set('Pragma','no-cache');
         $response->headers->set('Expires','Fri, 01 Jan 1990 00:00:00 GMT');
         return $response;
    }
}
