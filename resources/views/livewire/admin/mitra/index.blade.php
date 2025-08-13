@section('adm-mitra', 'active')

<div>
    {{-- content livewire. --}}

    <div class="row">
        <div class="col-sm-12">
            <div class="callout callout-success">
                <span class="text-dark">Data Institusi & Mitra LST-FMIPA UI</span>
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
                        <a wire:navigate href="{{ route('admin.mitra.create') }}" class="btn btn-outline-success">Tambah Data</a>
                    </div>
                </div>
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
                            <input wire:model.live.debounce.500ms="search" type="text" class="form-control form-control-border border-success border-width-2" id="search" placeholder="Pencarian Data">
                        </div>
                        {{-- /.col --}}
                    </div>
                    {{-- /.row --}}

                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <table class="table table-bordered table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Aksi</th>
                                        <th>NIK/NPWP</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email Aktif</th>
                                        <th>Telp WA</th>
                                        <th>Institusi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($mitra as $key => $item)
                                    <tr>
                                        <td>{{ $mitra->firstItem() + $key }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-outline-info" wire:click="showData({{ $item->id_mitra }})" data-toggle="modal" data-target="#confirmModal">
                                                <i class="fa-solid fa-display"></i>
                                            </a>
                                            <a class="btn btn-sm btn-outline-warning" wire:navigate href="{{ route('admin.mitra.edit', ['id' => $item->id_mitra]) }}">
                                                <i class="fa-solid fa-edit"></i>
                                            </a>
                                            <a class="btn btn-sm btn-outline-danger" wire:navigate href="{{ route('admin.mitra.drop', ['id' => $item->id_mitra]) }}">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </td>
                                        <td>{{ $item->nik_mitra ?? '-' }}</td>
                                        <td>{{ $item->nama_mitra ?? '-' }}</td>
                                        <td>{{ $item->email_mitra ?? '-' }}</td>
                                        <td>{{ $item->telp_mitra ?? '-' }}</td>
                                        <td>{{ $item->nama_institusi ?? '-' }}</td>
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
                            {{ $mitra->links() }}
                        </div>
                        {{-- /.col --}}
                    </div>
                    {{-- /.row --}}
                </div>
                {{-- /.card-body --}}
                <div class="card-footer">
                    <small class="text-danger">Pembaharuan data di tanggal {{ date('Y-m-d') }} pukul {{ date('H:i')}} WIB</small>
                </div> {{-- /.card-footer --}}
            </div> {{-- /.card --}}
        </div> {{-- /.col --}}
    </div> {{-- /.row --}}

    {{-- Modal Konfirmasi --}}
    <div wire:ignore.self class="modal fade" id="confirmModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Informasi.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label for="nik_mitra" class="required">NIK/NPWP</label>
                        <input wire:model="nik_mitra" type="text" class="form-control form-control-border border-info border-width-2" id="nik_mitra" placeholder="Contoh. Nomor NIK Mitra (16 Digit)" disabled>
                    </div>
                    <div class="form-group mb-4">
                        <label for="nama_mitra" class="required">Nama Mitra</label>
                        <input wire:model="nama_mitra" type="text" class="form-control form-control-border border-info border-width-2" id="nama_mitra" placeholder="Contoh. Aryajaya Alamsyah" disabled>
                    </div>
                    <div class="form-group mb-4">
                        <label for="email_mitra" class="required">Email Mitra</label>
                        <input wire:model="email_mitra" type="email" class="form-control form-control-border border-info border-width-2" id="email_mitra" placeholder="Contoh. email@gmail.com" disabled>
                    </div>
                    <div class="form-group mb-4">
                        <label for="telp_mitra" class="required">Telp Mitra</label>
                        <input wire:model="telp_mitra" type="text" class="form-control form-control-border border-info border-width-2" id="telp_mitra" placeholder="Contoh. 0819-xxxx-xxxx" disabled>
                    </div>
                    <div class="form-group mb-4">
                        <label for="nama_institusi" class="required">Asal Institusi</label>
                        <input wire:model="nama_institusi" type="text" class="form-control form-control-border border-info border-width-2" id="nama_institusi" placeholder="Contoh. Universitas Indonesia" disabled>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fas fa-undo mr-1"></i> Tutup</button>
                </div>
            </div> {{-- /.modal-content --}}
        </div> {{-- /.modal-dialog --}}
    </div> {{-- Modal Konfirmasi --}}

    {{-- content livewire. --}}
</div>