<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect('login');
        }else{
            return view('home');
        }
    }

    public function actionlogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (auth()->check() && auth()->user()->name === 'Eben Ezer Hikaru Hutabarat') {
                return redirect('dashboard-admin');
            }
                return redirect('dashboard');
            
        } 
        else{
            Session::flash('LoginError', 'Email atau Password Salah!! Silahkan Login Kembali!!');
            return redirect('/');
        }
    }

    public function password_action(Request $request)
    {
        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|confirmed',
        ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();
        return back()->with('success', 'Password changed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
