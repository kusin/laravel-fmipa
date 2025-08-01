@section('adm-jenis-pengujian', 'active')

<div>
    {{-- content livewire. --}}

    <div class="row">
        <div class="col-sm-12">
            <div class="callout callout-success">
                <span class="text-dark">Jenis-Jenis Pengujian Material</span>
            </div>
        </div> {{-- /.col --}}
    </div> {{-- /.row --}}

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
            <div class="card card-outline card-success">

                <div class="card-header">
                    <div class="mt-2 mb-2">
                        <a wire:navigate href="{{ route('admin.jenis-pengujian.create') }}" class="btn btn-outline-success">Tambah Data</a>
                    </div>
                </div>
                <!-- /.card-header -->

                <div class="card-body table-responsive">

                    <div class="row mb-3">
                        <div class="col-sm-1">
                            <select wire:model.live="paginate" class="form-control form-control-border border-success border-width-2" id="paginate">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                            </select>
                        </div>
                        <div class="col-sm-11">
                            <input wire:model.live.debounce.500ms="search" type="text" class="form-control form-control-border border-success border-width-2" id="search" placeholder="Pencarian data berdasarkan Nama Pengujian">
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <table class="table table-bordered table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Aksi</th>
                                        <th>Nama Pengujian</th>
                                        <th>Jenis Pengujian</th>
                                        <th>Jumlah Alat</th>
                                        <th>Waktu Pengujian</th>
                                        <th>Biaya Pengujian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key => $item)
                                    <tr>
                                        <td>{{ $data->firstItem() + $key }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-outline-info" wire:click="showData({{ $item->id_jenis_pengujian }})" data-toggle="modal" data-target="#confirmModal">
                                                <i class="fa-solid fa-display"></i>
                                            </a>
                                            <a class="btn btn-sm btn-outline-warning" wire:navigate href="{{ route('admin.jenis-pengujian.edit', ['id' => $item->id_jenis_pengujian]) }}">
                                                <i class="fa-solid fa-edit"></i>
                                            </a>
                                            <a class="btn btn-sm btn-outline-danger" wire:navigate href="{{ route('admin.jenis-pengujian.drop', ['id' => $item->id_jenis_pengujian]) }}">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </td>
                                        <td>{{ $item->nama_pengujian }}</td>
                                        <td>{{ $item->jenis_pengujian }}</td>
                                        <td>{{ $item->jumlah_alat }}</td>
                                        <td>{{ $item->waktu_pengujian }}</td>
                                        <td>{{ formatRupiah($item->biaya_pengujian)}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-sm-12">
                            {{ $data->links() }}
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <small class="text-danger">Pembaharuan data di tanggal {{ date('Y-m-d') }} pukul {{ date('H:i')}} WIB</small>
                </div>
                <!-- /.card-footer -->

            </div>{{-- /.card --}}
        </div> {{-- /.col --}}
    </div> {{-- /.row --}}

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
                    <div class="form-row">
                        <div class="form-group col-sm-6 mb-4">
                            <label for="nama_pengujian" class="required">Nama Pengujian</label>
                            <input wire:model="nama_pengujian" type="text" class="form-control form-control-border border-info border-width-2" id="nama_pengujian" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="jenis_pengujian" class="required">Jenis Pengujian</label>
                            <input wire:model="jenis_pengujian" type="text" class="form-control form-control-border border-info border-width-2" id="jenis_pengujian" disabled>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="deskripsi_pengujian" class="required">Deskripsi Pengujian</label>
                        <textarea wire:model="deskripsi_pengujian" class="form-control form-control-border border-info border-width-2" id="deskripsi_pengujian" rows="5" disabled></textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-8 mb-4">
                            <label for="alat_pengujian" class="required">Alat Pengujian</label>
                            <textarea wire:model="alat_pengujian" class="form-control form-control-border border-info border-width-2" id="alat_pengujian" rows="5" disabled></textarea>
                        </div>
                        <div class="form-group col-sm-4 mb-4">
                            <label for="jumlah_alat" class="required">Jumlah Alat</label>
                            <input wire:model="jumlah_alat" type="text" class="form-control form-control-border border-info border-width-2" id="jumlah_alat" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-8 mb-4">
                            <label for="metode_pengujian" class="required">Metode Pengujian</label>
                            <textarea wire:model="metode_pengujian" class="form-control form-control-border border-info border-width-2" id="metode_pengujian" rows="5" disabled></textarea>
                        </div>
                        <div class="form-group col-sm-4 mb-4">
                            <label for="waktu_pengujian" class="required">Waktu Pengujian</label>
                            <input wire:model="waktu_pengujian" type="text" class="form-control form-control-border border-info border-width-2" id="waktu_pengujian" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-8 mb-4">
                            <label for="keterangan_sampel" class="required">Keterangan Sampel</label>
                            <textarea wire:model="keterangan_sampel" class="form-control form-control-border border-info border-width-2" id="keterangan_sampel" rows="5" disabled></textarea>
                        </div>
                        <div class="form-group col-sm-4 mb-4">
                            <label for="biaya_pengujian" class="required">Biaya Pengujian</label>
                            <input wire:model="biaya_pengujian" type="text" class="form-control form-control-border border-info border-width-2" id="biaya_pengujian" disabled>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fas fa-undo mr-1"></i> Tutup</button>
                </div>
            </div>
            {{-- /.modal-content --}}
        </div>
        {{-- /.modal-dialog --}}
    </div>
    {{-- Modal Konfirmasi --}}

    {{-- content livewire. --}}
</div>