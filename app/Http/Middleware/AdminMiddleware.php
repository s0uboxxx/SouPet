<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->check() && (auth()->user()->id_role == 1 || auth()->user()->id_role == 4)) {
            return $next($request);
        }

        session()->flash('success', 'Bạn không có quyền truy cập vào trang này.');

        return redirect()->route('home');
    }
}
