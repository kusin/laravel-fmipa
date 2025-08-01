<?php

namespace App\Livewire\Auth;

use App\Models\Pegawai;
use App\Models\Mitra;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.guest')]
class Login extends Component
{
    public $email, $password, $errorMessage;

    public function login()
    {
        $pegawai = Pegawai::where('email_pegawai', $this->email)->first();
        if ($pegawai && Hash::check($this->password, $pegawai->password)) {
            //session(['login_as' => 'pegawai', 'user_id' => $pegawai->id_pegawai]);
            session([
                'login_as' => 'pegawai',
                'session_id' => $pegawai->id_pegawai,
                'session_name' => $pegawai->nama_pegawai
            ]);
            return redirect()->route('admin.dashboard');
        }

        $mitra = Mitra::where('email_mitra', $this->email)->first();
        if ($mitra && Hash::check($this->password, $mitra->password)) {
            //session(['login_as' => 'mitra', 'user_id' => $mitra->id_mitra]);
            session([
                'login_as' => 'mitra',
                'session_id' => $mitra->id_mitra,
                'session_name' => $mitra->nama_mitra
            ]);
            return redirect()->route('mitra.dashboard');
        }

        $this->errorMessage = "Harap pastikan kembali email dan password Anda";
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
