<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        if (auth()->user()->user_type == 'admin') {
            return $next($request);
        }

        return redirect('home')->with('error', 'Anda tidak dapat mengakses halaman ini');
    }
}
