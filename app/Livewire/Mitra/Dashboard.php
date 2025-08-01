<?php

namespace App\Livewire\Mitra;

use App\Models\JenisPengujian;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    public function render()
    {
        $data = JenisPengujian::where('status_data', 'Aktif')
            ->orderBy('nama_pengujian', 'asc')->get();

        return view('livewire.mitra.dashboard', [
            'data' => $data,
        ]);
    }
}
