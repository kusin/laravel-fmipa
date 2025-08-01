@section('mt-pengujian-material', 'active')

<div>
    {{-- content livewire. --}}

    <div class="row">
        <div class="col-sm-12">
            <div class="callout callout-warning">
                <span class="text-dark">Data Pengujian Material | Form Ubah Data</span>
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
                {{-- /.card-header --}}
                <div class="card-body">
                    <form>

                        {{-- Nama Mitra --}}
                        <div class="form-group mb-4">
                            <label for="id_mitra" class="required">Nama Mitra</label>
                            <select wire:model="id_mitra" class="form-control form-control-border border-warning border-width-2" id="id_mitra">
                                <option value="">-- Pilih Mitra --</option>
                                @foreach ($listMitra as $mitra)
                                <option value="{{ $mitra->id_mitra }}">{{ $mitra->nama_mitra }} - {{ $mitra->nama_institusi }}</option>
                                @endforeach
                            </select>
                            @error('id_mitra') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- Proses Pendaftaran --}}
                        <div class="form-row">
                            <div class="form-group col-sm-4 mb-4">
                                <label for="id_jenis_pengujian" class="required">Jenis Pengujian</label>
                                <select wire:model="id_jenis_pengujian" class="form-control form-control-border border-warning border-width-2" id="id_jenis_pengujian">
                                    <option value="">-- Pilih Jenis Pengujian --</option>
                                    @foreach ($listJenisPengujian as $jenis)
                                    <option value="{{ $jenis->id_jenis_pengujian }}">{{ $jenis->nama_pengujian }} - {{ $jenis->jenis_pengujian }}</option>
                                    @endforeach
                                </select>
                                @error('id_jenis_pengujian') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-4 mb-4">
                                <label for="jenis_sampel" class="required">Jenis Sampel</label>
                                <select wire:model="jenis_sampel" class="form-control form-control-border border-warning border-width-2" id="jenis_sampel">
                                    <option value="">-- Jenis Sampel --</option>
                                    <option value="Padatan - Plat">Padatan - Plat</option>
                                    <option value="Padatan - Powder">Padatan - Powder</option>
                                    <option value="Cair atau Liquid">Cair atau Liquid</option>
                                </select>
                                @error('jenis_sampel') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-4 mb-4">
                                <label for="qty_sampel" class="required">QTY Sampel</label>
                                <input wire:model="qty_sampel" type="number" class="form-control form-control-border border-warning border-width-2" id="qty_sampel" placeholder="QTY sampel tidak boleh kosong">
                                @error('qty_sampel') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        {{-- Keterangan --}}
                        <div class="form-group mb-4">
                            <label for="keterangan" class="required">Keterangan</label>
                            <textarea wire:model="keterangan" class="form-control form-control-border border-warning border-width-2" id="keterangan" rows="5" placeholder="Catatan tambahan untuk pengujian material"></textarea>
                            @error('keterangan') <span class="text-danger">{{ $message }}</span> @enderror
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
                {{-- /.card-body --}}
            </div>
            {{-- /.card --}}
        </div>
        {{-- /.col --}}
    </div>
    {{-- /.row --}}

    {{-- Modal Konfirmasi --}}
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
    </div> {{-- Modal Konfirmasi --}}

    {{-- content livewire. --}}
</div>