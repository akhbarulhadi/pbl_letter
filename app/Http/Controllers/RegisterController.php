<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;


class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required|unique:mahasiswa,nim',
            'name' => 'required',
            'prodi' => 'required',
            'kelas' => 'required',
            'nama_dosen' => 'required',
            'nomor_hp' => 'required',
            'alamat' => 'required',
            'email' => 'required|email:dns|unique:mahasiswa',
            'password' => 'required',
        ], [
            'nim.required' => 'NIM harus diisi.',
            'nim.unique' => 'NIM sudah digunakan.',
            'name.required' => 'Nama harus diisi.',
            'prodi.required' => 'Prodi harus diisi.',
            'kelas.required' => 'Kelas harus diisi.',
            'nama_dosen.required' => 'Nama Dosen harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.unique' => 'email sudah digunakan.',
            'password.required' => 'Password harus diisi.',
        ]);
        $user = new User();
        $user->nim = $request->nim;
        $user->name = $request->name;
        $user->prodi = $request->prodi;
        $user->kelas = $request->kelas;
        $user->nama_dosen = $request->nama_dosen;
        $user->nomor_hp = $request->nomor_hp;
        $user->alamat = $request->alamat;
        $user->email = $request->email;
        $user->password = $request->password;

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        return redirect('/')->with('success', 'Registration Succesfull!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
