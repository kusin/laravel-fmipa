<?php

namespace App\Livewire\Mitra\PengujianMaterial;

use App\Models\HasilPengujian;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;

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
        $query = HasilPengujian::with(['mitra', 'jenisPengujian'])
            ->where('status_data', 'Aktif')
            ->orderBy('tanggal_pendaftaran', 'desc');

        // 🔥 Filter hanya data mitra yang login
        if (session('login_as') === 'mitra') {
            $query->where('id_mitra', session('session_id'));
        }

        $data = $query->paginate($this->paginate);

        return view('livewire.mitra.pengujian-material.index', [
            'data' => $data,
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

    public $nama_mitra, $nama_institusi, $nama_pengujian, $jenis_pengujian;

    public $tanggal_pendaftaran, $status_pendaftaran;

    public $tanggal_sampel,
        $jenis_sampel,
        $qty_sampel,
        $status_sampel;

    public $tanggal_pengujian_mulai,
        $tanggal_pengujian_selesai,
        $file_hasil_pengujian,
        $status_verifikasi,
        $status_pengujian;

    public $tanggal_invoice,
        $nomor_invoice_internal,
        $nomor_invoice_eksternal,
        $status_invoice;

    public $tanggal_pembayaran,
        $metode_pembayaran,
        $nominal_pembayaran,
        $status_pembayaran;

    public $tanggal_kwitansi,
        $nomor_kwitansi_internal,
        $nomor_kwitansi_eksternal,
        $status_kwitansi;

    public $keterangan, $status_data, $created_at, $updated_at, $deleted_at;

    public function showData($id)
    {
        $data = HasilPengujian::with(['mitra', 'jenisPengujian'])->where('id_hasil_pengujian', $id)->firstOrFail();

        $this->tanggal_pendaftaran = $data->tanggal_pendaftaran ? Carbon::parse($data->tanggal_pendaftaran)->format('Y-m-d') : '-';
        $this->status_pendaftaran = $data->status_pendaftaran ?? '-';

        $this->tanggal_sampel = $data->tanggal_sampel ? Carbon::parse($data->tanggal_sampel)->format('Y-m-d') : '-';
        $this->jenis_sampel = $data->jenis_sampel ?? '-';
        $this->qty_sampel = $data->qty_sampel ?? '-';
        $this->status_sampel = $data->status_sampel ?? '-';

        $this->tanggal_pengujian_mulai = $data->tanggal_pengujian_mulai ? Carbon::parse($data->tanggal_pengujian_mulai)->format('Y-m-d') : '-';
        $this->tanggal_pengujian_selesai = $data->tanggal_pengujian_selesai ? Carbon::parse($data->tanggal_pengujian_selesai)->format('Y-m-d') : '-';
        $this->status_verifikasi = $data->status_verifikasi ?? '-';
        $this->status_pengujian = $data->status_pengujian ?? '-';

        $this->tanggal_invoice = $data->tanggal_invoice ? Carbon::parse($data->tanggal_invoice)->format('Y-m-d') : '-';
        $this->nomor_invoice_internal = $data->nomor_invoice_internal ?? '-';
        $this->nomor_invoice_eksternal = $data->nomor_invoice_eksternal ?? '-';
        $this->status_invoice = $data->status_invoice ?? '-';

        $this->tanggal_pembayaran = $data->tanggal_pembayaran ? Carbon::parse($data->tanggal_pembayaran)->format('Y-m-d') : '-';
        $this->metode_pembayaran = $data->metode_pembayaran ?? '-';
        $this->nominal_pembayaran = formatRupiah($data->nominal_pembayaran);
        $this->status_pembayaran = $data->status_pembayaran ?? '-';

        $this->tanggal_kwitansi = $data->tanggal_kwitansi ? Carbon::parse($data->tanggal_kwitansi)->format('Y-m-d') : '-';
        $this->nomor_kwitansi_internal = $data->nomor_kwitansi_internal ?? '-';
        $this->nomor_kwitansi_eksternal = $data->nomor_kwitansi_eksternal ?? '-';
        $this->status_kwitansi = $data->status_kwitansi ?? '-';

        $this->file_hasil_pengujian = $data->file_hasil_pengujian ?? '-';
        $this->keterangan = $data->keterangan ?? '-';
        $this->status_data = $data->status_data ?? '-';

        /* Relasi Mitra dan Jenis Pengujian */
        $this->nama_mitra = $data->mitra ? $data->mitra->nama_mitra : '-';
        $this->nama_institusi = $data->mitra ? $data->mitra->nama_institusi : '-';
        $this->nama_pengujian = $data->jenisPengujian ? $data->jenisPengujian->nama_pengujian : '-';
        $this->jenis_pengujian = $data->jenisPengujian ? $data->jenisPengujian->jenis_pengujian : '-';
    }
}
