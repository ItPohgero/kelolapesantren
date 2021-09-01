<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Tabungan
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
        if (!session('tabungan')) {
            return redirect()->to('/');
        }
        return $next($request);
    }
}
