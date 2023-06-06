<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormPengajuan;
use Illuminate\Support\Facades\Auth;

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
            'status' => 'Sedang Diajukan',
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
        $user = Auth::user();
        $survey = FormPengajuan::where('name', $user->name)->get();

        return view('user.status_survey', ['survey' => $survey]);
    }

    public function history()
    {
        $user = Auth::user();
        $history = FormPengajuan::where('name', $user->name)->get();

        return view('user.history_survey', ['history' => $history]);
    }

    public function show($id)
    {
        $data1 = FormPengajuan::find($id);

        return view('user.status_survei', ['data' => $data1]);
    }

    public function show_admin($id)
{
    $data_show = FormPengajuan::findOrFail($id);

    return view('admin.history_survey_admin', compact('data_show'));
}

    public function getDataDetail($id)
{
    $survey = FormPengajuan::find($id); // Ganti dengan logika pengambilan data dari sumber data Anda

    if (!$survey) {
        return response()->json(['message' => 'Data not found'], 404);
    }

    return response()->json($survey);
}
public function getDataDetail_2($id)
{
    $survey = FormPengajuan::find($id); // Ganti dengan logika pengambilan data dari sumber data Anda

    if (!$survey) {
        return response()->json(['message' => 'Data not found'], 404);
    }

    return response()->json($survey);
}

public function updateStatus(Request $request, $id)
{
    $pengajuan = FormPengajuan::find($id);
    if ($pengajuan) {
        $status = $request->input('status');
        $pengajuan->status = $status;
        $pengajuan->save();

        return response()->json(['message' => 'Status berhasil diperbarui'], 200);
    }

    return response()->json(['message' => 'Pengajuan tidak ditemukan'], 404);
}

    public function index_admin()
    {
        $survey_ad = FormPengajuan::all();

        return view('admin.verifikasi_survey', ['survey_ad' => $survey_ad]);
    }

    public function history_admin()
    {
        $history_ad = FormPengajuan::all();

        return view('admin.history_survey_admin', ['history_ad' => $history_ad]);
    }
    public function urut_data(Request $request)
    {
    $sort = $request->query('sort');
    
    // Lakukan validasi jika perlu
    
    $data_urut = FormPengajuan::orderBy($sort)->get();
    
    return view('admin.verifikasi_survey', ['data_urut' => $data_urut]);
    }
    public function approved(FormPengajuan $formpengajuan)
{
    $formpengajuan->status = 'Disetujui';
    $formpengajuan->save();

    return redirect('verifikasi-survey-admin')->with('success', 'Survey berhasil disetujui.');
}

public function rejected(FormPengajuan $formpengajuan)
{
    $formpengajuan->status = 'Ditolak';
    $formpengajuan->save();

    return redirect('verifikasi-survey-admin')->with('success', 'Survey berhasil ditolak.');
}
public function inprogress(FormPengajuan $formpengajuan)
{
    $formpengajuan->status = 'Sedang Diprogres';
    $formpengajuan->save();

    return redirect('verifikasi-survey-admin')->with('success', 'Survey berhasil ditolak.');
}


}
