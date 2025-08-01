<?php

namespace App\Livewire\Admin\Pegawai;

use App\Models\Pegawai;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{
    public $id_pegawai, $nama_pegawai, $email_pegawai, $telp_pegawai, $keahlian, $password;
    public $status_data, $created_at, $updated_at, $deleted_at;

    public function resetForm()
    {
        $this->id_pegawai = null;
        $this->nama_pegawai = null;
        $this->email_pegawai = null;
        $this->telp_pegawai = null;
        $this->keahlian = null;
        $this->password = null;

        // soft-delete
        $this->status_data = null;
        $this->updated_at = null;
        $this->created_at = null;
        $this->deleted_at = null;
    }

    public function store()
    {
        $this->validate([
            'nama_pegawai' => 'required|string|max:255',
            'email_pegawai' => 'required|email|max:255|unique:tb_pegawai,email_pegawai',
            'telp_pegawai' => 'required|string|max:20',
            'keahlian' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        Pegawai::create([
            'nama_pegawai' => $this->nama_pegawai,
            'email_pegawai' => $this->email_pegawai,
            'telp_pegawai' => $this->telp_pegawai,
            'keahlian' => $this->keahlian,
            'password' => Hash::make($this->password),
            'status_data' => 'Aktif',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $this->resetForm();

        return redirect()->route('admin.pegawai.index')->with('message', 'Data pegawai berhasil disimpan.');
    }

    public function render()
    {
        return view('livewire.admin.pegawai.create');
    }
}
