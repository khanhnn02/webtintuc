<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = DB::table('users')
                    ->where('username', $request->username)
                    ->where('role', 1) // Chỉ cho phép quản trị viên đăng nhập
                    ->first();

        if ($user && $request->password === $user->password) {
            // Lưu thông tin đăng nhập vào session
            Session::put('admin_logged_in', true);
            Session::put('admin_username', $user->username);
            Auth::loginUsingId($user->id);
            return redirect('/admin/news');

        }

        return back()->withErrors([
            'login' => 'Tên đăng nhập hoặc mật khẩu không đúng.',
        ]);
    }

    // Xử lý đăng xuất
    public function logout()
    {
        Session::forget('admin_logged_in');
        Session::forget('admin_username');
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
