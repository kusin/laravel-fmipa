<?php

namespace App\Livewire\Admin\HasilPengujian;

use App\Models\Mitra;
use App\Models\JenisPengujian;
use App\Models\HasilPengujian;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Create extends Component
{
    public $id_hasil_pengujian, $id_jenis_pengujian, $id_mitra;

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

    public function resetForm()
    {
        $this->id_hasil_pengujian = null;
        $this->id_jenis_pengujian = null;
        $this->id_mitra = null;

        $this->tanggal_pendaftaran = null;
        $this->status_pendaftaran = null;

        $this->tanggal_sampel = null;
        $this->jenis_sampel = null;
        $this->qty_sampel = null;
        $this->status_sampel = null;

        $this->tanggal_pengujian_mulai = null;
        $this->tanggal_pengujian_selesai = null;
        $this->file_hasil_pengujian = null;
        $this->status_verifikasi = null;
        $this->status_pengujian = null;

        $this->tanggal_invoice = null;
        $this->nomor_invoice_internal = null;
        $this->nomor_invoice_eksternal = null;
        $this->status_invoice = null;

        $this->tanggal_pembayaran = null;
        $this->metode_pembayaran = null;
        $this->nominal_pembayaran = null;
        $this->status_pembayaran = null;

        $this->tanggal_kwitansi = null;
        $this->nomor_kwitansi_internal = null;
        $this->nomor_kwitansi_eksternal = null;
        $this->status_kwitansi = null;

        $this->keterangan = null;
        $this->status_data = null;
    }

    public function store()
    {
        $this->validate([
            'id_jenis_pengujian' => 'required',
            'id_mitra' => 'required',
            'tanggal_pendaftaran' => 'required',
            'status_pendaftaran' => 'required',
            'jenis_sampel' => 'required',
            'qty_sampel' => 'required',
            'file_hasil_pengujian' => 'required',
            'keterangan' => 'required',
        ]);

        HasilPengujian::create([
            'id_jenis_pengujian' => $this->id_jenis_pengujian,
            'id_mitra' => $this->id_mitra,

            'tanggal_pendaftaran' => $this->tanggal_pendaftaran,
            'status_pendaftaran' => $this->status_pendaftaran,

            'tanggal_sampel' => $this->tanggal_sampel,
            'jenis_sampel' => $this->jenis_sampel,
            'qty_sampel' => $this->qty_sampel,
            'status_sampel' => $this->status_sampel,

            'tanggal_pengujian_mulai' => $this->tanggal_pengujian_mulai,
            'tanggal_pengujian_selesai' => $this->tanggal_pengujian_selesai,
            'file_hasil_pengujian' => $this->file_hasil_pengujian,
            'status_verifikasi' => $this->status_verifikasi,
            'status_pengujian' => $this->status_pengujian,

            'tanggal_invoice' => $this->tanggal_invoice,
            'nomor_invoice_internal' => $this->nomor_invoice_internal,
            'nomor_invoice_eksternal' => $this->nomor_invoice_eksternal,
            'status_invoice' => $this->status_invoice,

            'tanggal_pembayaran' => $this->tanggal_pembayaran,
            'metode_pembayaran' => $this->metode_pembayaran,
            'nominal_pembayaran' => $this->nominal_pembayaran,
            'status_pembayaran' => $this->status_pembayaran,

            'tanggal_kwitansi' => $this->tanggal_kwitansi,
            'nomor_kwitansi_internal' => $this->nomor_kwitansi_internal,
            'nomor_kwitansi_eksternal' => $this->nomor_kwitansi_eksternal,
            'status_kwitansi' => $this->status_kwitansi,

            'keterangan' => $this->keterangan,
            'status_data' => 'Aktif',
            'created_at' => Carbon::now(),
            'update_at' => Carbon::now(),
        ]);

        $this->resetForm();

        return redirect()->route('admin.hasil-pengujian.index')->with('message', 'Data hasil pengujian berhasil disimpan.');
    }

    // -----------------------------------------------------------------

    public $listMitra;
    public $listJenisPengujian;

    public function render()
    {
        $this->listMitra = Mitra::where('status_data', 'Aktif')
            ->orderBy('nama_mitra', 'asc')->get();
        $this->listJenisPengujian = JenisPengujian::where('status_data', 'Aktif')
            ->orderBy('nama_pengujian', 'asc')->get();
        return view('livewire.admin.hasil-pengujian.create');
    }
}
