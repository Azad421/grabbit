<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckJobSeeker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $role = Auth('user')->user()->role->nickname;
        if($role != 'jobseeker'){
            return redirect('user');
        }else{
            return $next($request);
        }
    }
}