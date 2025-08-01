<?php

use Illuminate\Support\Facades\Route;

// Dashboard 
use App\Livewire\Admin\Dashboard as DashboardAdmin;
use App\Livewire\Mitra\Dashboard as DashboardMitra;

// Data Pegawai
use App\Livewire\Admin\Pegawai\Index as PegawaiIndex;
use App\Livewire\Admin\Pegawai\Create as PegawaiCreate;
use App\Livewire\Admin\Pegawai\Edit as PegawaiEdit;
use App\Livewire\Admin\Pegawai\Drop as PegawaiDrop;

// Data Mitra
use App\Livewire\Admin\Mitra\Index as MitraIndex;
use App\Livewire\Admin\Mitra\Create as MitraCreate;
use App\Livewire\Admin\Mitra\Edit as MitraEdit;
use App\Livewire\Admin\Mitra\Drop as MitraDrop;

// Data Jenis Pengujian
use App\Livewire\Admin\JenisPengujian\Index as JenisPengujianIndex;
use App\Livewire\Admin\JenisPengujian\Create as JenisPengujianCreate;
use App\Livewire\Admin\JenisPengujian\Edit as JenisPengujianEdit;
use App\Livewire\Admin\JenisPengujian\Drop as JenisPengujianDrop;

// Data Hasil Pengujian
use App\Livewire\Admin\HasilPengujian\Index as HasilPengujianIndex;
use App\Livewire\Admin\HasilPengujian\Create as HasilPengujianCreate;
use App\Livewire\Admin\HasilPengujian\Edit as HasilPengujianEdit;
use App\Livewire\Admin\HasilPengujian\Drop as HasilPengujianDrop;

// Laporan Keuangan
use App\Livewire\Admin\LaporanKeuangan\Index as LaporanKeuanganIndex;

// ---------------------------------------------------------------------------------------

// Data Pegawai
use App\Livewire\Mitra\PengujianMaterial\Index as MT_PengujianMaterialIndex;
use App\Livewire\Mitra\PengujianMaterial\Create as MT_PengujianMaterialCreate;
use App\Livewire\Mitra\PengujianMaterial\Edit as MT_PengujianMaterialEdit;
use App\Livewire\Mitra\PengujianMaterial\Drop as MT_PengujianMaterialDrop;


// ---------------------------- Auth -------------------------------------- //
Route::get('/', \App\Livewire\Auth\Login::class)
    ->middleware('redirectauth')
    ->name('login');

Route::get('/login', \App\Livewire\Auth\Login::class)
    ->middleware('redirectauth')
    ->name('login');

Route::get('/register', \App\Livewire\Auth\Register::class)
    ->middleware('redirectauth')
    ->name('register');

Route::get('/logout', function () {
    session()->flush();
    return redirect()->route('login');
})->name('logout');


// ------------------------- Dashboard ------------------------------------ //
Route::get('/admin/dashboard', \App\Livewire\Admin\Dashboard::class)
    ->middleware('simpleauth:pegawai')
    ->name('admin.dashboard');

Route::get('/mitra/dashboard', \App\Livewire\Mitra\Dashboard::class)
    ->middleware('simpleauth:mitra')
    ->name('mitra.dashboard');


// --------------------------- Admin Routes ------------------------------- //
//Route::prefix('admin')->name('admin.')->group(function () {
Route::prefix('admin')->name('admin.')->middleware('simpleauth:pegawai')->group(function () {

    // Menu Pegawai
    Route::get('/pegawai', PegawaiIndex::class)->name('pegawai.index');
    Route::get('/pegawai/create', PegawaiCreate::class)->name('pegawai.create');
    Route::get('/pegawai/edit/{id}', PegawaiEdit::class)->name('pegawai.edit');
    Route::get('/pegawai/drop/{id}', PegawaiDrop::class)->name('pegawai.drop');

    // Menu Mitra
    Route::get('/mitra', MitraIndex::class)->name('mitra.index');
    Route::get('/mitra/create', MitraCreate::class)->name('mitra.create');
    Route::get('mitra/edit/{id}', MitraEdit::class)->name('mitra.edit');
    Route::get('mitra/drop/{id}', MitraDrop::class)->name('mitra.drop');

    // Menu Jenis Pengujian
    Route::get('/jenis-pengujian', JenisPengujianIndex::class)->name('jenis-pengujian.index');
    Route::get('/jenis-pengujian/create', JenisPengujianCreate::class)->name('jenis-pengujian.create');
    Route::get('jenis-pengujian/edit/{id}', JenisPengujianEdit::class)->name('jenis-pengujian.edit');
    Route::get('jenis-pengujian/drop/{id}', JenisPengujianDrop::class)->name('jenis-pengujian.drop');

    // Menu Hasil Pengujian
    Route::get('/hasil-pengujian', HasilPengujianIndex::class)->name('hasil-pengujian.index');
    Route::get('/hasil-pengujian/create', HasilPengujianCreate::class)->name('hasil-pengujian.create');
    Route::get('hasil-pengujian/edit/{id}', HasilPengujianEdit::class)->name('hasil-pengujian.edit');
    Route::get('hasil-pengujian/drop/{id}', HasilPengujianDrop::class)->name('hasil-pengujian.drop');

    // Coming Soon
    Route::get('/laporan-keuangan', LaporanKeuanganIndex::class)->name('laporan-keuangan.index');
});


// ---------------------------- Mitra Routes ------------------------------ //
//Route::prefix('mitra')->name('mitra.')->group(function () {
Route::prefix('mitra')->name('mitra.')->middleware('simpleauth:mitra')->group(function () {
    Route::get('/pengujian-material', MT_PengujianMaterialIndex::class)->name('pengujian-material.index');
    Route::get('/pengujian-material/create', MT_PengujianMaterialCreate::class)->name('pengujian-material.create');
    Route::get('pengujian-material/edit/{id}', MT_PengujianMaterialEdit::class)->name('pengujian-material.edit');
    Route::get('pengujian-material/drop/{id}', MT_PengujianMaterialDrop::class)->name('pengujian-material.drop');
});
