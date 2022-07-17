<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class WarehouseAuth
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
        if (Auth::check()) {

            if (Auth::user()->role == 'warehouse') {
                return $next($request);
            } else if (Auth::user()->role == 'admin') {
                return redirect('admin/dashboard');
            } else if (Auth::user()->role == 'supplier') {
                return redirect('supplier/dashboard');
            }else {
                return Redirect('/');
            }
        }
    }
}
