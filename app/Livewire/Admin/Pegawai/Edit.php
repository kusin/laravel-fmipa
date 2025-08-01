<?php

namespace App\Livewire\Admin\Pegawai;

use App\Models\Pegawai;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Edit extends Component
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

    public function mount($id)
    {
        $pegawai = Pegawai::where('id_pegawai', $id)->firstOrFail();
        $this->id_pegawai = $pegawai->id_pegawai;
        $this->nama_pegawai = $pegawai->nama_pegawai;
        $this->email_pegawai = $pegawai->email_pegawai;
        $this->telp_pegawai = $pegawai->telp_pegawai;
        $this->keahlian = $pegawai->keahlian;
        $this->password = '';
    }

    public function update()
    {
        $this->validate([
            'nama_pegawai' => 'required|string|max:255',
            'email_pegawai' => 'required|email|max:255|unique:tb_pegawai,email_pegawai,' . $this->id_pegawai . ',id_pegawai',
            'telp_pegawai' => 'required|string|max:20',
            'keahlian' => 'required|string|max:255',
            'password' => 'nullable|string|min:8',
        ]);

        $pegawai = Pegawai::where('id_pegawai', $this->id_pegawai)->firstOrFail();

        $updateData = [
            'nama_pegawai' => $this->nama_pegawai,
            'email_pegawai' => $this->email_pegawai,
            'telp_pegawai' => $this->telp_pegawai,
            'keahlian' => $this->keahlian,
            'status_data' => 'Aktif',
            'updated_at' => Carbon::now(),
        ];

        if (!empty($this->password)) {
            $updateData['password'] = Hash::make($this->password);
        }

        $pegawai->update($updateData);

        $this->resetForm();

        return redirect()->route('admin.pegawai.index')->with('message', 'Data pegawai berhasil diubah.');
    }

    public function render()
    {
        return view('livewire.admin.pegawai.edit');
    }
}
