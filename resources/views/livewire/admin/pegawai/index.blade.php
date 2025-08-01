@section('adm-pegawai', 'active')

<div>
    {{-- content livewire. --}}

    <div class="row">
        <div class="col-sm-12">
            <div class="callout callout-success">
                <span class="text-dark">Data Tenaga Ahli dan Teknisi Laboran</span>
            </div> {{-- /.callout --}}
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
            </div> {{-- /.alert --}}
        </div> {{-- /.col --}}
    </div> {{-- /.row --}}
    @endif

    <div class="row">
        <div class="col-sm-12">
            <div class="card card-outline card-success">

                <div class="card-header">
                    <div class="mt-2 mb-2">
                        <a wire:navigate href="{{ route('admin.pegawai.create') }}" class="btn btn-outline-success">Tambah Data</a>
                    </div>
                </div>
                {{-- /.card-header --}}

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
                                        <th>Nama Lengkap</th>
                                        <th>Email Aktif</th>
                                        <th>Telp WA</th>
                                        <th>Keahlian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pegawai as $key => $item)
                                    <tr>
                                        <td>{{ $pegawai->firstItem() + $key }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-outline-info" wire:click="showData({{ $item->id_pegawai }})" data-toggle="modal" data-target="#confirmModal"><i class="fa-solid fa-display"></i></a>
                                            <a class="btn btn-sm btn-outline-warning" wire:navigate href="{{ route('admin.pegawai.edit', ['id' => $item->id_pegawai]) }}"><i class="fa-solid fa-edit"></i></a>
                                            <a class="btn btn-sm btn-outline-danger" wire:navigate href="{{ route('admin.pegawai.drop', ['id' => $item->id_pegawai]) }}"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                        <td>{{ $item->nama_pegawai }}</td>
                                        <td>{{ $item->email_pegawai }}</td>
                                        <td>{{ $item->telp_pegawai }}</td>
                                        <td>{{ $item->keahlian }}</td>
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
                            {{ $pegawai->links() }}
                        </div>
                        {{-- /.col --}}
                    </div>
                    {{-- /.row --}}

                </div>
                {{-- /.card-body --}}

                <div class="card-footer">
                    <small class="text-danger">Pembaharuan data di tanggal {{ date('Y-m-d') }} pukul {{ date('H:i')}} WIB</small>
                </div>
                {{-- /.card-footer --}}

            </div>{{-- /.card --}}
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
                        <label for="nama_pegawai" class="required">Nama Pegawai</label>
                        <input wire:model="nama_pegawai" type="text" class="form-control form-control-border border-info border-width-2" id="nama_pegawai" placeholder="Contoh. Aryajaya Alamsyah" disabled>
                    </div>
                    <div class="form-group mb-4">
                        <label for="email_pegawai" class="required">Email Pegawai</label>
                        <input wire:model="email_pegawai" type="text" class="form-control form-control-border border-info border-width-2" id="email_pegawai" placeholder="Contoh. aryajayaalamsyah@gmail.com" disabled>
                    </div>
                    <div class="form-group mb-4">
                        <label for="telp_pegawai" class="required">Telp Pegawai</label>
                        <input wire:model="telp_pegawai" type="text" class="form-control form-control-border border-info border-width-2" id="telp_pegawai" placeholder="Contoh. 0819-xxxx-xxxx" disabled>
                    </div>
                    <div class="form-group mb-4">
                        <label for="keahlian" class="required">Keahlian</label>
                        <input wire:model="keahlian" type="text" class="form-control form-control-border border-info border-width-2" id="keahlian" placeholder="Contoh. Teknisi IT" disabled>
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