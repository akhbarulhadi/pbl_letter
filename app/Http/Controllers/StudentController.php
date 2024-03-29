<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('/');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required|unique:users,nim',
            'name' => 'required',
            'prodi' => 'required',
            'kelas' => 'required',
            'nama_dosen' => 'required',
            'nomor_hp' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required'
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

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        return redirect('/')->with('success', 'Registration Succesfull! Please Login');
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
