<?php

namespace App\Livewire\Admin\JenisPengujian;

use App\Models\JenisPengujian;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Drop extends Component
{
    public $id_jenis_pengujian,
        $nama_pengujian,
        $jenis_pengujian,
        $deskripsi_pengujian,
        $alat_pengujian,
        $jumlah_alat,
        $metode_pengujian,
        $waktu_pengujian,
        $keterangan_sampel,
        $biaya_pengujian;

    public $status_data, $created_at, $updated_at, $deleted_at;

    public function resetForm()
    {
        $this->jenis_pengujian = null;
        $this->nama_pengujian = '';
        $this->jenis_pengujian = '';
        $this->deskripsi_pengujian = '';
        $this->alat_pengujian = '';
        $this->jumlah_alat = '';
        $this->metode_pengujian = '';
        $this->waktu_pengujian = '';
        $this->keterangan_sampel = '';
        $this->biaya_pengujian = '';
        $this->status_data = '';
        $this->updated_at = null;
        $this->created_at = null;
        $this->deleted_at = null;
    }

    public function mount($id)
    {
        $data = JenisPengujian::where('id_jenis_pengujian', $id)->firstOrFail();
        $this->id_jenis_pengujian = $data->id_jenis_pengujian;
        $this->nama_pengujian = $data->nama_pengujian;
        $this->jenis_pengujian = $data->jenis_pengujian;
        $this->deskripsi_pengujian = $data->deskripsi_pengujian;
        $this->alat_pengujian = $data->alat_pengujian;
        $this->jumlah_alat = $data->jumlah_alat;
        $this->metode_pengujian = $data->metode_pengujian;
        $this->waktu_pengujian = $data->waktu_pengujian;
        $this->keterangan_sampel = $data->keterangan_sampel;
        $this->biaya_pengujian = $data->biaya_pengujian;
        $this->status_data = $data->status_data;
    }

    public function delete()
    {
        $data = JenisPengujian::where('id_jenis_pengujian', $this->id_jenis_pengujian)->firstOrFail();
        $data->update([
            'status_data' => 'Tidak Aktif',
            'deleted_at' => Carbon::now(),
        ]);

        $this->resetForm();

        return redirect()->route('admin.jenis-pengujian.index')->with('message', 'Data jenis pengujian berhasil dihapus.');
    }

    public function render()
    {
        return view('livewire.admin.jenis-pengujian.drop');
    }
}
