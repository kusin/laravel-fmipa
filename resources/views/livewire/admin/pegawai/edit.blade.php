@section('adm-pegawai', 'active')

<div>
    {{-- content livewire. --}}

    <div class="row">
        <div class="col-sm-12">
            <div class="callout callout-warning">
                <span class="text-dark">Data TA & Teknisi | Form Ubah Data</span>
            </div>
        </div> {{-- /.col --}}
    </div> {{-- /.row --}}

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
                            <label for="nama_pegawai" class="required">Nama Pegawai</label>
                            <input wire:model="nama_pegawai" type="text" class="form-control form-control-border border-warning border-width-2" id="nama_pegawai" placeholder="Contoh. Aryajaya Alamsyah">
                            @error('nama_pegawai') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="email_pegawai" class="required">Email Pegawai</label>
                            <input wire:model="email_pegawai" type="email" class="form-control form-control-border border-warning border-width-2" id="email_pegawai" placeholder="Contoh. aryajayaalamsyah@gmail.com">
                            @error('email_pegawai') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="telp_pegawai" class="required">Telp Pegawai</label>
                            <input wire:model="telp_pegawai" type="text" class="form-control form-control-border border-warning border-width-2" id="telp_pegawai" placeholder="Contoh. 0819-xxxx-xxxx">
                            @error('telp_pegawai') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="keahlian" class="required">Keahlian</label>
                            <select wire:model="keahlian" class="form-control form-control-border border-warning border-width-2" id="keahlian">
                                <option value="">-- Pilih Keahlian --</option>
                                <option value="Tenaga Ahli">Tenaga Ahli</option>
                                <option value="Teknisi Laboran">Teknisi Laboran</option>
                                <option value="Teknisi IT">Teknisi IT</option>
                            </select>
                            @error('keahlian') <span class="text-danger">{{ $message }}</span> @enderror
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
                </div> {{-- /.card-body --}}
            </div> {{-- /.card --}}
        </div> {{-- /.col --}}
    </div> {{-- /.row --}}

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
                        <i class="fas fa-save mr-1"></i> Simpan
                    </button>
                </div>
            </div> {{-- /.modal-content --}}
        </div> {{-- /.modal-dialog --}}
    </div> {{-- Modal Konfirmasi Simpan --}}

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const checkbox = document.getElementById('showPassword');
            input.type = checkbox.checked ? 'text' : 'password';
        }
    </script>

    {{-- content livewire. --}}
</div>