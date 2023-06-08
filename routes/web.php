<?php

use App\Http\Controllers\{DiagnosaController, DokterController, HomeController, KunjunganController, ObatController, PasienController, PoliController, AntrianController, LaporanmedisController, UserController, PeriksaController};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


#Authenticate Login
Route::group(['middleware' => ['auth']], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Antrian
    Route::prefix('antrian')->middleware(['checkRole:admin,pasien'])->group(function(){
        Route::get('/', [AntrianController::class, 'index'])->name('antrian');
        // Route::get('/', [AntrianController::class, 'antrian'])->name('antrian');
        Route::get('/create', [AntrianController::class, 'create'])->name('antrian.create');
        Route::post('/store', [AntrianController::class, 'store'])->name('antrian.store');
        Route::get('/{antrian}/update', [AntrianController::class, 'update'])->name('antrian.update');
        Route::patch('/{antrian}/edit', [AntrianController::class, 'edit'])->name('antrian.edit');
        Route::delete('/{antrian}/destroy', [AntrianController::class, 'destroy'])->name('antrian.destroy');

    });

    // Diagnosa
    Route::prefix('diagnosa')->middleware(['checkRole:admin'])->group(function(){
        Route::get('/get-diagnosa/{dokter:nama_diagnosa}', [DiagnosaController::class, 'getDiagnosa']);
        Route::get('/', [DiagnosaController::class, 'index'])->name('diagnosa');
        Route::get('/create', [DiagnosaController::class, 'create'])->name('diagnosa.create');
        Route::post('/store', [DiagnosaController::class, 'store'])->name('diagnosa.store');
        Route::get('/{diagnosa}/update', [DiagnosaController::class, 'update'])->name('diagnosa.update');
        Route::patch('/{diagnosa}/edit', [DiagnosaController::class, 'edit'])->name('diagnosa.edit');
        Route::delete('/{diagnosa}/destroy', [DiagnosaController::class, 'destroy'])->name('diagnosa.destroy');

    });

    // Poli
    Route::prefix('poli')->middleware(['checkRole:admin'])->group(function(){
        Route::get('/', [PoliController::class, 'index'])->name('poli');
        Route::get('/create', [PoliController::class, 'create'])->name('poli.create');
        Route::post('/store', [PoliController::class, 'store'])->name('poli.store');
        Route::get('/{poli}/update', [PoliController::class, 'update'])->name('poli.update');
        Route::patch('/{poli}/edit', [PoliController::class, 'edit'])->name('poli.edit');
        Route::delete('/{poli}/destroy', [PoliController::class, 'destroy'])->name('poli.destroy');

    });

    // Pasien
    Route::prefix('pasien')->middleware(['checkRole:admin,pasien'])->group(function(){
        Route::get('/get-pasien/{pasien:nama_pasien}', [PasienController::class, 'getPasien']);
        Route::get('/', [PasienController::class, 'index'])->name('pasien');
        Route::get('/create', [PasienController::class, 'create'])->name('pasien.create');
        Route::post('/store', [PasienController::class, 'store'])->name('pasien.store');
        Route::get('/{pasien}/update', [PasienController::class, 'update'])->name('pasien.update');
        Route::patch('/{pasien}/edit', [PasienController::class, 'edit'])->name('pasien.edit');
        Route::delete('/{pasien}/destroy', [PasienController::class, 'destroy'])->name('pasien.destroy');
    });

    // obat
    Route::prefix('obat')->middleware(['checkRole:admin,apoteker'])->group(function(){
        Route::get('/', [ObatController::class, 'index'])->name('obat');
        Route::get('/create', [ObatController::class, 'create'])->name('obat.create');
        Route::post('/store', [ObatController::class, 'store'])->name('obat.store');
        Route::get('/{obat}/update', [ObatController::class, 'update'])->name('obat.update');
        Route::get('/{obat}/detail', [ObatController::class, 'detail'])->name('obat.detail');
        Route::patch('/{obat}/edit', [ObatController::class, 'edit'])->name('obat.edit');
        Route::delete('/{obat}/destroy', [ObatController::class, 'destroy'])->name('obat.destroy');}
    );

    // dokter
    Route::prefix('dokter')->middleware(['checkRole:admin,pasien'])->group(function(){
        Route::get('/get-dokter/{dokter:nama_dokter}', [DokterController::class, 'getDokter']);
        Route::get('/', [DokterController::class, 'index'])->name('dokter');
        Route::get('/create', [DokterController::class, 'create'])->name('dokter.create');
        Route::post('/store', [DokterController::class, 'store'])->name('dokter.store');
        Route::get('/{dokter}/update', [DokterController::class, 'update'])->name('dokter.update');
        Route::patch('/{dokter}/edit', [DokterController::class, 'edit'])->name('dokter.edit');
        Route::delete('/{dokter}/destroy', [DokterController::class, 'destroy'])->name('dokter.destroy');
    });

    // Kunjungan
    Route::prefix('kunjungan')->middleware(['checkRole:admin'])->group(function(){
        Route::get('/', [KunjunganController::class, 'index'])->name('kunjungan');
        Route::get('/create/step1', [KunjunganController::class, 'createStep1'])->name('kunjungan.create.step1');
        Route::post('/step1', [KunjunganController::class, 'step1'])->name('kunjungan.step1');

        Route::get('/create/step2', [KunjunganController::class, 'createStep2'])->name('kunjungan.create.step2');
        Route::put('/step2', [KunjunganController::class, 'step2'])->name('kunjungan.step2');

        Route::get('/create/step3', [KunjunganController::class, 'createStep3'])->name('kunjungan.create.step3');
        Route::put('/step3', [KunjunganController::class, 'step3'])->name('kunjungan.step3');

        // Route::get('/create/step4', [KunjunganController::class, 'createStep4'])->name('kunjungan.create.step4');
        // Route::put('/step4', [KunjunganController::class, 'step4'])->name('kunjungan.step4');

        Route::delete('/{kunjungan}/destroy', [KunjunganController::class, 'destroy'])->name('kunjungan.destroy');

    });
    
    // Laporan Pasien
    Route::prefix('laporan')->middleware(['checkRole:admin, kepala_klinik'])->group(function(){
        Route::get('/get-pasien/{pasien:nama_pasien}', [LaporanmedisController::class, 'getPasien']);
        Route::get('/', [LaporanmedisController::class, 'laporanpasien'])->name('laporan');

        Route::get('/{pasien}/cetak_pdf', [LaporanmedisController::class, 'cetak'])->name('pasien.cetak');
        // Route::delete('/{pasien}/destroy', [LaporanmedisController::class, 'destroy'])->name('pasien.destroy');
    });

    // Laporan Medis
    Route::prefix('laporanmedis')->middleware(['checkRole:admin, kepala_klinik'])->group(function(){
        //Route::get('/', [LaporanmedisController::class, 'laporanpasien'])->name('laporan');
        // Route::get('/{pasien}/cetak_pdf', [LaporanmedisController::class, 'cetak'])->name('pasien.cetak');
        // Route::delete('/{pasien}/destroy', [LaporanmedisController::class, 'destroy'])->name('pasien.destroy');
    });

    // user
    Route::prefix('user')->middleware(['checkRole:admin'])->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('user');
        Route::delete('/{user}/destroy', [UserController::class, 'destroy'])->name('user.destroy');

    });

    // periksa
    Route::prefix('periksa')->middleware(['checkRole:admin'])->group(function(){
        Route::get('/', [PeriksaController::class, 'index'])->name('periksa');
        Route::get('/{poli}/{antrian}', [PeriksaController::class, 'index'])->name('periksa.pasien');
        Route::get('/create/step1', [PeriksaController::class, 'createStep1'])->name('periksa.create.step1');
        Route::post('/step1', [PeriksaController::class, 'step1'])->name('periksa.step1');

        Route::get('/create/step2', [PeriksaController::class, 'createStep2'])->name('periksa.create.step2');
        Route::post('/step2', [PeriksaController::class, 'step2'])->name('periksa.step2');

        Route::get('/create/step3', [PeriksaController::class, 'createStep3'])->name('periksa.create.step3');
        Route::post('/step3', [PeriksaController::class, 'step3'])->name('periksa.step3');

    });

    // #Admin
    // Route::group(['middleware' => ['Admin']], function () {
    //     Route::group(['prefix' => 'antrian'], function(){
    //         Route::get('/', [AntrianController::class, 'index'])->name('antrian');
    //         Route::get('/create', [AntrianController::class, 'create'])->name('antrian.create');
    //         Route::post('/store', [AntrianController::class, 'store'])->name('antrian.store');
    //         Route::get('/{antrian}/update', [AntrianController::class, 'update'])->name('antrian.update');
    //         Route::patch('/{antrian}/edit', [AntrianController::class, 'edit'])->name('antrian.edit');
    //         Route::delete('/{antrian}/destroy', [AntrianController::class, 'destroy'])->name('antrian.destroy');
    //     });

    //     Route::group(['prefix' => 'poli'], function(){
    //         Route::get('/', [PoliController::class, 'index'])->name('poli');
    //         Route::get('/create', [PoliController::class, 'create'])->name('poli.create');
    //         Route::post('/store', [PoliController::class, 'store'])->name('poli.store');
    //         Route::get('/{poli}/update', [PoliController::class, 'update'])->name('poli.update');
    //         Route::patch('/{poli}/edit', [PoliController::class, 'edit'])->name('poli.edit');
    //         Route::delete('/{poli}/destroy', [PoliController::class, 'destroy'])->name('poli.destroy');
    //     });

    //     Route::group(['prefix' => 'pasien'], function(){
    //         Route::get('/get-pasien/{pasien:nama_pasien}', [PasienController::class, 'getPasien']);
    //         Route::get('/', [PasienController::class, 'index'])->name('pasien');
    //         Route::get('/create', [PasienController::class, 'create'])->name('pasien.create');
    //         Route::post('/store', [PasienController::class, 'store'])->name('pasien.store');
    //         Route::get('/{pasien}/update', [PasienController::class, 'update'])->name('pasien.update');
    //         Route::patch('/{pasien}/edit', [PasienController::class, 'edit'])->name('pasien.edit');
    //         Route::delete('/{pasien}/destroy', [PasienController::class, 'destroy'])->name('pasien.destroy');
    //     });

    //     Route::group(['prefix' => 'obat'], function(){
    //         Route::get('/', [ObatController::class, 'index'])->name('obat');
    //         Route::get('/create', [ObatController::class, 'create'])->name('obat.create');
    //         Route::post('/store', [ObatController::class, 'store'])->name('obat.store');
    //         Route::get('/{obat}/update', [ObatController::class, 'update'])->name('obat.update');
    //         Route::get('/{obat}/detail', [ObatController::class, 'detail'])->name('obat.detail');
    //         Route::patch('/{obat}/edit', [ObatController::class, 'edit'])->name('obat.edit');
    //         Route::delete('/{obat}/destroy', [ObatController::class, 'destroy'])->name('obat.destroy');
    //     });

    //     Route::group(['prefix' => 'dokter'], function(){
    //         Route::get('/get-dokter/{dokter:nama_dokter}', [DokterController::class, 'getDokter']);
    //         Route::get('/', [DokterController::class, 'index'])->name('dokter');
    //         Route::get('/create', [DokterController::class, 'create'])->name('dokter.create');
    //         Route::post('/store', [DokterController::class, 'store'])->name('dokter.store');
    //         Route::get('/{dokter}/update', [DokterController::class, 'update'])->name('dokter.update');
    //         Route::patch('/{dokter}/edit', [DokterController::class, 'edit'])->name('dokter.edit');
    //         Route::delete('/{dokter}/destroy', [DokterController::class, 'destroy'])->name('dokter.destroy');
    //     });

    //     Route::group(['prefix' => 'diagnosa'], function(){
    //         Route::get('/get-diagnosa/{dokter:nama_diagnosa}', [DiagnosaController::class, 'getDiagnosa']);
    //         Route::get('/', [DiagnosaController::class, 'index'])->name('diagnosa');
    //         Route::get('/create', [DiagnosaController::class, 'create'])->name('diagnosa.create');
    //         Route::post('/store', [DiagnosaController::class, 'store'])->name('diagnosa.store');
    //         Route::get('/{diagnosa}/update', [DiagnosaController::class, 'update'])->name('diagnosa.update');
    //         Route::patch('/{diagnosa}/edit', [DiagnosaController::class, 'edit'])->name('diagnosa.edit');
    //         Route::delete('/{diagnosa}/destroy', [DiagnosaController::class, 'destroy'])->name('diagnosa.destroy');
    //     });

    //     Route::group(['prefix' => 'kunjungan'], function(){
    //         Route::get('/', [KunjunganController::class, 'index'])->name('kunjungan');
    //         Route::get('/create/step1', [KunjunganController::class, 'createStep1'])->name('kunjungan.create.step1');
    //         Route::post('/step1', [KunjunganController::class, 'step1'])->name('kunjungan.step1');

    //         Route::get('/create/step2', [KunjunganController::class, 'createStep2'])->name('kunjungan.create.step2');
    //         Route::put('/step2', [KunjunganController::class, 'step2'])->name('kunjungan.step2');

    //         Route::get('/create/step3', [KunjunganController::class, 'createStep3'])->name('kunjungan.create.step3');
    //         Route::put('/step3', [KunjunganController::class, 'step3'])->name('kunjungan.step3');

    //         // Route::get('/create/step4', [KunjunganController::class, 'createStep4'])->name('kunjungan.create.step4');
    //         // Route::put('/step4', [KunjunganController::class, 'step4'])->name('kunjungan.step4');

    //         Route::delete('/{kunjungan}/destroy', [KunjunganController::class, 'destroy'])->name('kunjungan.destroy');
    //     });

    //     Route::group(['prefix' => 'laporan'], function(){
    //         Route::get('/get-pasien/{pasien:nama_pasien}', [LaporanmedisController::class, 'getPasien']);
    //         Route::get('/', [LaporanmedisController::class, 'laporanpasien'])->name('laporan');

    //         Route::get('/{pasien}/cetak_pdf', [LaporanmedisController::class, 'cetak'])->name('pasien.cetak');
    //         // Route::delete('/{pasien}/destroy', [LaporanmedisController::class, 'destroy'])->name('pasien.destroy');

    //     });

    //     Route::group(['prefix' => 'laporanmedis'], function(){
    //         //Route::get('/', [LaporanmedisController::class, 'laporanpasien'])->name('laporan');
    //         // Route::get('/{pasien}/cetak_pdf', [LaporanmedisController::class, 'cetak'])->name('pasien.cetak');
    //         // Route::delete('/{pasien}/destroy', [LaporanmedisController::class, 'destroy'])->name('pasien.destroy');

    //     });

    //     Route::group(['prefix' => 'user'], function(){
    //         Route::get('/', [UserController::class, 'index'])->name('user');
    //         Route::delete('/{user}/destroy', [UserController::class, 'destroy'])->name('user.destroy');
        
    //     });
    // });

    // #Pasien
    // Route::group(['middleware' => ['Pasien']], function () {
    //     Route::group(['prefix' => 'pasien'], function(){
    //         Route::get('/get-pasien/{pasien:nama_pasien}', [PasienController::class, 'getPasien']);
    //         // Route::get('/', [PasienController::class, 'index'])->name('pasien');
    //         Route::get('/create', [PasienController::class, 'create'])->name('pasien.create');
    //         Route::post('/store', [PasienController::class, 'store'])->name('pasien.store');
    //         Route::get('/{pasien}/update', [PasienController::class, 'update'])->name('pasien.update');
    //         Route::patch('/{pasien}/edit', [PasienController::class, 'edit'])->name('pasien.edit');
    //         Route::delete('/{pasien}/destroy', [PasienController::class, 'destroy'])->name('pasien.destroy');
    //     });

    //     Route::group(['prefix' => 'antrian'], function(){
    //         // Route::get('/', [AntrianController::class, 'antrian'])->name('antrian');
    //         Route::get('/create', [AntrianController::class, 'create'])->name('antrian.create');
    //         Route::post('/store', [AntrianController::class, 'store'])->name('antrian.store');
    //         Route::get('/{antrian}/update', [AntrianController::class, 'update'])->name('antrian.update');
    //         Route::patch('/{antrian}/edit', [AntrianController::class, 'edit'])->name('antrian.edit');
    //         Route::delete('/{antrian}/destroy', [AntrianController::class, 'destroy'])->name('antrian.destroy');
    //     });
    // });

    // #Apoteker
    // Route::group(['prefix' => 'obat', 'middleware' => ['Apoteker']], function(){
    //     Route::get('/', [ObatController::class, 'index'])->name('obat');
    //     Route::get('/create', [ObatController::class, 'create'])->name('obat.create');
    //     Route::post('/store', [ObatController::class, 'store'])->name('obat.store');
    //     Route::get('/{obat}/update', [ObatController::class, 'update'])->name('obat.update');
    //     Route::get('/{obat}/detail', [ObatController::class, 'detail'])->name('obat.detail');
    //     Route::patch('/{obat}/edit', [ObatController::class, 'edit'])->name('obat.edit');
    //     Route::delete('/{obat}/destroy', [ObatController::class, 'destroy'])->name('obat.destroy');
    // });

    // #Kepala Klinik
    // Route::group(['middleware' => ['Kepala_Klinik']], function () {
    //     Route::group(['prefix' => 'laporan'], function(){
    //         Route::get('/get-pasien/{pasien:nama_pasien}', [LaporanmedisController::class, 'getPasien']);
    //         Route::get('/', [LaporanmedisController::class, 'laporanpasien'])->name('laporan');

    //         Route::get('/{pasien}/cetak_pdf', [LaporanmedisController::class, 'cetak'])->name('pasien.cetak');
    //         // Route::delete('/{pasien}/destroy', [LaporanmedisController::class, 'destroy'])->name('pasien.destroy');

    //     });

    //     Route::group(['prefix' => 'laporanmedis'], function(){
    //         //Route::get('/', [LaporanmedisController::class, 'laporanpasien'])->name('laporan');
    //         // Route::get('/{pasien}/cetak_pdf', [LaporanmedisController::class, 'cetak'])->name('pasien.cetak');
    //         // Route::delete('/{pasien}/destroy', [LaporanmedisController::class, 'destroy'])->name('pasien.destroy');

    //     });

    // });
});

Auth::routes();