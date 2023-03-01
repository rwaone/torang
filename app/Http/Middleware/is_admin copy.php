<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class is_penilai
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
        if (auth()->user()->role == 'Admin Satker' || auth()->user()->role == 'Admin Provinsi'|| auth()->user()->role == 'Penilai'){
            return $next($request);
        }
        abort(403);
    }
}
