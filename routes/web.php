<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Controllers
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\EvaluasiController;
use App\Http\Controllers\DashboardController;


/*
|--------------------------------------------------------------------------
| Halaman Utama
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
});


/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get(
    '/dashboard',
    [DashboardController::class, 'index']
)->middleware(['auth', 'verified'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| KARYAWAN
|--------------------------------------------------------------------------
|
| Hanya Administrator / HR
|
| URL:
| /karyawan
|
*/

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::resource(
        'karyawan',
        KaryawanController::class
    );

});


/*
|--------------------------------------------------------------------------
| GOALS
|--------------------------------------------------------------------------
|
| Hanya Administrator / HR
|
| URL:
| /goals
|
*/

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::resource(
        'goals',
        GoalController::class
    );

});


/*
|--------------------------------------------------------------------------
| MONITORING
|--------------------------------------------------------------------------
|
| Administrator / HR dan Supervisor
|
| URL:
| /monitorings
|
*/

Route::middleware(['auth', 'role:admin,supervisor'])->group(function () {

    Route::resource(
        'monitorings',
        MonitoringController::class
    );

});


/*
|--------------------------------------------------------------------------
| EVALUASI
|--------------------------------------------------------------------------
|
| Administrator / HR dan Supervisor
|
| URL:
| /evaluasi
|
*/

Route::middleware(['auth', 'role:admin,supervisor'])->group(function () {


    /*
    |--------------------------------------------------------------------------
    | SELF REVIEW DARI GOOGLE SHEETS
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/evaluasi/self-review',
        [EvaluasiController::class, 'selfReview']
    )->name('evaluasi.selfReview');


    /*
    |--------------------------------------------------------------------------
    | PEER REVIEW DARI GOOGLE SHEETS
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/evaluasi/peer-review',
        [EvaluasiController::class, 'peerReview']
    )->name('evaluasi.peerReview');


    /*
    |--------------------------------------------------------------------------
    | SUPERVISOR REVIEW DARI GOOGLE SHEETS
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/evaluasi/supervisor-review',
        [EvaluasiController::class, 'supervisorReview']
    )->name('evaluasi.supervisorReview');


    /*
    |--------------------------------------------------------------------------
    | HASIL 360 REVIEW
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/evaluasi/hasil-360/{karyawanId}/{goalId}',
        [EvaluasiController::class, 'hasil360']
    )->name('evaluasi.hasil360');


    /*
    |--------------------------------------------------------------------------
    | CRUD EVALUASI
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'evaluasi',
        EvaluasiController::class
    );

});


/*
|--------------------------------------------------------------------------
| LAPORAN
|--------------------------------------------------------------------------
|
| Administrator / HR dan Supervisor
|
| URL:
| /laporan
|
*/

Route::middleware(['auth', 'role:admin,supervisor'])->group(function () {

    // Halaman laporan
    Route::get(
        '/laporan',
        [LaporanController::class, 'index']
    )->name('laporan.index');


    // Halaman cetak laporan
    Route::get(
        '/laporan/cetak',
        [LaporanController::class, 'cetak']
    )->name('laporan.cetak');

});


/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');


    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');


    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');

});


/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';