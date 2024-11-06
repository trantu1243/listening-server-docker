<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show(){
        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $remember = $request->has('remember');

        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if (Auth::attempt($credentials, $remember)){
            toastr()->success('Đăng nhập thành công');

            if (!Auth::user()->active) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                toastr()->error('Email hoặc password không chính xác');
                return redirect(route('auth.login'));
            }

            return redirect(route('dashboard'));
        }
        toastr()->error('Email hoặc password không chính xác');
        return redirect(route('auth.login'));
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login');
    }
}
