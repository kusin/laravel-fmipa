<?php

namespace App\Livewire\Admin\HasilPengujian;

use App\Models\Mitra;
use App\Models\JenisPengujian;
use App\Models\HasilPengujian;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Edit extends Component
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

    public $listMitra = [];
    public $listJenisPengujian = [];

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

    public function mount($id)
    {
        $this->listMitra = Mitra::where('status_data', 'Aktif')
            ->orderBy('nama_mitra', 'asc')->get();
        $this->listJenisPengujian = JenisPengujian::where('status_data', 'Aktif')
            ->orderBy('nama_pengujian', 'asc')->get();

        $data = HasilPengujian::where('id_hasil_pengujian', $id)->firstOrFail();

        $this->id_hasil_pengujian = $data->id_hasil_pengujian;
        $this->id_jenis_pengujian = $data->id_jenis_pengujian;
        $this->id_mitra = $data->id_mitra;

        $this->tanggal_pendaftaran = $data->tanggal_pendaftaran ? Carbon::parse($data->tanggal_pendaftaran)->format('Y-m-d') : null;
        $this->status_pendaftaran = $data->status_pendaftaran ?? null;

        $this->tanggal_sampel = $data->tanggal_sampel ? Carbon::parse($data->tanggal_sampel)->format('Y-m-d') : null;
        $this->jenis_sampel = $data->jenis_sampel ?? null;
        $this->qty_sampel = $data->qty_sampel ?? null;
        $this->status_sampel = $data->status_sampel ?? null;

        $this->tanggal_pengujian_mulai = $data->tanggal_pengujian_mulai ? Carbon::parse($data->tanggal_pengujian_mulai)->format('Y-m-d') : null;
        $this->tanggal_pengujian_selesai = $data->tanggal_pengujian_selesai ? Carbon::parse($data->tanggal_pengujian_selesai)->format('Y-m-d') : null;
        $this->status_verifikasi = $data->status_verifikasi ?? null;
        $this->status_pengujian = $data->status_pengujian ?? null;

        $this->tanggal_invoice = $data->tanggal_invoice ? Carbon::parse($data->tanggal_invoice)->format('Y-m-d') : null;
        $this->nomor_invoice_internal = $data->nomor_invoice_internal ?? null;
        $this->nomor_invoice_eksternal = $data->nomor_invoice_eksternal ?? null;
        $this->status_invoice = $data->status_invoice ?? null;

        $this->tanggal_pembayaran = $data->tanggal_pembayaran ? Carbon::parse($data->tanggal_pembayaran)->format('Y-m-d') : null;
        $this->metode_pembayaran = $data->metode_pembayaran ?? null;
        $this->nominal_pembayaran = $data->nominal_pembayaran ?? null;
        $this->status_pembayaran = $data->status_pembayaran ?? null;

        $this->tanggal_kwitansi = $data->tanggal_kwitansi ? Carbon::parse($data->tanggal_kwitansi)->format('Y-m-d') : null;
        $this->nomor_kwitansi_internal = $data->nomor_kwitansi_internal ?? null;
        $this->nomor_kwitansi_eksternal = $data->nomor_kwitansi_eksternal ?? null;
        $this->status_kwitansi = $data->status_kwitansi ?? null;

        $this->file_hasil_pengujian = $data->file_hasil_pengujian ?? null;
        $this->keterangan = $data->keterangan ?? null;
        $this->status_data = $data->status_data ?? null;
    }

    public function update()
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

        $data = HasilPengujian::where('id_hasil_pengujian', $this->id_hasil_pengujian)->firstOrFail();
        $data->update([
            'id_jenis_pengujian' => $this->id_jenis_pengujian,
            'id_mitra' => $this->id_mitra,

            'tanggal_pendaftaran' => $this->tanggal_pendaftaran ?: null,
            'status_pendaftaran' => $this->status_pendaftaran ?: null,

            'tanggal_sampel' => $this->tanggal_sampel ?: null,
            'jenis_sampel' => $this->jenis_sampel ?: null,
            'qty_sampel' => $this->qty_sampel ?: null,
            'status_sampel' => $this->status_sampel ?: null,

            'tanggal_pengujian_mulai' => $this->tanggal_pengujian_mulai ?: null,
            'tanggal_pengujian_selesai' => $this->tanggal_pengujian_selesai ?: null,
            'file_hasil_pengujian' => $this->file_hasil_pengujian ?: null,
            'status_verifikasi' => $this->status_verifikasi ?: null,
            'status_pengujian' => $this->status_pengujian ?: null,

            'tanggal_invoice' => $this->tanggal_invoice ?: null,
            'nomor_invoice_internal' => $this->nomor_invoice_internal ?: null,
            'nomor_invoice_eksternal' => $this->nomor_invoice_eksternal ?: null,
            'status_invoice' => $this->status_invoice ?: null,

            'tanggal_pembayaran' => $this->tanggal_pembayaran ?: null,
            'metode_pembayaran' => $this->metode_pembayaran ?: null,
            'nominal_pembayaran' => $this->nominal_pembayaran ?: null,
            'status_pembayaran' => $this->status_pembayaran ?: null,

            'tanggal_kwitansi' => $this->tanggal_kwitansi ?: null,
            'nomor_kwitansi_internal' => $this->nomor_kwitansi_internal ?: null,
            'nomor_kwitansi_eksternal' => $this->nomor_kwitansi_eksternal ?: null,
            'status_kwitansi' => $this->status_kwitansi ?: null,

            'keterangan' => $this->keterangan ?: null,
            'status_data' => 'Aktif',
            'updated_at' => Carbon::now(),
        ]);

        $this->resetForm();

        return redirect()->route('admin.hasil-pengujian.index')->with('message', 'Data hasil pengujian berhasil diubah.');
    }

    public function render()
    {
        return view('livewire.admin.hasil-pengujian.edit');
    }
}
