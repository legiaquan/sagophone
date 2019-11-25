<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       if(Auth::guard('admin')->user()->id_level ==1 || Auth::guard('admin')->user()->id_level ==7)
        {
            return $next($request);
        }
        else
        {
            return redirect('admin/trang-chu.html');
        }
    }
}
