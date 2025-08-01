<?php

namespace App\Livewire\Admin\Mitra;

use App\Models\Mitra;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Edit extends Component
{
    public $id_mitra, $nama_mitra, $email_mitra, $telp_mitra, $nama_institusi, $alamat_institusi, $password;
    public $status_data, $created_at, $updated_at, $deleted_at;

    public function resetForm()
    {
        $this->id_mitra = null;
        $this->nama_mitra = null;
        $this->email_mitra = null;
        $this->telp_mitra = null;
        $this->nama_institusi = null;
        $this->alamat_institusi = null;
        $this->password = null;
        $this->status_data = null;
        $this->created_at = null;
        $this->updated_at = null;
        $this->deleted_at = null;
    }

    public function mount($id)
    {
        $mitra = Mitra::where('id_mitra', $id)->firstOrFail();
        $this->id_mitra = $mitra->id_mitra;
        $this->nama_mitra = $mitra->nama_mitra;
        $this->email_mitra = $mitra->email_mitra;
        $this->telp_mitra = $mitra->telp_mitra;
        $this->nama_institusi = $mitra->nama_institusi;
        $this->password = '';
    }

    public function update()
    {
        $this->validate([
            'nama_mitra' => 'required|string|max:255',
            'email_mitra' => 'required|email|max:255|unique:tb_mitra,email_mitra,' . $this->id_mitra . ',id_mitra',
            'telp_mitra' => 'required|string|max:20',
            'nama_institusi' => 'required|string|max:255',
            'password' => 'nullable|string|min:8',
        ]);

        $mitra = Mitra::where('id_mitra', $this->id_mitra)->firstOrFail();

        $updateData = [
            'nama_mitra' => $this->nama_mitra,
            'email_mitra' => $this->email_mitra,
            'telp_mitra' => $this->telp_mitra,
            'nama_institusi' => $this->nama_institusi,
            'status_data' => 'Aktif',
            'updated_at' => Carbon::now(),
        ];

        if (!empty($this->password)) {
            $updateData['password'] = Hash::make($this->password);
        }

        $mitra->update($updateData);

        $this->resetForm();

        return redirect()->route('admin.mitra.index')->with('message', 'Data mitra berhasil diubah.');
    }

    public function render()
    {
        return view('livewire.admin.mitra.edit');
    }
}
