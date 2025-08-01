<?php

namespace App\Livewire\Mitra\PengujianMaterial;

use App\Models\Mitra;
use App\Models\JenisPengujian;
use App\Models\HasilPengujian;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Create extends Component
{
    public $id_hasil_pengujian;

    public $id_mitra;
    public $id_jenis_pengujian, $jenis_sampel, $qty_sampel;
    public $keterangan;

    public $status_data, $created_at, $updated_at, $deleted_at;

    public function mount()
    {
        $this->id_mitra = session('session_id');
    }

    public function resetForm()
    {
        $this->id_hasil_pengujian = null;

        $this->id_mitra = null;
        $this->id_jenis_pengujian = null;
        $this->jenis_sampel = null;
        $this->qty_sampel = null;
        $this->keterangan = null;

        $this->status_data = null;
        $this->created_at = null;
        $this->updated_at = null;
        $this->deleted_at = null;
    }

    public function store()
    {
        $this->validate([
            'id_mitra' => 'required',
            'id_jenis_pengujian' => 'required',
            'jenis_sampel' => 'required',
            'qty_sampel' => 'required',
            'keterangan' => 'required'
        ]);

        // Ambil data biaya pengujian
        $jenisPengujian = JenisPengujian::findOrFail($this->id_jenis_pengujian);
        $biayaPengujian = $jenisPengujian->biaya_pengujian ?? 0;

        // Hitung nominal pembayaran
        $nominal_pembayaran = $biayaPengujian * (int) $this->qty_sampel;

        HasilPengujian::create([

            // foreign key - 
            'id_mitra' => $this->id_mitra,
            'id_jenis_pengujian' => $this->id_jenis_pengujian,

            // registrasi & pendaftaran
            'tanggal_pendaftaran' => Carbon::now(),
            'status_pendaftaran' => 'Belum Disetujui',

            // sampel material
            'jenis_sampel' => $this->jenis_sampel,
            'qty_sampel' => $this->qty_sampel,
            'status_sampel' => 'Belum Dikirim',

            // pengujian material
            'status_verifikasi' => 'Belum Diverifikasi',
            'status_pengujian' => 'Belum Selesai',

            // tagihan invoice
            'status_invoice' => 'Belum Diberikan',

            // proses pembayaran
            'nominal_pembayaran' => $nominal_pembayaran,
            'status_pembayaran' => 'Belum Dibayar',

            // kwitansi pembayaran
            'status_kwitansi' => 'Belum Diberikan',

            'keterangan' => $this->keterangan,
            'status_data' => 'Aktif',
            'created_at' => Carbon::now(),
            'update_at' => Carbon::now(),
        ]);

        $this->resetForm();

        return redirect()->route('mitra.pengujian-material.index')->with('message', 'Proses pendaftaran berhasil disimpan.');
    }

    public $listMitra;
    public $listJenisPengujian;

    public function render()
    {
        $this->listMitra = Mitra::where('status_data', 'Aktif')->orderBy('nama_mitra', 'asc')->get();

        $this->listJenisPengujian = JenisPengujian::where('status_data', 'Aktif')->orderBy('nama_pengujian', 'asc')->get();

        return view('livewire.mitra.pengujian-material.create', [
            'listMitra' => $this->listMitra,
            'listJenisPengujian' => $this->listJenisPengujian,
        ]);
    }
}
