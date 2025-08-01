@section('adm-hasil-pengujian', 'active')

<div>
    {{-- content livewire. --}}

    <div class="row">
        <div class="col-sm-12">
            <div class="callout callout-danger">
                <span class="text-dark">Hasil Pengujian | Form Hapus Data</span>
            </div>
        </div> {{-- /.col --}}
    </div> {{-- /.row --}}

    <div class="row">
        <div class="col-sm-12">
            <div class="card card-danger card-outline">
                <div class="card-header">
                    <span class="text-dark">Harap isi data dengan benar</span>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <form>

                        {{-- Proses Pendaftaran --}}
                        <div class="form-row border-bottom mb-5">
                            <div class="form-group col-sm-12 mb-2">
                                <h4 class="font-weight-normal text-danger">Informasi Pendaftaran</h4>
                            </div>
                            <div class="form-group col-sm-6 mb-4">
                                <label for="id_mitra" class="required">Nama Mitra</label>
                                <select wire:model="id_mitra" class="form-control form-control-border border-danger border-width-2" id="id_mitra" disabled>
                                    <option value="">-- Pilih Mitra --</option>
                                    @foreach ($listMitra as $mitra)
                                    <option value="{{ $mitra->id_mitra }}">{{ $mitra->nama_mitra }} - {{ $mitra->nama_institusi }}</option>
                                    @endforeach
                                </select>
                                @error('id_mitra') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 mb-4">
                                <label for="id_jenis_pengujian" class="required">Jenis Pengujian</label>
                                <select wire:model="id_jenis_pengujian" class="form-control form-control-border border-danger border-width-2" id="id_jenis_pengujian" disabled>
                                    <option value="">-- Pilih Jenis Pengujian --</option>
                                    @foreach ($listJenisPengujian as $jenis)
                                    <option value="{{ $jenis->id_jenis_pengujian }}">{{ $jenis->nama_pengujian }} - {{ $jenis->jenis_pengujian }}</option>
                                    @endforeach
                                </select>
                                @error('id_jenis_pengujian') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 mb-4">
                                <label for="tanggal_pendaftaran" class="required">Tanggal Pendaftaran</label>
                                <input wire:model="tanggal_pendaftaran" type="date" class="form-control form-control-border border-danger border-width-2" id="tanggal_pendaftaran" placeholder="Tanggal pendaftaran tidak boleh kosong" disabled>
                                @error('tanggal_pendaftaran') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 mb-4">
                                <label for="status_pendaftaran" class="required">Status Pendaftaran</label>
                                <select wire:model="status_pendaftaran" class="form-control form-control-border border-danger border-width-2" id="status_pendaftaran" disabled>
                                    <option value="">-- Status Pendaftaran --</option>
                                    <option value="Sudah Disetujui">Sudah Disetujui</option>
                                    <option value="Belum Disetujui">Belum Disetujui</option>
                                </select>
                                @error('status_pendaftaran') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        {{-- Sampel --}}
                        <div class="form-row border-bottom mb-5">
                            <div class="form-group col-sm-12 mb-2">
                                <h4 class="font-weight-normal text-danger">Sampel Material</h4>
                            </div>
                            <div class="form-group col-sm-6 mb-4">
                                <label for="tanggal_sampel" class="required">Tanggal Sampel</label>
                                <input wire:model="tanggal_sampel" type="date" class="form-control form-control-border border-danger border-width-2" id="tanggal_sampel" placeholder="Tanggal sampel tidak boleh kosong" disabled>
                                @error('tanggal_sampel') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 mb-4">
                                <label for="status_sampel" class="required">Status Sampel</label>
                                <select wire:model="status_sampel" class="form-control form-control-border border-danger border-width-2" id="status_sampel" disabled>
                                    <option value="">-- Status Sampel --</option>
                                    <option value="Sudah Dikirim">Sudah Dikirim</option>
                                    <option value="Sedang Dikirim">Sedang Dikirim</option>
                                    <option value="Belum Dikirim">Belum Dikirim</option>
                                </select>
                                @error('status_sampel') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 mb-4">
                                <label for="jenis_sampel" class="required">Jenis Sampel</label>
                                <select wire:model="jenis_sampel" class="form-control form-control-border border-danger border-width-2" id="jenis_sampel" disabled>
                                    <option value="">-- Jenis Sampel --</option>
                                    <option value="Padatan - Plat">Padatan - Plat</option>
                                    <option value="Padatan - Powder">Padatan - Powder</option>
                                    <option value="Cair atau Liquid">Cair atau Liquid</option>
                                </select>
                                @error('jenis_sampel') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 mb-4">
                                <label for="qty_sampel" class="required">QTY Sampel</label>
                                <input wire:model="qty_sampel" type="number" class="form-control form-control-border border-danger border-width-2" id="qty_sampel" placeholder="QTY sampel tidak boleh kosong" disabled>
                                @error('qty_sampel') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        {{-- Hasil Pengujian --}}
                        <div class="form-row border-bottom mb-5">
                            <div class="form-group col-sm-12 mb-2">
                                <h4 class="font-weight-normal text-danger">Pengujian Material</h4>
                            </div>
                            <div class="form-group col-sm-6 mb-4">
                                <label for="tanggal_pengujian_mulai" class="required">Tanggal Mulai Pengujian</label>
                                <input wire:model="tanggal_pengujian_mulai" type="date" class="form-control form-control-border border-danger border-width-2" id="tanggal_pengujian_mulai" placeholder="Tanggal Mulai Pengujian tidak boleh kosong" disabled>
                                @error('tanggal_pengujian_mulai') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 mb-4">
                                <label for="status_verifikasi" class="required">Status Verifikasi</label>
                                <select wire:model="status_verifikasi" class="form-control form-control-border border-danger border-width-2" id="status_verifikasi" disabled>
                                    <option value="">-- Status Verifikasi --</option>
                                    <option value="Sudah Diverifikasi">Sudah Diverifikasi</option>
                                    <option value="Sedang Diverifikasi">Sedang Diverifikasi</option>
                                    <option value="Belum Diverifikasi">Belum Diverifikasi</option>
                                </select>
                                @error('status_verifikasi') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 mb-4">
                                <label for="tanggal_pengujian_selesai" class="required">Tanggal Selesai Pengujian</label>
                                <input wire:model="tanggal_pengujian_selesai" type="date" class="form-control form-control-border border-danger border-width-2" id="tanggal_pengujian_selesai" placeholder="Tanggal Selesai Pengujian tidak boleh kosong" disabled>
                                @error('tanggal_pengujian_selesai') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 mb-4">
                                <label for="status_pengujian" class="required">Status Pengujian</label>
                                <select wire:model="status_pengujian" class="form-control form-control-border border-danger border-width-2" id="status_pengujian" disabled>
                                    <option value="">-- Status Pengujian --</option>
                                    <option value="Sudah Selesai">Sudah Selesai</option>
                                    <option value="Sedang Proses">Sedang Proses</option>
                                    <option value="Belum Selesai">Belum Selesai</option>
                                </select>
                                @error('status_pengujian') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        {{-- Invoice --}}
                        <div class="form-row border-bottom mb-5">
                            <div class="form-group col-sm-12 mb-2">
                                <h4 class="font-weight-normal text-danger">Informasi Invoice</h4>
                            </div>
                            <div class="form-group col-sm-6 mb-4">
                                <label for="tanggal_invoice" class="required">Tanggal Invoice</label>
                                <input wire:model="tanggal_invoice" type="date" class="form-control form-control-border border-danger border-width-2" id="tanggal_invoice" placeholder="Tanggal Invoice tidak boleh kosong" disabled>
                                @error('tanggal_invoice') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 mb-4">
                                <label for="status_invoice" class="required">Status Invoice</label>
                                <select wire:model="status_invoice" class="form-control form-control-border border-danger border-width-2" id="status_invoice" disabled>
                                    <option value="">-- Status Invoice --</option>
                                    <option value="Sudah Diberikan">Sudah Diberikan</option>
                                    <option value="Sedang Proses">Sedang Proses</option>
                                    <option value="Belum Diberikan">Belum Diberikan</option>
                                </select>
                                @error('status_invoice') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 mb-4">
                                <label for="nomor_invoice_internal" class="required">No. Invoice Internal</label>
                                <input wire:model="nomor_invoice_internal" type="text" class="form-control form-control-border border-danger border-width-2" id="nomor_invoice_internal" placeholder="No. Invoice Internal tidak boleh kosong" disabled>
                                @error('nomor_invoice_internal') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 mb-4">
                                <label for="nomor_invoice_eksternal" class="required">No. Invoice Eksternal</label>
                                <input wire:model="nomor_invoice_eksternal" type="text" class="form-control form-control-border border-danger border-width-2" id="nomor_invoice_eksternal" placeholder="No. Invoice Eksternal tidak boleh kosong" disabled>
                                @error('nomor_invoice_eksternal') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        {{-- Pembayaran --}}
                        <div class="form-row border-bottom mb-5">
                            <div class="form-group col-sm-12 mb-2">
                                <h4 class="font-weight-normal text-danger">Informasi Pembayaran</h4>
                            </div>
                            <div class="form-group col-sm-6 mb-4">
                                <label for="tanggal_pembayaran" class="required">Tanggal Pembayaran</label>
                                <input wire:model="tanggal_pembayaran" type="date" class="form-control form-control-border border-danger border-width-2" id="tanggal_pembayaran" placeholder="Tanggal Pembayaran tidak boleh kosong" disabled>
                                @error('tanggal_pembayaran') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 mb-4">
                                <label for="status_pembayaran" class="required">Status Pembayaran</label>
                                <select wire:model="status_pembayaran" class="form-control form-control-border border-danger border-width-2" id="status_pembayaran" disabled>
                                    <option value="">-- Status Pembayaran --</option>
                                    <option value="Sudah Dibayar">Sudah Dibayar</option>
                                    <option value="Belum Dibayar">Belum Dibayar</option>
                                </select>
                                @error('status_pembayaran') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 mb-4">
                                <label for="metode_pembayaran" class="required">Metode Pembayaran</label>
                                <select wire:model="metode_pembayaran" class="form-control form-control-border border-danger border-width-2" id="metode_pembayaran" disabled>
                                    <option value="">-- Metode Pembayaran --</option>
                                    <option value="Transfer Bank">Transfer Bank</option>
                                    <option value="QRIS">QRIS</option>
                                    <option value="Cash">Cash</option>
                                </select>
                                @error('metode_pembayaran') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 mb-4">
                                <label for="nominal_pembayaran" class="required">Nominal Pembayaran</label>
                                <input wire:model="nominal_pembayaran" type="number" class="form-control form-control-border border-danger border-width-2" id="nominal_pembayaran" placeholder="Nominal Pembayaran tidak boleh kosong" disabled>
                                @error('nominal_pembayaran') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        {{-- Kwitansi --}}
                        <div class="form-row border-bottom mb-5">
                            <div class="form-group col-sm-12 mb-2">
                                <h4 class="font-weight-normal text-danger">Informasi Kwitansi</h4>
                            </div>
                            <div class="form-group col-sm-6 mb-4">
                                <label for="tanggal_kwitansi" class="required">Tanggal Kwitansi</label>
                                <input wire:model="tanggal_kwitansi" type="date" class="form-control form-control-border border-danger border-width-2" id="tanggal_kwitansi" placeholder="Tanggal Kwitansi tidak boleh kosong" disabled>
                                @error('tanggal_kwitansi') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 mb-4">
                                <label for="status_kwitansi" class="required">Status Kwitansi</label>
                                <select wire:model="status_kwitansi" class="form-control form-control-border border-danger border-width-2" id="status_kwitansi" disabled>
                                    <option value="">-- Status Kwitansi --</option>
                                    <option value="Sudah Diberikan">Sudah Diberikan</option>
                                    <option value="Sedang Proses">Sedang Proses</option>
                                    <option value="Belum Diberikan">Belum Diberikan</option>
                                </select>
                                @error('status_kwitansi') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 mb-4">
                                <label for="nomor_kwitansi_internal" class="required">No. Kwitansi Internal</label>
                                <input wire:model="nomor_kwitansi_internal" type="text" class="form-control form-control-border border-danger border-width-2" id="nomor_kwitansi_internal" placeholder="No. Kwitansi Internal tidak boleh kosong" disabled>
                                @error('nomor_kwitansi_internal') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 mb-4">
                                <label for="nomor_kwitansi_eksternal" class="required">No. Kwitansi Eksternal</label>
                                <input wire:model="nomor_kwitansi_eksternal" type="text" class="form-control form-control-border border-danger border-width-2" id="nomor_kwitansi_eksternal" placeholder="No. Kwitansi Eksternal tidak boleh kosong" disabled>
                                @error('nomor_kwitansi_eksternal') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        {{-- Keterangan --}}
                        <div class="form-group mb-4">
                            <label for="file_hasil_pengujian" class="required">Link Download</label>
                            <textarea wire:model="file_hasil_pengujian" class="form-control form-control-border border-danger border-width-2" id="file_hasil_pengujian" rows="5" placeholder="Link download tidak boleh kosong (hasil pengujian, tagihan invoice, dan kwitansi pembyaran)" disabled></textarea>
                            @error('file_hasil_pengujian') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="keterangan" class="required">Keterangan</label>
                            <textarea wire:model="keterangan" class="form-control form-control-border border-danger border-width-2" id="keterangan" rows="5" placeholder="Keterangan tidak boleh kosong" disabled></textarea>
                            @error('keterangan') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <button type="button" class="btn btn-block btn-outline-danger" data-toggle="modal" data-target="#confirmModal">
                                <i class="fas fa-trash mr-1"></i> Hapus
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
                        <i class="fas fa-save mr-1"></i> Hapus
                    </button>
                </div>
            </div> {{-- /.modal-content --}}
        </div> {{-- /.modal-dialog --}}
    </div> {{-- Modal Konfirmasi --}}

    {{-- content livewire. --}}
</div>