<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
class loginlogout
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

        if(!Session::get('userdata')){
            return redirect('login');
        }
          $path = $request->path();
        if($path=='home' && !Session::get('userdata')){
              return redirect('login');
        }
           elseif (($path=='login' || $path=='register') && Session::get('userdata') ) {
               return redirect('home');
           }else{
              
          }
            
        return $next($request);
    }
}
