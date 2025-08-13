<?php

namespace App\Livewire\Admin\Mitra;

use App\Models\Mitra;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{
    public $id_mitra, $nik_mitra, $nama_mitra, $email_mitra, $telp_mitra, $nama_institusi, $alamat_institusi, $password;
    public $status_data, $created_at, $updated_at, $deleted_at;

    public function resetForm()
    {
        $this->id_mitra = null;
        $this->nik_mitra = null;
        $this->nama_mitra = null;
        $this->email_mitra = null;
        $this->telp_mitra = null;
        $this->nama_institusi = null;
        $this->alamat_institusi = null;
        $this->password = null;

        // soft-deleted
        $this->status_data = null;
        $this->created_at = null;
        $this->updated_at = null;
        $this->deleted_at = null;
    }

    public function store()
    {
        $this->validate([
            'nik_mitra' => 'required|string|max:255',
            'nama_mitra' => 'required|string|max:255',
            'email_mitra' => 'required|email|max:255|unique:tb_mitra,email_mitra',
            'telp_mitra' => 'required|string|max:20',
            'nama_institusi' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        Mitra::create([
            'nik_mitra' => $this->nik_mitra,
            'nama_mitra' => $this->nama_mitra,
            'email_mitra' => $this->email_mitra,
            'telp_mitra' => $this->telp_mitra,
            'nama_institusi' => $this->nama_institusi,
            'password' => Hash::make($this->password),
            'status_data' => 'Aktif',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $this->resetForm();

        return redirect()->route('admin.mitra.index')->with('message', 'Data mitra berhasil disimpan.');
    }

    public function render()
    {
        return view('livewire.admin.mitra.create');
    }
}
