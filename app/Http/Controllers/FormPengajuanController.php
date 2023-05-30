<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormPengajuan;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\DB;

class FormPengajuanController extends Controller
{
    public function create()
    {
        return view('form_pengajuan.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required',
            'name' => 'required',
            'ditujukan' => 'required',
            'alamat' => 'required',
            'tugas_matkul' => 'required',
            'keperluan' => 'required',
            'status' => 'pending',
        ]);

        $form = new FormPengajuan;
        $form->nim = $request->nim;
        $form->name = $request->name;
        $form->ditujukan = $request->ditujukan;
        $form->alamat = $request->alamat;
        $form->tugas_matkul = $request->tugas_matkul;
        $form->keperluan = $request->keperluan;
        $form->status = $request->status;

        FormPengajuan::create($validatedData);
        return redirect('dashboard')->with('FormSuccess', 'Form pengajuan berhasil diajukan.');
    }

    public function index()
    {
        $survei = FormPengajuan::all();

        return view('index')->with('suratPengajuan', $survei);
    }

    public function show(FormPengajuan $formPengajuan)
    {
        // Menggunakan kebijakan akses untuk memeriksa apakah pengguna dapat melihat form pengajuan ini

        return view('form_pengajuan.show', compact('formPengajuan'));
    }
}
