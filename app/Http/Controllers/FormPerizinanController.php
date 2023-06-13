<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormPerizinan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class FormPerizinanController extends Controller
{
    public function create()
    {
        return view('/form-survey');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'nim' => 'required',
            'kelas' => 'required',
            'nama_dosen' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'jenis_izin' => 'required',
            'nama_ortu' => 'required',
            'nomor_hp_ortu' => 'required',
            'bukti_waldos' => 'required|image|file|mimes:jpeg,jpg,png|max:2048',
            'bukti_izin' => 'required|image|file|mimes:jpeg,jpg,png|max:2048',
            'format_surat_izin' => 'required|image|file|mimes:jpeg,jpg,png|max:2048'
        ]);

        if ( $request->hasFile('bukti_waldos')) {
            $bukti_waldos = $request->file('bukti_waldos')->store('public/bukti_waldos');
            $bukti_waldos = basename($bukti_waldos);
        } else {
            $bukti_waldos = null;
        }

        if ( $request->hasFile('bukti_izin')) {
            $bukti_izin = $request->file('bukti_izin')->store('public/bukti_izin');
            $bukti_izin = basename($bukti_izin);
        } else {
            $bukti_izin = null;
        }

        if ( $request->hasFile('format_surat_izin')) {
            $format_surat_izin = $request->file('format_surat_izin')->store('public/format_surat_izin');
            $format_surat_izin = basename($format_surat_izin);
        } else {
            $format_surat_izin = null;
        }

        // Membuat instance model Perizinan dan menyimpan data
        $perizinan = new FormPerizinan;
        $perizinan->name = $request->name;
        $perizinan->nim = $request->nim;
        $perizinan->kelas = $request->kelas;
        $perizinan->nama_dosen = $request->nama_dosen;
        $perizinan->tanggal_mulai = $request->tanggal_mulai;
        $perizinan->tanggal_selesai = $request->tanggal_selesai;
        $perizinan->jenis_izin = $request->jenis_izin;
        $perizinan->nama_ortu = $request->nama_ortu;
        $perizinan->nomor_hp_ortu = $request->nomor_hp_ortu;

        $perizinan->bukti_waldos = $bukti_waldos ? 'bukti_waldos/' . $bukti_waldos : null;
        $perizinan->bukti_izin = $bukti_izin ? 'bukti_izin/' . $bukti_izin : null;
        $perizinan->format_surat_izin = $format_surat_izin ? 'format_surat_izin/' . $format_surat_izin : null;
        
        $perizinan->save();
        return redirect('form-izin')->with('Success', 'Form perizinan berhasil disimpan.');
    }

    public function index()
    {
        $user = Auth::user();
        $izin = FormPerizinan::where('nim', $user->nim)->get();

        return view('user.status_izin', ['izin' => $izin]);
    }

    public function detailData($id)
{
    $survey = FormPerizinan::find($id); // Ganti dengan logika pengambilan data dari sumber data Anda

    if (!$survey) {
        return response()->json(['message' => 'Data not found'], 404);
    }

    return response()->json($survey);
}

public function ambilGambar($id)
    {
        $gambar = FormPerizinan::find($id); // Ganti dengan logika query yang sesuai
        if ($gambar) {
            $imageUrl = $gambar->gambar;
            return response()->json($imageUrl);
        } else {
            return response()->json(['error' => 'Gambar tidak ditemukan'], 404);
        }
    }

}
