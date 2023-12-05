<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotEmail;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login',[
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->intended('admin/dashboard');
        }

        return back()->with('loginError', 'Login Gagal! Username atau password salah');
    }

    public function forgot_password()
    {
        return view('auth.forgot-password',[
            'title' => 'Forgot Password'
        ]);
    }

    public function forgot(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.exists' => 'Email not registered.'
        ]);

        $member = User::where('email', $request->email)->first();

        if ($member) {
            Mail::to($member->email)->send(new ForgotEmail($member));
            return back()->with('success','Password berhasil terkirim ke email anda');
        } else {
            return back()->with('loginError', 'Member not found.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
