<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountMiddleWare
{

    public function handle(Request $request, Closure $next)
    {
        $check = Auth::guard('admin')->check();
        if ($check) {
            return $next($request);
        } else {
            return redirect('/admin/login');
        }
    }
}
