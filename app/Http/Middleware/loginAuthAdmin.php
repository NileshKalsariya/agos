<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
class loginAuthAdmin
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
        if(!$request->session('user')){
            return redirect('adminpanel');
        }
        $path=$request->path();
        if($path=='adminhome' && !$request->session()->has('user')){
            return redirect('adminpanel');
        }
        if($path=='banner' && !$request->session()->has('user')){
            return redirect('adminpanel');
        }
        if($path=='adminpanel' && $request->session()->has('user')){
            return redirect('adminhome');
        }
        return $next($request);
    }
}
