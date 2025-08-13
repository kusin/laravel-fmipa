@section('mt-pengujian-material', 'active')

<div>
    {{-- content livewire. --}}

    <div class="row">
        <div class="col-sm-12">
            <div class="callout callout-success">
                <span class="text-dark">Data-Data Pengujian Material</span>
            </div>
        </div>
        {{-- /.col --}}
    </div>
    {{-- /.row --}}

    @if (session()->has('message'))
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <span class="text-light">{{ session('message') }}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div> {{-- /.col --}}
    </div> {{-- /.row --}}
    @endif

    <div class="row">
        <div class="col-sm-12">
            <div class="card card-success card-outline">

                <div class="card-header">
                    <div class="mt-2 mb-2">
                        <a wire:navigate href="{{ route('mitra.pengujian-material.create') }}" class="btn btn-outline-success">Tambah Data</a>
                    </div>
                </div>
                {{-- /.card-header --}}

                <div class="card-body table-responsive">

                    <div class="row mb-3">
                        <div class="col-sm-2">
                            <select wire:model.live="paginate" class="form-control form-control-border border-success border-width-2" id="paginate">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        {{-- /.col --}}
                    </div>
                    {{-- /.row --}}

                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <table class="table table-bordered table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="text-left">Aksi</th>
                                        <th class="text-left">Tanggal Pendaftaran</th>
                                        <th class="text-left">Nama Mitra & Institusi</th>
                                        <th class="text-left">Jenis Pengujian</th>
                                        <th class="text-left">Jenis Sampel</th>
                                        <th class="text-left">Jumlah Sampel</th>
                                        <th class="text-right">Nominal Pembyaran</th>
                                        <th class="text-center">Status Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key => $item)
                                    <tr>
                                        <td class="text-left">
                                            <a class="btn btn-sm btn-outline-info" wire:click="showData({{ $item->id_hasil_pengujian }})" data-toggle="modal" data-target="#confirmModal">
                                                <i class="fa-solid fa-display mr-1"></i> Detail
                                            </a>
                                            @if($item->status_pendaftaran == "Belum Disetujui")
                                            <a class="btn btn-sm btn-outline-warning" wire:navigate href="{{ route('mitra.pengujian-material.edit', ['id' => $item->id_hasil_pengujian]) }}">
                                                <i class="fa-solid fa-edit mr-1"></i> Ubah
                                            </a>
                                            @elseif($item->status_pendaftaran == null)
                                            <a class="btn btn-sm btn-outline-warning" wire:navigate href="{{ route('mitra.pengujian-material.edit', ['id' => $item->id_hasil_pengujian]) }}">
                                                <i class="fa-solid fa-edit mr-1"></i> Ubah
                                            </a>
                                            @endif
                                        </td>
                                        <td class="text-left">{{ \Carbon\Carbon::parse($item->tanggal_pendaftaran)->format('Y-m-d') }}</td>
                                        <td>{{ $item->mitra->nama_mitra ?? '-' }} - {{ $item->mitra->nama_institusi ?? '-' }}</td>
                                        <td class="text-left">{{ $item->jenisPengujian->nama_pengujian ?? '-' }} + {{ $item->jenisPengujian->jenis_pengujian ?? '-' }}</td>
                                        <td class="text-left">{{ $item->jenis_sampel }} Unit</td>
                                        <td class="text-left">{{ $item->qty_sampel }} Unit</td>
                                        <td class="text-right">{{ formatRupiah($item->nominal_pembayaran) }}</td>

                                        @if($item->status_pembayaran == "Sudah Dibayar")
                                        <td class="text-center"><span class="badge bg-success badge-custom">{{ $item->status_pembayaran }}</span></td>
                                        @else
                                        <td class="text-center"><span class="badge bg-danger badge-custom">Belum Dibayar</span></td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- /.col --}}
                    </div>
                    {{-- /.row --}}

                    <div class="row">
                        <div class="col-sm-12">
                            {{ $data->links() }}
                        </div>
                        {{-- /.col --}}
                    </div>
                    {{-- /.row --}}
                </div>
                {{-- /.card-body --}}

                <div class="card-footer">
                    <span class="text-danger">Nominal pembayaran belum termasuk PPN</span>
                </div>

            </div>
            {{-- /.card --}}
        </div>
        {{-- /.col --}}
    </div>
    {{-- /.row --}}

    {{-- Modal Konfirmasi --}}
    <div wire:ignore.self class="modal fade" id="confirmModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Informasi.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row border-bottom mb-5">
                        <div class="form-group col-sm-12 mb-2">
                            <h4 class="font-weight-normal text-info">Informasi Pendaftaran</h4>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="nama_mitra" class="required">Nama Mitra</label>
                            <input wire:model="nama_mitra" type="text" class="form-control form-control-border border-info border-width-2" id="nama_mitra" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="nama_institusi" class="required">Nama Institusi</label>
                            <input wire:model="nama_institusi" type="text" class="form-control form-control-border border-info border-width-2" id="nama_institusi" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="nama_pengujian" class="required">Nama Pengujian</label>
                            <input wire:model="nama_pengujian" type="text" class="form-control form-control-border border-info border-width-2" id="nama_pengujian" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="jenis_pengujian" class="required">Jenis Pengujian</label>
                            <input wire:model="jenis_pengujian" type="text" class="form-control form-control-border border-info border-width-2" id="jenis_pengujian" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="tanggal_pendaftaran" class="required">Tanggal Pendaftaran</label>
                            <input wire:model="tanggal_pendaftaran" type="text" class="form-control form-control-border border-info border-width-2" id="tanggal_pendaftaran" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="status_pendaftaran" class="required">Status Pendaftaran</label>
                            <input wire:model="status_pendaftaran" type="text" class="form-control form-control-border border-info border-width-2" id="status_pendaftaran" disabled>
                        </div>
                    </div>

                    <div class="form-row border-bottom mb-5">
                        <div class="form-group col-sm-12 mb-2">
                            <h4 class="font-weight-normal text-info">Sampel Material</h4>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="tanggal_sampel" class="required">Tanggal Sampel</label>
                            <input wire:model="tanggal_sampel" type="text" class="form-control form-control-border border-info border-width-2" id="tanggal_sampel" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="status_sampel" class="required">Status Sampel</label>
                            <input wire:model="status_sampel" type="text" class="form-control form-control-border border-info border-width-2" id="status_sampel" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="jenis_sampel" class="required">Jenis Sampel</label>
                            <input wire:model="jenis_sampel" type="text" class="form-control form-control-border border-info border-width-2" id="jenis_sampel" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="qty_sampel" class="required">Qty Sampel</label>
                            <input wire:model="qty_sampel" type="text" class="form-control form-control-border border-info border-width-2" id="qty_sampel" disabled>
                        </div>
                    </div>

                    <div class="form-row border-bottom mb-5">
                        <div class="form-group col-sm-12 mb-2">
                            <h4 class="font-weight-normal text-info">Pengujian Material</h4>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="tanggal_pengujian_mulai" class="required">Tanggal Mulai Pengujian</label>
                            <input wire:model="tanggal_pengujian_mulai" type="text" class="form-control form-control-border border-info border-width-2" id="tanggal_pengujian_mulai" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="status_verifikasi" class="required">Status Verifikasi</label>
                            <input wire:model="status_verifikasi" type="text" class="form-control form-control-border border-info border-width-2" id="status_verifikasi" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="tanggal_pengujian_selesai" class="required">Tanggal Selesai Pengujian</label>
                            <input wire:model="tanggal_pengujian_selesai" type="text" class="form-control form-control-border border-info border-width-2" id="tanggal_pengujian_selesai" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="status_pengujian" class="required">Status Pengujian</label>
                            <input wire:model="status_pengujian" type="text" class="form-control form-control-border border-info border-width-2" id="status_pengujian" disabled>
                        </div>
                    </div>

                    <div class="form-row border-bottom mb-5">
                        <div class="form-group col-sm-12 mb-2">
                            <h4 class="font-weight-normal text-info">Informasi Invoice</h4>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="tanggal_invoice" class="required">Tanggal Invoice</label>
                            <input wire:model="tanggal_invoice" type="text" class="form-control form-control-border border-info border-width-2" id="tanggal_invoice" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="status_invoice" class="required">Status Invoice</label>
                            <input wire:model="status_invoice" type="text" class="form-control form-control-border border-info border-width-2" id="status_invoice" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="nomor_invoice_internal" class="required">No. Invoice Internal</label>
                            <input wire:model="nomor_invoice_internal" type="text" class="form-control form-control-border border-info border-width-2" id="nomor_invoice_internal" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="nomor_invoice_eksternal" class="required">No. Invoice Eksternal</label>
                            <input wire:model="nomor_invoice_eksternal" type="text" class="form-control form-control-border border-info border-width-2" id="nomor_invoice_eksternal" disabled>
                        </div>
                    </div>

                    <div class="form-row border-bottom mb-5">
                        <div class="form-group col-sm-12 mb-2">
                            <h4 class="font-weight-normal text-info">Informasi Pembayaran</h4>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="tanggal_pembayaran" class="required">Tanggal Pembayaran</label>
                            <input wire:model="tanggal_pembayaran" type="text" class="form-control form-control-border border-info border-width-2" id="tanggal_pembayaran" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="status_pembayaran" class="required">Status Pembayaran</label>
                            <input wire:model="status_pembayaran" type="text" class="form-control form-control-border border-info border-width-2" id="status_pembayaran" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="metode_pembayaran" class="required">Metode Pembayaran</label>
                            <input wire:model="metode_pembayaran" type="text" class="form-control form-control-border border-info border-width-2" id="metode_pembayaran" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="nominal_pembayaran" class="required">Nominal Pembayaran</label>
                            <input wire:model="nominal_pembayaran" type="text" class="form-control form-control-border border-info border-width-2" id="nominal_pembayaran" disabled>
                        </div>
                    </div>

                    <div class="form-row border-bottom mb-5">
                        <div class="form-group col-sm-12 mb-2">
                            <h4 class="font-weight-normal text-info">Informasi Kwitansi</h4>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="tanggal_kwitansi" class="required">Tanggal Kwitansi</label>
                            <input wire:model="tanggal_kwitansi" type="text" class="form-control form-control-border border-info border-width-2" id="tanggal_kwitansi" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="status_kwitansi" class="required">Status Kwitansi</label>
                            <input wire:model="status_kwitansi" type="text" class="form-control form-control-border border-info border-width-2" id="status_kwitansi" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="nomor_kwitansi_internal" class="required">No. Kwitansi Internal</label>
                            <input wire:model="nomor_kwitansi_internal" type="text" class="form-control form-control-border border-info border-width-2" id="nomor_kwitansi_internal" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="nomor_kwitansi_eksternal" class="required">No. Kwitansi Eksternal</label>
                            <input wire:model="nomor_kwitansi_eksternal" type="text" class="form-control form-control-border border-info border-width-2" id="nomor_kwitansi_eksternal" disabled>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label for="file_hasil_pengujian" class="required">Link Download</label>
                        <textarea wire:model="file_hasil_pengujian" class="form-control form-control-border border-info border-width-2" id="file_hasil_pengujian" rows="5" disabled></textarea>
                    </div>

                    <div class="form-group mb-4">
                        <label for="keterangan" class="required">Keterangan</label>
                        <textarea wire:model="keterangan" class="form-control form-control-border border-info border-width-2" id="keterangan" rows="5" disabled></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row w-100">
                        <div class="col-sm-10 text-left">
                            <p class="text-danger">Jika terdapat ketidaksesuaian harap hubungi administrator. WA 0858-0677-3755</p>
                        </div>
                        <div class="col-sm-2 text-right">
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fas fa-undo mr-1"></i> Tutup</button>
                        </div>
                    </div>
                    {{-- /.row --}}
                </div>
                {{-- /.modal-footer --}}
            </div>
            {{-- /.modal-content --}}
        </div>
        {{-- /.modal-dialog --}}
    </div>
    {{-- Modal Konfirmasi --}}

    {{-- content livewire. --}}
</div>