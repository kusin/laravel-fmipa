<?php

namespace App\Livewire\Mitra\PengujianMaterial;

use App\Models\Mitra;
use App\Models\JenisPengujian;
use App\Models\HasilPengujian;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Edit extends Component
{
    public $id_hasil_pengujian;

    public $id_mitra;
    public $id_jenis_pengujian, $jenis_sampel, $qty_sampel;
    public $keterangan;

    public $status_data, $created_at, $updated_at, $deleted_at;

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

    public $listMitra = [];
    public $listJenisPengujian = [];

    public function mount($id)
    {
        $this->listMitra = Mitra::where('status_data', 'Aktif')
            ->orderBy('nama_mitra', 'asc')->get();
        $this->listJenisPengujian = JenisPengujian::where('status_data', 'Aktif')
            ->orderBy('nama_pengujian', 'asc')->get();

        $data = HasilPengujian::where('id_hasil_pengujian', $id)->firstOrFail();

        $this->id_hasil_pengujian = $data->id_hasil_pengujian;
        $this->id_jenis_pengujian = $data->id_jenis_pengujian;
        $this->id_mitra = $data->id_mitra;
        $this->jenis_sampel = $data->jenis_sampel ?? null;
        $this->qty_sampel = $data->qty_sampel ?? null;
        $this->keterangan = $data->keterangan ?? null;
        $this->status_data = $data->status_data ?? null;
    }

    public function update()
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

        $data = HasilPengujian::where('id_hasil_pengujian', $this->id_hasil_pengujian)->firstOrFail();
        $data->update([

            'id_mitra' => $this->id_mitra,
            'id_jenis_pengujian' => $this->id_jenis_pengujian,

            'jenis_sampel' => $this->jenis_sampel ?: null,
            'qty_sampel' => $this->qty_sampel ?: null,
            'keterangan' => $this->keterangan ?: null,

            'tanggal_pendaftaran' => Carbon::now(),
            'status_pendaftaran' => 'Belum Disetujui',
            'nominal_pembayaran' => $nominal_pembayaran,

            'status_data' => 'Aktif',
            'created_at' => Carbon::now(),
            'update_at' => Carbon::now(),
        ]);

        $this->resetForm();

        return redirect()->route('mitra.pengujian-material.index')->with('message', 'Proses pendaftaran berhasil diubah.');
    }

    public function render()
    {
        return view('livewire.mitra.pengujian-material.edit');
    }
}
