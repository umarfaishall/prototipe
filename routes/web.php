<?php

use App\Http\Controllers\Admin\AbsensiController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\ActivityRegistrationController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EvaluationController;
use App\Http\Controllers\Admin\RelawanController;
use App\Http\Controllers\Admin\VerificationController;
use App\Http\Controllers\KolaborasiController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('pages.welcome');
})->name('home');
// User Kolaorasi Routes
Route::get('/kolaborasi', [KolaborasiController::class, 'index'])->name('kolaborasi');
Route::get('/kolaborasi/{id}', [KolaborasiController::class, 'show'])->name('kolaborasi.show');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        // Dashboard Route
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        // Acitivity Routes
        Route::group(['prefix' => 'aktivitas'], function () {
            Route::get('/', [ActivityController::class, 'index'])->name('admin.aktivitas.index');
            Route::get('/create', [ActivityController::class, 'create'])->name('admin.aktivitas.create');
            Route::post('/store', [ActivityController::class, 'store'])->name('admin.aktivitas.store');
            Route::get('/show/{activity}', [ActivityController::class, 'show'])->name('admin.aktivitas.show');
            Route::get('/edit/{activity}', [ActivityController::class, 'edit'])->name('admin.aktivitas.edit');
            Route::put('/update/{activity}', [ActivityController::class, 'update'])->name('admin.aktivitas.update');
            Route::delete('/delete/{activity}', [ActivityController::class, 'destroy'])->name('admin.aktivitas.destroy');
            // Verivikasi Route
            Route::group(['prefix' => 'relawan'], function () {
                Route::get('/{id}', [VerificationController::class, 'index'])->name('admin.aktivitas.relawan.index');
                Route::post('/change-status', [VerificationController::class, 'changeStatus'])->name('admin.aktivitas.relawan.change-status');
                // Route::put('/approve/{user}', [VerificationController::class, 'approve'])->name('admin.aktivitas.verifikasi.approve');
                // Route::put('/reject/{user}', [VerificationController::class, 'reject'])->name('admin.aktivitas.verifikasi.reject');
            });
            // Absensi Routes
            Route::group(['prefix' => 'absensi'], function () {
                Route::get('/{id}', [AbsensiController::class, 'index'])->name('admin.aktivitas.absensi.index');
                Route::post('/absen', [AbsensiController::class, 'absen'])->name('admin.aktivitas.absensi.absen');
            });
            // Evaluation Routes
            Route::group(['prefix' => 'evaluasi'], function () {
                Route::get('/{id}', [EvaluationController::class, 'index'])->name('admin.aktivitas.evaluasi.index');
                Route::get('/edit/{id}', [EvaluationController::class, 'edit'])->name('admin.aktivitas.evaluasi.edit');
                Route::put('/update/{id}', [EvaluationController::class, 'update'])->name('admin.aktivitas.evaluasi.update');
            });
        });
        // Relawan Routes
        Route::group(['prefix' => 'relawan'], function () {
            Route::get('/', [RelawanController::class, 'index'])->name('admin.relawan.index');
            Route::get('/create', [RelawanController::class, 'create'])->name('admin.relawan.create');
            Route::post('/store', [RelawanController::class, 'store'])->name('admin.relawan.store');
            Route::get('/show/{user}', [RelawanController::class, 'show'])->name('admin.relawan.show');
            Route::get('/edit/{user}', [RelawanController::class, 'edit'])->name('admin.relawan.edit');
            Route::put('/update/{user}', [RelawanController::class, 'update'])->name('admin.relawan.update');
            Route::delete('/delete/{user}', [RelawanController::class, 'destroy'])->name('admin.relawan.destroy');
        });
        // Admin Profile Route
        Route::get('/profil', [AdminProfileController::class, 'index'])->name('admin.profil');
        Route::post('/profil/change-password', [AdminProfileController::class, 'changePassword'])->name('admin.profil.change-password');
    });
});

Route::middleware(['auth', 'role:korlap'])->group(function () {
    Route::group(['prefix' => 'korlap'], function () {
        // Dashboard Route
        Route::get('/dashboardkor', [DashboardController::class, 'index'])->name('korlap.dashboardkor');
        // Acitivity Routes
        Route::group(['prefix' => 'aktivitas'], function () {
            Route::get('/', [ActivityController::class, 'korlapindex'])->name('korlap.aktivitas.index');
            Route::get('/show/{activity}', [ActivityController::class, 'korlapshow'])->name('korlap.aktivitas.show');
            // Absensi Routes
            Route::group(['prefix' => 'absensi'], function () {
                Route::get('/{id}', [AbsensiController::class, 'korlapindex'])->name('korlap.aktivitas.absensi.index');
                Route::post('/absen', [AbsensiController::class, 'absen'])->name('korlap.aktivitas.absensi.absen');
            });
            //Task Route
            Route::group(['prefix' => 'task'], function () {
                Route::get('/{id}', [EvaluationController::class, 'korlapindex'])->name('korlap.tugas.index');
                Route::get('/edit/{id}', [EvaluationController::class, 'korlapedit'])->name('korlap.tugas.edit');
                Route::put('/update/{id}', [EvaluationController::class, 'korlapupdate'])->name('korlap.tugas.update'); 
            });
        });
        // Admin Profile Route
        Route::get('/profil', [AdminProfileController::class, 'korlapindex'])->name('korlap.profil');
        Route::post('/profil/change-password', [AdminProfileController::class, 'changePassword'])->name('korlap.profil.change-password');
    });
});

Route::middleware(['auth', 'role:pimpinan'])->group(function () {
    Route::group(['prefix' => 'pimpinan'], function () {
        // Dashboard Route
        Route::get('/dashboardpim', [DashboardController::class, 'index'])->name('pimpinan.dashboardpim');
        // Acitivity Routes
        Route::group(['prefix' => 'aktivitas'], function () {
            Route::get('/', [ActivityController::class, 'pimindex'])->name('pimpinan.aktivitas.index');
            Route::get('/show/{activity}', [ActivityController::class, 'pimshow'])->name('pimpinan.aktivitas.show');
        //Relawan terlibat
        Route::group(['prefix' => 'relawan'], function () {
            Route::get('/{id}', [VerificationController::class, 'pimindex'])->name('pimpinan.aktivitas.relawan.index');
            // Route::post('/change-status', [VerificationController::class, 'changeStatus'])->name('admin.aktivitas.relawan.change-status');
        });
        //Absensi Route
            Route::group(['prefix' => 'absensi'], function () {
                Route::get('/{id}', [AbsensiController::class, 'pimindex'])->name('pimpinan.aktivitas.absensi.index');
                // Route::post('/absen', [AbsensiController::class, 'absen'])->name('korlap.aktivitas.absensi.absen');
            });
        });
        // Relawan Routes
        Route::group(['prefix' => 'relawan'], function () {
            Route::get('/', [RelawanController::class, 'pimindex'])->name('pimpinan.relawan.index');
            Route::get('/show/{user}', [RelawanController::class, 'show'])->name('pimpinan.relawan.show');
        });
        // Admin Profile Route
        Route::get('/profil', [AdminProfileController::class, 'pimindex'])->name('pimpinan.profil');
        Route::post('/profil/change-password', [AdminProfileController::class, 'changePassword'])->name('pimpinan.profil.change-password');
    });
});

Route::middleware(['auth', 'role:user'])->group(function () {
    // Activity Registration Routes
    Route::group(['prefix' => 'registrasi'], function () {
        Route::post('/store', [ActivityRegistrationController::class, 'store'])->name('relawan.registrasi.store');
        Route::delete('/delete/{activityRegistration}', [ActivityRegistrationController::class, 'destroy'])->name('relawan.registrasi.destroy');
    });
    // User Profile Route
    Route::group(['prefix' => 'profil'], function () {
        Route::get('/', [ProfileController::class, 'index'])->name('relawan.profil');
        // Route::get('/show/{user}', [ProfileController::class, 'show'])->name('relawan.profil.show');
        Route::get('/show/{id}', [ProfileController::class, 'show'])->name('relawan.profil.show');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('relawan.profil.edit');
        Route::put('/update', [ProfileController::class, 'update'])->name('relawan.profil.update');
    });
});

require __DIR__ . '/auth.php';
