<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class QuanlykinhdoanhMiddleware
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
        if(Auth::guard('admin')->user()->id_level ==6 || Auth::guard('admin')->user()->id_level ==7)
        {
            return $next($request);
        }
        else
        {
            return redirect('admin/trang-chu.html');
        }
    }
}
