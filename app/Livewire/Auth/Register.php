<?php

namespace App\Livewire\Auth;

use App\Models\Mitra;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.guest')]
class Register extends Component
{
    public $id_mitra, $nama_mitra, $email_mitra, $telp_mitra, $nama_institusi, $alamat_institusi, $password;
    public $status_data, $created_at, $updated_at, $deleted_at;

    public function resetForm()
    {
        // kolom mitra
        $this->id_mitra = null;
        $this->nama_mitra = null;
        $this->email_mitra = null;
        $this->telp_mitra = null;
        $this->nama_institusi = null;
        $this->alamat_institusi = null;
        $this->password = null;

        // soft-delete
        $this->status_data = '';
        $this->created_at = null;
        $this->updated_at = null;
        $this->deleted_at = null;
    }

    public function store()
    {
        $this->validate([
            'nama_mitra' => 'required|string|max:255',
            'email_mitra' => 'required|email|max:255|unique:tb_mitra,email_mitra',
            'telp_mitra' => 'required|string|max:20',
            'nama_institusi' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        // Simpan data mitra
        Mitra::create([
            'nama_mitra' => $this->nama_mitra,
            'email_mitra' => $this->email_mitra,
            'telp_mitra' => $this->telp_mitra,
            'nama_institusi' => $this->nama_institusi,
            'alamat_institusi' => $this->alamat_institusi ?? null,
            'password' => Hash::make($this->password),
            'status_data' => 'Aktif',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Reset form
        $this->resetForm();

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
