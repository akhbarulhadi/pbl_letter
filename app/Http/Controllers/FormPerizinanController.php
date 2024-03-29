<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormPerizinan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

class FormPerizinanController extends Controller
{
    public function create()
    {
        return view('/form-survey');
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_mahasiswa' => 'required',
            'nama_dosen' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'jenis_izin' => 'required',
            'jenis_izin_lainnya' => 'required_if:jenis_izin,lainnya',
            'nama_ortu' => 'required',
            'nomor_hp_ortu' => 'required',
            'bukti_waldos' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'bukti_izin' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'format_surat_izin' => 'required|mimes:pdf|max:2048'
        ]);

        if ($request->hasFile('bukti_waldos')) {
            $bukti_waldos = $request->file('bukti_waldos')->store('public/bukti_waldos');
            $bukti_waldos = basename($bukti_waldos);
        } else {
            $bukti_waldos = null;
        }

        if ($request->hasFile('bukti_izin')) {
            $bukti_izin = $request->file('bukti_izin')->store('public/bukti_izin');
            $bukti_izin = basename($bukti_izin);
        } else {
            $bukti_izin = null;
        }

        if ($request->hasFile('format_surat_izin')) {
            $format_surat_izin = $request->file('format_surat_izin')->store('public/format_surat_izin');
            $format_surat_izin = basename($format_surat_izin);
        } else {
            $format_surat_izin = null;
        }

        // Membuat instance model Perizinan dan menyimpan data
        $perizinan = new FormPerizinan;
        $perizinan->id_mahasiswa = $request->id_mahasiswa;
        $perizinan->nama_dosen = $request->nama_dosen;
        $perizinan->tanggal_mulai = $request->tanggal_mulai;
        $perizinan->tanggal_selesai = $request->tanggal_selesai;
        $perizinan->jenis_izin = $request->jenis_izin;
        if ($request->jenis_izin == 'lainnya') {
            $perizinan->jenis_izin = $request->jenis_izin_lainnya;
        } else {
            $perizinan->jenis_izin = $request->jenis_izin;
        }
        $perizinan->nama_ortu = $request->nama_ortu;
        $perizinan->nomor_hp_ortu = $request->nomor_hp_ortu;
        $perizinan->status = 'Sedang Diajukan';

        $perizinan->bukti_waldos = $bukti_waldos ? 'bukti_waldos/' . $bukti_waldos : null;
        $perizinan->bukti_izin = $bukti_izin ? 'bukti_izin/' . $bukti_izin : null;
        $perizinan->format_surat_izin = $format_surat_izin ? 'format_surat_izin/' . $format_surat_izin : null;

        $perizinan->save();

        return redirect('dashboard')->with('Success', 'Form perizinan berhasil disimpan.');
    }


    public function index()
    {
        $user = Auth::user();
        $izin = FormPerizinan::join('mahasiswa', 'pengajuan_surat_izin.id_mahasiswa', '=', 'mahasiswa.id_mahasiswa')
            ->select('pengajuan_surat_izin.*', 'mahasiswa.name', 'mahasiswa.nim', 'mahasiswa.kelas')
            ->where('pengajuan_surat_izin.id_mahasiswa', $user->id_mahasiswa)
            ->get();

        return view('user.status_izin', ['izin' => $izin]);
    }

    public function index_admin()
    {
        $izin = FormPerizinan::join('mahasiswa', 'pengajuan_surat_izin.id_mahasiswa', '=', 'mahasiswa.id_mahasiswa')
            ->select('pengajuan_surat_izin.*', 'mahasiswa.name', 'mahasiswa.nim', 'mahasiswa.kelas')
            ->get();

        return view('admin.verifikasi_izin', ['izin' => $izin]);
    }
    public function dashboard_admin()
    {
        $survey_ad = FormPerizinan::orderBy('id_surat_izin', 'desc')->get();

        return view('admin.dashboard_admin', ['survey_ad' => $survey_ad]);
    }

    public function history_admin()
    {
        $izin = FormPerizinan::join('mahasiswa', 'pengajuan_surat_izin.id_mahasiswa', '=', 'mahasiswa.id_mahasiswa')
            ->select('pengajuan_surat_izin.*', 'mahasiswa.name', 'mahasiswa.nim', 'mahasiswa.kelas')
            ->get();


        return view('admin.history_izin_admin', ['izin' => $izin]);
    }

    public function historyz()
    {
        $user = Auth::user();
        $history_ad = FormPerizinan::join('mahasiswa', 'pengajuan_surat_izin.id_mahasiswa', '=', 'mahasiswa.id_mahasiswa')
            ->select('pengajuan_surat_izin.*', 'mahasiswa.name', 'mahasiswa.nim', 'mahasiswa.kelas')
            ->where('mahasiswa.id_mahasiswa', $user->id_mahasiswa)
            ->get();

        return view('user.history_izin', ['history_ad' => $history_ad]);
    }

    public function detailData($id)
    {
        $survey = FormPerizinan::join('mahasiswa', 'pengajuan_surat_izin.id_mahasiswa', '=', 'mahasiswa.id_mahasiswa')
            ->select('pengajuan_surat_izin.*', 'mahasiswa.name', 'mahasiswa.nim', 'mahasiswa.kelas') // Tambahkan kolom yang ingin Anda ambil dari tabel users
            ->find($id);

        if (!$survey) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        return response()->json($survey);
    }

    public function showImage($id)
    {
        $image = FormPerizinan::find($id);

        if (!$image) {
            abort(404);
        }

        $filename = Crypt::decrypt($image->encrypted_filename);
        $path = storage_path('app/public/' . $filename);

        if (!file_exists($path)) {
            abort(404);
        }

        $file = file_get_contents($path);
        $type = mime_content_type($path);

        return response($file)->header('Content-Type', $type);
    }

    public function approved(FormPerizinan $formperizinan)
    {
        $existingStatus = $formperizinan->status;

        if ($existingStatus == 'Sedang Diproses') {
            $formperizinan->status = 'Disetujui';
            $formperizinan->save();
            return redirect('verifikasi-izin-admin')->with('success', 'Survey berhasil disetujui.');
        } else {
            return redirect('verifikasi-izin-admin')->with('error', 'Lihat Detail Survey Terlebih Dahulu.');
        }
    }

    public function rejected(FormPerizinan $formperizinan)
    {
        $existingStatus = $formperizinan->status;

        if ($existingStatus == 'Sedang Diproses') {
            $formperizinan->status = 'Ditolak';
            $formperizinan->save();
            return redirect('verifikasi-izin-admin')->with('success', 'Survey berhasil ditolak.');
        } else {
            return redirect('verifikasi-izin-admin')->with('error', 'Lihat Detail Survey Terlebih Dahulu.');
        }
    }
    public function inprogress(FormPerizinan $formperizinan)
    {
        $existingStatus = $formperizinan->status;

        if ($existingStatus !== 'Sedang Diproses') {
            $formperizinan->status = 'Sedang Diproses';
            $formperizinan->save();
            return redirect('verifikasi-izin-admin')->with('success2', 'Survey Berhasil Diproses.')->with('modalId', $formperizinan->id_surat_izin);
        } else {
            return redirect('verifikasi-izin-admin')->with('success2', 'Survey Sudah Diproses.')->with('modalId', $formperizinan->id_surat_izin);
        }
    }

    public function update(Request $request, $id)
    {
        $surat_izin = FormPerizinan::findOrFail($id);

        $surat_izin->id_mahasiswa = $request->input('id_mahasiswa');
        $surat_izin->jenis_izin = $request->input('jenis_izin');
        $surat_izin->tanggal_mulai = $request->input('tanggal_mulai');
        $surat_izin->tanggal_selesai = $request->input('tanggal_selesai');
        $surat_izin->nama_dosen = $request->input('nama_dosen');
        $surat_izin->nama_ortu = $request->input('nama_ortu');
        $surat_izin->nomor_hp_ortu = $request->input('nomor_hp_ortu');

        // Handle file uploads
        if ($request->hasFile('bukti_waldos')) {
            $bukti_waldos = $request->file('bukti_waldos')->store('bukti_waldos', 'public');
            $surat_izin->bukti_waldos = $bukti_waldos;
        }

        if ($request->hasFile('bukti_izin')) {
            $bukti_izin = $request->file('bukti_izin')->store('bukti_izin', 'public');
            $surat_izin->bukti_izin = $bukti_izin;
        }

        if ($request->hasFile('format_surat_izin')) {
            $format_surat_izin = $request->file('format_surat_izin')->store('format_surat_izin', 'public');
            $surat_izin->format_surat_izin = $format_surat_izin;
        }

        $surat_izin->save();

        // Redirect to the desired page with a success message
        return redirect()->back()->with('EditSuccess', 'Pengajuan surat izin berhasil diperbarui.');
    }

    public function delete($id)
    {
        // Logika untuk menghapus data sesuai dengan ID yang diberikan
        // Misalnya, jika menggunakan Eloquent ORM:
        $data_izin = FormPerizinan::findOrFail($id);
        $data_izin->delete();

        // Redirect atau response sesuai kebutuhan
        return redirect()->back()->with('IzinSuccess', 'Data berhasil dihapus');
    }

    public function getDataByDateRange(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Mengubah tanggal menjadi format yang sesuai dengan kolom 'updated_at' dalam database
        $startDateTime = Carbon::parse($startDate)->startOfDay();
        $endDateTime = Carbon::parse($endDate)->endOfDay();

        $data2 = FormPerizinan::join('mahasiswa', 'pengajuan_surat_izin.id_mahasiswa', '=', 'mahasiswa.id_mahasiswa')
            ->whereBetween('pengajuan_surat_izin.updated_at', [$startDateTime, $endDateTime])
            ->get(['pengajuan_surat_izin.*', 'mahasiswa.name', 'mahasiswa.nim', 'mahasiswa.kelas']);

        return view('admin.cetak_izin_admin', ['data2' => $data2]);
    }
}
