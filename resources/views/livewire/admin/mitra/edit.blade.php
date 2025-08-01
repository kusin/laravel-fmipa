@section('adm-mitra', 'active')

<div>
    {{-- content livewire. --}}
    <div class="row">
        <div class="col-sm-12">
            <div class="callout callout-warning">
                <span class="text-dark">Data Institusi & Mitra | Form Ubah Data</span>
            </div>
        </div>
        {{-- /.col --}}
    </div>
    {{-- /.row --}}

    <div class="row">
        <div class="col-sm-12">
            <div class="card card-warning card-outline">
                <div class="card-header">
                    <span class="text-dark">Harap isi data dengan benar</span>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group mb-4">
                            <label for="nama_mitra" class="required">Nama Mitra</label>
                            <input wire:model="nama_mitra" type="text" class="form-control form-control-border border-warning border-width-2" id="nama_mitra" placeholder="Contoh. Aryajaya Alamsyah">
                            @error('nama_mitra') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="email_mitra" class="required">Email Mitra</label>
                            <input wire:model="email_mitra" type="email" class="form-control form-control-border border-warning border-width-2" id="email_mitra" placeholder="Contoh. aryajayaalamsyah@gmail.com">
                            @error('email_mitra') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="telp_mitra" class="required">Telp Mitra</label>
                            <input wire:model="telp_mitra" type="text" class="form-control form-control-border border-warning border-width-2" id="telp_mitra" placeholder="Contoh. 0819-xxxx-xxxx">
                            @error('telp_mitra') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="nama_institusi" class="required">Asal Institusi</label>
                            <input wire:model="nama_institusi" type="text" class="form-control form-control-border border-warning border-width-2" id="nama_institusi" placeholder="Contoh. Universitas Indonesia">
                            @error('nama_institusi') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="password" class="required">Password</label>
                            <input wire:model="password" type="password" class="form-control form-control-border border-warning border-width-2" id="password" placeholder="Password minimal 8 karakter">
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                            <div class="form-group form-check mt-2">
                                <input type="checkbox" class="form-check-input" id="showPassword" onclick="togglePassword()">
                                <label class="form-check-label" for="showPassword">Tampilkan password</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="reset" class="btn btn-outline-danger">
                                <i class="fas fa-undo mr-1"></i> Hapus
                            </button>
                            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#confirmModal">
                                <i class="fas fa-save mr-1"></i> Simpan
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
            <div class="modal-content modal-warning-outline">
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
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">
                        <i class="fas fa-undo mr-1"></i> Tutup
                    </button>
                    <button type="button" class="btn btn-outline-success" data-dismiss="modal" wire:click="update">
                        <i class="fas fa-save mr-1"></i>Simpan
                    </button>
                </div>
            </div>
        </div>
        {{-- /.modal-dialog --}}
    </div>
    {{-- Modal Konfirmasi Simpan --}}

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const checkbox = document.getElementById('showPassword');
            input.type = checkbox.checked ? 'text' : 'password';
        }
    </script>


    {{-- content livewire. --}}
</div>