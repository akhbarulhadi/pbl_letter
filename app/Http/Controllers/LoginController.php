<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Admins;
use App\Models\User;
use App\Models\Student;
use Illuminate\Validation\Rule;
use Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect('login');
        } else {
            return view('home');
        }
    }

    protected function actionLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // Coba login dari tabel "users"
        $user = User::where('email', $email)->first();
        if ($user && Hash::check($password, $user->password)) {
            Auth::guard()->login($user, $request->filled('remember'));
            return redirect($this->redirectTo());
        }

        // Coba login dari tabel "admins"
        $admin = Admins::where('email', $email)->first();
        if ($admin && $admin->password === md5($password)) {
            Auth::guard('admin')->login($admin, $request->filled('remember'));
            return redirect($this->redirectTo());
        }

        return redirect()->back()->with(['LoginError' => 'Email atau Password Salah! Silahkan Sign In kembali!']);
    }

    protected function redirectTo()
    {
        if (Auth::guard('admin')->check()) {
            // Pengguna merupakan admin, arahkan ke halaman admin
            return 'verifikasi-survey-admin';
        } else {
            // Pengguna merupakan user, arahkan ke halaman user
            return 'dashboard';
        }
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Password saat ini salah.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Password berhasil diubah.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nim' => 'required',
            'email' => 'required|email',
            'name' => 'required',
            'prodi' => 'required',
            'kelas' => 'required',
            'nama_dosen' => 'required',
            'nomor_hp' => 'required',
            'alamat' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Jika validasi berhasil, lakukan pembaruan data profil
        $user = Auth::user();
        $student = User::where('id_mahasiswa', $user->id_mahasiswa)->first();
        $student->nim = $request->input('nim');
        $student->email = $request->input('email');
        $student->name = $request->input('name');
        $student->prodi = $request->input('prodi');
        $student->kelas = $request->input('kelas');
        $student->nama_dosen = $request->input('nama_dosen');
        $student->nomor_hp = $request->input('nomor_hp');
        $student->alamat = $request->input('alamat');
        $student->save();

        return redirect()->back()->with('success', 'Data Profile berhasil diperbarui!');
    }
}
