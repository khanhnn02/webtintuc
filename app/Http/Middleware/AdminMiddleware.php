<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('admin_logged_in')) {
            return redirect()->route('admin.login')->withErrors([
                'login' => 'Bạn cần đăng nhập để truy cập trang này.',
            ]);
        }

        return $next($request);
    }
}
