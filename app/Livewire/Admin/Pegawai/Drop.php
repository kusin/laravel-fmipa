<?php

namespace App\Livewire\Admin\Pegawai;

use App\Models\Pegawai;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Drop extends Component
{
    public $id_pegawai, $nama_pegawai, $email_pegawai, $telp_pegawai, $keahlian, $status_data;
    public $created_at, $updated_at, $deleted_at;

    public function resetForm()
    {
        $this->id_pegawai = null;
        $this->nama_pegawai = '';
        $this->email_pegawai = '';
        $this->telp_pegawai = '';
        $this->keahlian = '';
        $this->status_data = '';
        $this->updated_at = null;
        $this->created_at = null;
        $this->deleted_at = null;
    }

    public function mount($id)
    {
        $pegawai = Pegawai::where('id_pegawai', $id)->firstOrFail();
        $this->id_pegawai = $pegawai->id_pegawai;
        $this->nama_pegawai = $pegawai->nama_pegawai;
        $this->email_pegawai = $pegawai->email_pegawai;
        $this->telp_pegawai = $pegawai->telp_pegawai;
        $this->keahlian = $pegawai->keahlian;
    }


    public function delete()
    {
        $pegawai = Pegawai::where('id_pegawai', $this->id_pegawai)->firstOrFail();
        $pegawai->update([
            'status_data' => 'Tidak Aktif',
            'deleted_at' => Carbon::now(),
        ]);

        $this->resetForm();

        return redirect()->route('admin.pegawai.index')->with('message', 'Data pegawai berhasil dihapus.');
    }

    public function render()
    {
        return view('livewire.admin.pegawai.drop');
    }
}
