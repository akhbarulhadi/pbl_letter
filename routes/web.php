<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormPengajuanController;
use App\Http\Controllers\FormPerizinanController;
use App\Models\FormPengajuan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*user*/

/*dashboard user*/

/*formulir*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/form-izin', function () {
    return view('user.form_izin');
})->name('form_izin');
Route::get('/form-survey', function () {
    return view('user.form_survey');
})->name('form_survey');

/*status*/
Route::get('/status-izin', function () {
    return view('user.status_izin');
})->name('status_izin');
// Route::get('/status-survey', function () {
//     return view('user.status_survey');
// })->name('status_survey');

/*history*/
Route::get('/history-survey', function () {
    return view('user.history_survey');
})->name('history_survey');
Route::get('/history-izin', function () {
    return view('user.history_izin');
})->name('history_izin');

/*cetak di history*/
Route::get('/cetak_izin', function () {
    return view('user.cetak_izin');
})->name('cetak_izin');
Route::get('/history-survey/cetak-survey', function () {
    return view('user.cetak_survey');
})->name('cetak_survey');

/*profile*/
Route::get('/profile', function () {
    return view('user.profile');
})->name('profile');

/*admin*/

/*dashboard admin*/
Route::get('/dashboard-admin', function () {
    return view('admin.dashboard_admin');
})->name('dashboard_admin')->middleware('auth');

/*verifikasi*/
Route::get('/verifikasi-survey-admin', function () {
    return view('admin.verifikasi_survey');
})->name('verifikasi_survey');
Route::get('/verifikasi-izin-admin', function () {
    return view('admin.verifikasi_izin');
})->name('verifikasi_izin');

/*history admin*/
Route::get('/history-survey-admin', function () {
    return view('admin.history_survey_admin');
})->name('history_survey_admin');
Route::get('/history-izin-admin', function () {
    return view('admin.history_izin_admin');
})->name('history_izin_admin');

/*laporan page*/
Route::get('/laporan-survey-admin', function () {
    return view('admin.laporan_survey');
})->name('laporan_survey');
Route::get('/laporan-izin-admin', function () {
    return view('admin.laporan_izin');
})->name('laporan_izin');

/*cetak di laporan page*/
//Route::get('/laporan/cetak_survey', function () {
 //   return view('admin.cetak_survey_admin');
//})->name('cetak_survey_admin');
//Route::get('/laporan/cetak_izin', function () {
//    return view('admin.cetak_izin_admin');
//})->name('cetak_izin_admin');

/*profile admin*/
Route::get('/profile-admin', function () {
    return view('admin.profile_admin');
})->name('profile_admin');


Route::get('/', [RegisterController::class, 'index'])->middleware('guest');
Route::POST('/register', [RegisterController::class, 'store']);

Route::POST('/login', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::post('/ubah-password', [LoginController::class, 'changePassword'])->name('password.update');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/form_pengajuan/create', [FormPengajuanController::class, 'create'])->name('form_pengajuan.create');
Route::post('/form_pengajuan', [FormPengajuanController::class, 'store'])->name('form_pengajuan');

Route::get('/form-perizinan', [FormPerizinanController::class, 'create'])->name('perizinan.create');
Route::post('/form-perizinan', [FormPerizinanController::class, 'store'])->name('perizinan.store');
Route::get('/status-izin', [FormPerizinanController::class, 'index'])->name('status_izin');

Route::get('/status-survey', [FormPengajuanController::class, 'index'])->name('status_survey');
Route::get('/dashboard-admin', [FormPengajuanController::class, 'dashboard_admin'])->name('dashboard_admin');
Route::get('/dashboard-admin', [FormPerizinanController::class, 'dashboard_admin'])->name('dashboard_admin');

Route::get('/history-izin', [FormPerizinanController::class, 'historyz'])->name('history_izin');
Route::get('/history-izin-admin', [FormPerizinanController::class, 'history_admin'])->name('history_izin_admin');

Route::get('/history-survey/cetak-survey{id}', [FormPengajuanController::class, 'cetak_survey'])->name('cetak_survey');

Route::get('/history-survey', [FormPengajuanController::class, 'history'])->name('history_survey');
Route::get('/history-survey-admin', [FormPengajuanController::class, 'history_admin'])->name('history_survey_admin');

Route::get('/verifikasi-survey-admin', [FormPengajuanController::class, 'index_admin'])->name('verifikasi_survey');


Route::get('/data_urut', [FormPengajuanController::class, 'data_urut'])->name('data_urut');

Route::get('/verifikasi-survey-admin/{id}', [FormPengajuanController::class, 'show_admin'])->name('data_show_admin');

Route::get('/data/detail/{id}', [FormPengajuanController::class, 'getDataDetail'])->name('data.detail');

Route::get('/data/edit/{id}', [FormPengajuanController::class, 'getEditDetail'])->name('data.detail');

Route::delete('/survey/{id}', [FormPengajuanController::class, 'destroy'])->name('survey.destroy');

Route::get('/data/detail/hs/{id}', [FormPengajuanController::class, 'getDataDetail_2'])->name('data.detail2');

Route::get('/data/detail/ad/{id}', [FormPerizinanController::class, 'detailData'])->name('data.detail');

Route::get('/data/detail/ver/{id}', [FormPengajuanController::class, 'getDataDetail'])->name('data.detail');

Route::get('/image/show/{id}', [FormPerizinanController::class, 'showImage'])->name('image.show');


Route::put('/update-status/{id}', 'PengajuanController@updateStatus')->name('update.status');

Route::get('/verifikasi-izin-admin', [FormPerizinanController::class, 'index_admin'])->name('verifikasi_izin');

Route::post('/survey/update', [FormPengajuanControllerController::class, 'update'])->name('update_survey');

Route::post('/survey/admin/{formpengajuan}/approved', [FormPengajuanController::class, 'approved'])->name('formpengajuan.approved');
Route::post('/survey/admin/{formpengajuan}/rejected', [FormPengajuanController::class, 'rejected'])->name('formpengajuan.rejected');
Route::post('/survey/admin/{formpengajuan}/inprogress', [FormPengajuanController::class, 'inprogress'])->name('formpengajuan.inprogress');

Route::post('/izin/admin/{formperizinan}/approved', [FormPerizinanController::class, 'approved'])->name('formperizinan.approved');
Route::post('/izin/admin/{formperizinan}/rejected', [FormPerizinanController::class, 'rejected'])->name('formperizinan.rejected');
Route::post('/izin/admin/{formperizinan}/inprogress', [FormPerizinanController::class, 'inprogress'])->name('formperizinan.inprogress');

Route::post('/profile', [LoginController::class, 'updateProfile'])->name('update.profile');

// Route to show the edit form
Route::put('surat-izin/{id}', [FormPerizinanController::class, 'update'])->name('surat-izin.update');

Route::delete('/data/{id}', [FormPerizinanController::class, 'delete'])->name('data.destroy');
// Route to handle the edit form submission
Route::put('/surveys/{id}', [FormPengajuanController::class, 'update'])->name('survey.update');

Route::get('/laporan/cetak_survey', [FormPengajuanController::class, 'getDataByDateRange'])->name('cetak_survey_admin');

Route::get('/laporan/cetak_izin', [FormPerizinanController::class, 'getDataByDateRange'])->name('cetak_izin_admin');   