<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class is_ketua
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
        if (session('ketua') == 1 || auth()->user()->role == 'Admin Satker' || auth()->user()->role == 'Admin Provinsi'){
            return $next($request);
        }
        abort(403);
    }
}
