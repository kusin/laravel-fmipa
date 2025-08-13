<?php

namespace App\Livewire\Admin\Mitra;

use App\Models\Mitra;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Drop extends Component
{
    public $id_mitra, $nik_mitra, $nama_mitra, $email_mitra, $telp_mitra, $nama_institusi, $alamat_institusi, $status_data;
    public $created_at, $updated_at, $deleted_at;

    public function resetForm()
    {
        $this->id_mitra = null;
        $this->nik_mitra = '';
        $this->nama_mitra = '';
        $this->email_mitra = '';
        $this->telp_mitra = '';
        $this->nama_institusi = '';
        $this->alamat_institusi = '';
        $this->status_data = '';
        $this->created_at = null;
        $this->updated_at = null;
        $this->deleted_at = null;
    }

    public function mount($id)
    {
        $mitra = Mitra::where('id_mitra', $id)->firstOrFail();
        $this->id_mitra = $mitra->id_mitra;
        $this->nik_mitra = $mitra->nik_mitra;
        $this->nama_mitra = $mitra->nama_mitra;
        $this->email_mitra = $mitra->email_mitra;
        $this->telp_mitra = $mitra->telp_mitra;
        $this->nama_institusi = $mitra->nama_institusi;
    }

    public function delete()
    {
        $mitra = Mitra::where('id_mitra', $this->id_mitra)->firstOrFail();
        $mitra->update([
            'status_data' => 'Tidak Aktif',
            'deleted_at' => Carbon::now(),
        ]);

        $this->resetForm();

        return redirect()->route('admin.mitra.index')->with('message', 'Data mitra berhasil dihapus.');
    }

    public function render()
    {
        return view('livewire.admin.mitra.drop');
    }
}
