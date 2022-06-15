<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PolyAuthController extends Controller
{
   /**
     * Display poly login view
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        if (Auth::guard('poly')->check()) {
            return redirect()->route('poly.dashboard');
        } else {
            return view('auth.polyLogin2');
        }
    }
    public function showRegisterForm()
    {
        if (Auth::guard('poly')->check()) {
            return redirect()->route('poly.dashboard');
        } else {
            return view('auth.poly-register');
        }
    }

    /**
     * Handle an incoming poly authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->guard('poly')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return redirect()->route('poly.dashboard');
        } else {
            return redirect()->back()->withError('Credentials doesn\'t match.');
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::guard('poly')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
