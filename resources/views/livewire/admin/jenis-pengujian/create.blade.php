@section('adm-jenis-pengujian', 'active')

<div>
    {{-- content livewire. --}}

    <div class="row">
        <div class="col-sm-12">
            <div class="callout callout-success">
                <span class="text-dark">Jenis Pengujian | Form Tambah Data</span>
            </div>
        </div> {{-- /.col --}}
    </div> {{-- /.row --}}

    <div class="row">
        <div class="col-sm-12">
            <div class="card card-success card-outline">
                <div class="card-header">
                    <span class="text-dark">Harap isi data dengan benar</span>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-sm-6 mb-4">
                                <label for="nama_pengujian" class="required">Nama Pengujian</label>
                                <input wire:model="nama_pengujian" type="text" class="form-control form-control-border border-success border-width-2" id="nama_pengujian" placeholder="Nama pengujian tidak boleh kosong">
                                @error('nama_pengujian') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 mb-4">
                                <label for="jenis_pengujian" class="required">Jenis Pengujian</label>
                                <input wire:model="jenis_pengujian" type="text" class="form-control form-control-border border-success border-width-2" id="jenis_pengujian" placeholder="Jenis Pengujian tidak boleh kosong">
                                @error('jenis_pengujian') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="deskripsi_pengujian" class="required">Deskripsi Pengujian</label>
                            <textarea wire:model="deskripsi_pengujian" class="form-control form-control-border border-success border-width-2" id="deskripsi_pengujian" rows="5" placeholder="Deskripsi Pengujian tidak boleh kosong"></textarea>
                            @error('deskripsi_pengujian') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-8 mb-4">
                                <label for="alat_pengujian" class="required">Alat Pengujian</label>
                                <textarea wire:model="alat_pengujian" class="form-control form-control-border border-success border-width-2" id="alat_pengujian" rows="5" placeholder="Alat Pengujian tidak boleh kosong"></textarea>
                                @error('alat_pengujian') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-4 mb-4">
                                <label for="jumlah_alat" class="required">Jumlah Alat</label>
                                <input wire:model="jumlah_alat" type="text" class="form-control form-control-border border-success border-width-2" id="jumlah_alat" placeholder="Jumlah Alat tidak boleh kosong">
                                @error('jumlah_alat') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-8 mb-4">
                                <label for="metode_pengujian" class="required">Metode Pengujian</label>
                                <textarea wire:model="metode_pengujian" class="form-control form-control-border border-success border-width-2" id="metode_pengujian" rows="5" placeholder="Metode Pengujian tidak boleh kosong"></textarea>
                                @error('metode_pengujian') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-4 mb-4">
                                <label for="waktu_pengujian" class="required">Waktu Pengujian</label>
                                <input wire:model="waktu_pengujian" type="text" class="form-control form-control-border border-success border-width-2" id="waktu_pengujian" placeholder="Waktu Pengujian tidak boleh kosong">
                                @error('waktu_pengujian') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-8 mb-4">
                                <label for="keterangan_sampel" class="required">Keterangan Sampel</label>
                                <textarea wire:model="keterangan_sampel" class="form-control form-control-border border-success border-width-2" id="keterangan_sampel" rows="5" placeholder="Keterangan sampel tidak boleh kosong"></textarea>
                                @error('keterangan_sampel') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-4 mb-4">
                                <label for="biaya_pengujian" class="required">Biaya Pengujian</label>
                                <input wire:model="biaya_pengujian" type="number" class="form-control form-control-border border-success border-width-2" id="biaya_pengujian" placeholder="Biaya Pengujian tidak boleh kosong">
                                @error('biaya_pengujian') <span class="text-danger">{{ $message }}</span> @enderror
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

    {{-- Modal Konfirmasi --}}
    <div wire:ignore.self class="modal fade" id="confirmModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-success-outline">
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
                    <button type="button" class="btn btn-outline-success" data-dismiss="modal" wire:click="store">
                        <i class="fas fa-save mr-1"></i> Simpan
                    </button>
                </div>
            </div> {{-- /.modal-content --}}
        </div> {{-- /.modal-dialog --}}
    </div> {{-- Modal Konfirmasi --}}

    {{-- content livewire. --}}
</div>