<?php

namespace App\Livewire\Admin\Pegawai;

use App\Models\Pegawai;
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
        $pegawai = Pegawai::where('status_data', 'Aktif')->where(function ($query) {
            $query->where('nama_pegawai', 'like', '%' . $this->search . '%')
                ->orWhere('email_pegawai', 'like', '%' . $this->search . '%')
                ->orWhere('keahlian', 'like', '%' . $this->search . '%');
        })->orderBy('nama_pegawai', 'asc')->paginate($this->paginate);

        return view('livewire.admin.pegawai.index', [
            'pegawai' => $pegawai
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

    // ------------------------------------------------------------------

    public $id_pegawai, $nama_pegawai, $email_pegawai, $telp_pegawai, $keahlian, $status_data;
    public $created_at, $updated_at, $deleted_at;

    public function showData($id)
    {
        $pegawai = Pegawai::where('id_pegawai', $id)->firstOrFail();
        $this->nama_pegawai = $pegawai->nama_pegawai;
        $this->email_pegawai = $pegawai->email_pegawai;
        $this->telp_pegawai = $pegawai->telp_pegawai;
        $this->keahlian = $pegawai->keahlian;
    }
}
