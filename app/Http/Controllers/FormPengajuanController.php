<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormPengajuan;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class FormPengajuanController extends Controller
{
    public function create()
    {
        return view('form_pengajuan.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'ditujukan' => 'required',
            'alamat' => 'required',
            'tugas_matkul' => 'required',
            'keperluan' => 'required',
            'status' => 'Sedang Diajukan',
        ]);

        $form = new FormPengajuan;
        $form->user_id = $request->user_id;
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
        $survey = FormPengajuan::where('user_id', $user->user_id)->orderBy('user_id', 'desc')->get();

        return view('user.status_survey', ['survey' => $survey]);
    }


    public function history()
    {
        $user = Auth::user();
        $history = FormPengajuan::where('user_id', $user->user_id)->get();

        return view('user.history_survey', ['history' => $history]);
    }

    public function cetak_survey($id)
    {
        $cetak_survey = FormPengajuan::join('students', 'form_pengajuan.user_id', '=', 'students.user_id')
            ->select('form_pengajuan.*', 'students.name', 'students.nim')
            ->where('form_pengajuan.id', $id)
            ->get();

        // Mengubah waktu "created_at" menjadi waktu Indonesia dengan menggunakan Carbon
        foreach ($cetak_survey as $data) {
            $data->created_at = Carbon::parse($data->created_at)
                ->timezone('Asia/Jakarta')
                ->format('d F Y H:i:s');
        }

        return view('user.cetak_survey', ['cetak_survey' => $cetak_survey]);
    }
    public function show_admin($id)
    {
        $data_show = FormPengajuan::findOrFail($id);

        return view('admin.history_survey_admin', compact('data_show'));
    }

    public function update(Request $request, $id)
    {
        $survey = FormPengajuan::find($id);
        $survey->ditujukan = $request->input('ditujukan');
        $survey->alamat = $request->input('alamat');
        $survey->tugas_matkul = $request->input('tugas_matkul');
        $survey->keperluan = $request->input('keperluan');
        $survey->save();

        return redirect()->back()->with('SurveySuccess', 'Data survey berhasil diperbarui.');
    }


    public function getDataDetail($id)
    {
        $survey = FormPengajuan::join('students', 'form_pengajuan.user_id', '=', 'students.user_id')
            ->select('form_pengajuan.*', 'students.name', 'students.nim')
            ->find($id);

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

    public function index_admin()
    {
        $survey_ad = FormPengajuan::join('students', 'form_pengajuan.user_id', '=', 'students.user_id')
            ->orderBy('form_pengajuan.id', 'desc')
            ->select('form_pengajuan.*', 'students.name', 'students.nim')
            ->get();

        return view('admin.verifikasi_survey', ['survey_ad' => $survey_ad]);
    }

    public function dashboard_admin()
    {
        $survey_ad2 = FormPengajuan::orderBy('id', 'desc')->get();

        return view('admin.dashboard_admin', ['survey_ad2' => $survey_ad2]);
    }

    public function history_admin()
    {
        $survey_ad = FormPengajuan::join('students', 'form_pengajuan.user_id', '=', 'students.user_id')
            ->orderBy('form_pengajuan.id', 'desc')
            ->select('form_pengajuan.*', 'students.name', 'students.nim')
            ->get();

        return view('admin.history_survey_admin', ['survey_ad' => $survey_ad]);
    }

    public function approved(FormPengajuan $formpengajuan)
    {
        $existingStatus = $formpengajuan->status;

        if ($existingStatus == 'Sedang Diproses') {
            $formpengajuan->status = 'Disetujui';
            $formpengajuan->save();
            return redirect('verifikasi-survey-admin')->with('success', 'Survey berhasil disetujui.');
        } else {
            return redirect('verifikasi-survey-admin')->with('error', 'Lihat Detail Survey Terlebih Dahulu.');
        }
    }

    public function rejected(FormPengajuan $formpengajuan)
    {
        $existingStatus = $formpengajuan->status;

        if ($existingStatus == 'Sedang Diproses') {
            $formpengajuan->status = 'Ditolak';
            $formpengajuan->save();
            return redirect('verifikasi-survey-admin')->with('success', 'Survey berhasil ditolak.');
        } else {
            return redirect('verifikasi-survey-admin')->with('error', 'Lihat Detail Survey Terlebih Dahulu.');
        }
    }
    public function inprogress(FormPengajuan $formpengajuan)
    {
        $existingStatus = $formpengajuan->status;

        if ($existingStatus !== 'Sedang Diproses') {
            $formpengajuan->status = 'Sedang Diproses';
            $formpengajuan->save();
            return redirect('verifikasi-survey-admin')->with('success2', 'Survey Berhasil Diproses.')->with('modalId', $formpengajuan->id);
        } else {
            return redirect('verifikasi-survey-admin')->with('success2', 'Survey Sudah Diproses.')->with('modalId', $formpengajuan->id);
        }
    }

    public function destroy($id)
    {
        $survey = FormPengajuan::find($id);

        if ($survey) {
            $survey->delete();
            // Tampilkan notifikasi sukses atau lakukan tindakan lain yang diinginkan
            return redirect()->back()->with('SurveyHapus', 'Data berhasil dihapus.');
        } else {
            // Tampilkan notifikasi error atau lakukan tindakan lain yang diinginkan
            return redirect()->back()->with('error', 'Survey tidak ditemukan.');
        }
    }
}
