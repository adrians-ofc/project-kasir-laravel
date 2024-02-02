<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class AdminAuthController extends Controller
{
    function index() {
        return view('admin.auth.login');
    }

    function doLogin(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            // Check user's position and redirect accordingly
            if (auth()->user()->position === 'admin') {
                return redirect('/admin/dashboard');
            } elseif (auth()->user()->position === 'kasir') {
                return redirect('/kasir/dashboard');
            }

            // Add additional conditions for other user positions if needed

            return redirect('/'); // Default redirection if the position is not handled explicitly
        }

        return back()->with('loginError', 'Email atau password salah');
    }

    function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('login');
    }
}
