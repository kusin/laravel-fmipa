<?php

namespace App\Livewire\Admin\JenisPengujian;

use App\Models\JenisPengujian;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    // attribute class
    public $search = "";
    public $paginate = "25";
    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['search', 'paginate'];

    public function render()
    {
        $data = JenisPengujian::where('status_data', 'Aktif')
            ->where('nama_pengujian', 'like', '%' . $this->search . '%')
            ->orderBy('nama_pengujian', 'asc')
            ->paginate($this->paginate);

        return view('livewire.admin.jenis-pengujian.index', [
            'data' => $data
        ]);
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedPaginate()
    {
        $this->resetPage();
    }

    // ------------------------------------------------------------------------

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

    public function showData($id)
    {
        $data = JenisPengujian::where('id_jenis_pengujian', $id)->firstOrFail();
        $this->nama_pengujian = $data->nama_pengujian;
        $this->jenis_pengujian = $data->jenis_pengujian;
        $this->deskripsi_pengujian = $data->deskripsi_pengujian;
        $this->alat_pengujian = $data->alat_pengujian;
        $this->jumlah_alat = $data->jumlah_alat;
        $this->metode_pengujian = $data->metode_pengujian;
        $this->waktu_pengujian = $data->waktu_pengujian;
        $this->keterangan_sampel = $data->keterangan_sampel;
        $this->biaya_pengujian = $data->biaya_pengujian;
    }
}
