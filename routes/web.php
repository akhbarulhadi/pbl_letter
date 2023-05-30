<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormPengajuanController;

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
Route::get('/status-survey', function () {
    return view('user.status_survey');
})->name('status_survey');

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
})->name('dashboard_admin');

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
Route::get('/laporan/cetak_survey', function () {
    return view('admin.cetak_survey_admin');
})->name('cetak_survey_admin');
Route::get('/laporan/cetak_izin', function () {
    return view('admin.cetak_izin_admin');
})->name('cetak_izin_admin');

/*profile admin*/
Route::get('/profile-admin', function () {
    return view('admin.profile_admin');
})->name('profile_admin');

Route::get('/', [RegisterController::class, 'index']);
Route::POST('/register', [RegisterController::class, 'store']);

Route::POST('/login', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::post('/password.action', [LoginController::class, 'password_action'])->name('password.action');

Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/form_pengajuan/create', [FormPengajuanController::class, 'create'])->name('form_pengajuan.create');
Route::post('/form_pengajuan', [FormPengajuanController::class, 'store'])->name('form_pengajuan');

Route::get('/survei', 'FormPengajuanController@index');