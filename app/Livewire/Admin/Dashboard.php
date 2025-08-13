<?php

namespace App\Livewire\Admin;

use App\Models\Mitra;
use App\Models\Pegawai;
use App\Models\JenisPengujian;
use App\Models\HasilPengujian;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    // attribute data-data 1
    public $jumlah_pegawai;
    public $jumlah_mitra;
    public $jumlah_jenis_pengujian;
    public $total_pemasukan;

    public $status_pengujian;
    public $status_verifikasi;

    public function mount()
    {
        // Informasi Umum Aplikasi
        $this->jumlah_pegawai = [
            'tenaga_ahli' => Pegawai::where('keahlian', 'Tenaga Ahli')->where('status_data', 'Aktif')->count('id_pegawai'),
            'teknisi_it' => Pegawai::where('keahlian', 'Teknisi IT')->where('status_data', 'Aktif')->count('id_pegawai'),
            'teknisi_laboran' => Pegawai::where('keahlian', 'Teknisi Laboran')->where('status_data', 'Aktif')->count('id_pegawai'),
        ];
        $this->jumlah_mitra = Mitra::where('status_data', 'Aktif')->count('id_mitra');
        $this->jumlah_jenis_pengujian = JenisPengujian::where('status_data', 'Aktif')->count('id_jenis_pengujian');
        $this->total_pemasukan = HasilPengujian::where('status_pembayaran', 'Sudah Dibayar')->where('status_data', 'Aktif')->sum('nominal_pembayaran');

        // Informasi Hasil Pengujian
        $this->status_verifikasi = JenisPengujian::select('nama_pengujian', 'jenis_pengujian')
            ->withCount([
                'hasilPengujian as belum_diverifikasi' => function ($query) {
                    $query->where('status_verifikasi', 'Belum Diverifikasi');
                },
                'hasilPengujian as sedang_diverifikasi' => function ($query) {
                    $query->where('status_verifikasi', 'Sedang Diverifikasi');
                },
                'hasilPengujian as sudah_diverifikasi' => function ($query) {
                    $query->where('status_verifikasi', 'Sudah Diverifikasi');
                },
            ])->orderBy('nama_pengujian')->get();

        // Informasi Hasil Pengujian
        $this->status_pengujian = JenisPengujian::select('nama_pengujian', 'jenis_pengujian')
            ->withCount([
                'hasilPengujian as belum_selesai' => function ($query) {
                    $query->where('status_pengujian', 'Belum Selesai');
                },
                'hasilPengujian as sedang_proses' => function ($query) {
                    $query->where('status_pengujian', 'Sedang Proses');
                },
                'hasilPengujian as sudah_selesai' => function ($query) {
                    $query->where('status_pengujian', 'Sudah Selesai');
                },
            ])->orderBy('nama_pengujian')->get();
    }

    public function render()
    {
        return view('livewire.admin.dashboard', [
            'pegawai' => $this->jumlah_pegawai,
            'mitra' => $this->jumlah_mitra,
            'jenis_pengujian' => $this->jumlah_jenis_pengujian,
            'total_pemasukan' => $this->total_pemasukan,
            'status_verifikasi' => $this->status_verifikasi,
            'status_pengujian' => $this->status_pengujian,
        ]);
    }
}
