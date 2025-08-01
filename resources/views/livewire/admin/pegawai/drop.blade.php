@section('adm-pegawai', 'active')

<div>
    {{-- content livewire. --}}

    <div class="row">
        <div class="col-sm-12">
            <div class="callout callout-danger">
                <span class="text-dark">Data TA & Teknisi | Form Hapus Data</span>
            </div>
        </div>
        {{-- /.col --}}
    </div>
    {{-- /.row --}}

    <div class="row">
        <div class="col-sm-12">
            <div class="card card-danger card-outline">
                <div class="card-header">
                    <span class="text-dark">Data akan dihapus. Pastikan kembali data tersebut</span>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group mb-4">
                            <label for="nama_pegawai" class="required">Nama Pegawai</label>
                            <input wire:model="nama_pegawai" type="text" class="form-control form-control-border border-danger border-width-2" id="nama_pegawai" placeholder="Contoh. Aryajaya Alamsyah" disabled>
                            @error('nama_pegawai') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="email_pegawai" class="required">Email Pegawai</label>
                            <input wire:model="email_pegawai" type="email" class="form-control form-control-border border-danger border-width-2" id="email_pegawai" placeholder="Contoh. aryajayaalamsyah@gmail.com" disabled>
                            @error('email_pegawai') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="telp_pegawai" class="required">Telp Pegawai</label>
                            <input wire:model="telp_pegawai" type="text" class="form-control form-control-border border-danger border-width-2" id="telp_pegawai" placeholder="Contoh. 0819-xxxx-xxxx" disabled>
                            @error('telp_pegawai') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="keahlian" class="required">Keahlian</label>
                            <select wire:model="keahlian" class="form-control form-control-border border-danger border-width-2" id="keahlian" disabled>
                                <option value="">-- Pilih Keahlian --</option>
                                <option value="Tenaga Ahli">Tenaga Ahli</option>
                                <option value="Teknisi Laboran">Teknisi Laboran</option>
                                <option value="Teknisi IT">Teknisi IT</option>
                            </select>
                            @error('keahlian') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-block btn-outline-danger" data-toggle="modal" data-target="#confirmModal">
                                <i class="fas fa-trash mr-1"></i> Hapus
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            {{-- /.card --}}
        </div>
        {{-- /.col --}}
    </div>
    {{-- /.row --}}

    {{-- Modal Konfirmasi Simpan --}}
    <div wire:ignore.self class="modal fade" id="confirmModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-danger-outline">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span class="text-dark">Apakah anda yakin ...? </span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                        <i class="fas fa-undo mr-1"></i> Tutup
                    </button>
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal" wire:click="delete">
                        <i class="fas fa-trash mr-1"></i>Hapus
                    </button>
                </div>
            </div>
        </div>
        {{-- /.modal-dialog --}}
    </div>
    {{-- Modal Konfirmasi Simpan --}}

    {{-- content livewire. --}}
</div>