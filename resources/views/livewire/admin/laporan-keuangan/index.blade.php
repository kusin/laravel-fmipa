@section('adm-laporan-keuangan', 'active')

@php
$dataTransaksi = [
['tanggal' => '2025-07-01', 'keterangan' => 'Biaya Pengujian XRD', 'jenis' => 'Pemasukan', 'nominal' => 250000],
['tanggal' => '2025-07-02', 'keterangan' => 'Pembelian Bahan Kimia', 'jenis' => 'Pengeluaran', 'nominal' => 150000],
['tanggal' => '2025-07-03', 'keterangan' => 'Jasa Analisa Spektrofotometri', 'jenis' => 'Pemasukan', 'nominal' => 300000],
['tanggal' => '2025-07-04', 'keterangan' => 'Perbaikan Alat', 'jenis' => 'Pengeluaran', 'nominal' => 200000],
['tanggal' => '2025-07-05', 'keterangan' => 'Pemasukan Non-Lab', 'jenis' => 'Pemasukan', 'nominal' => 175000],
['tanggal' => '2025-07-06', 'keterangan' => 'Penggantian Komponen', 'jenis' => 'Pengeluaran', 'nominal' => 225000],
['tanggal' => '2025-07-07', 'keterangan' => 'Biaya Pengujian FTIR', 'jenis' => 'Pemasukan', 'nominal' => 275000],
['tanggal' => '2025-07-08', 'keterangan' => 'Servis Kompresor', 'jenis' => 'Pengeluaran', 'nominal' => 180000],
['tanggal' => '2025-07-09', 'keterangan' => 'Pemasukan Eksternal', 'jenis' => 'Pemasukan', 'nominal' => 320000],
['tanggal' => '2025-07-10', 'keterangan' => 'Pembelian Alat Tulis', 'jenis' => 'Pengeluaran', 'nominal' => 120000],
];
@endphp

<div>
    {{-- content livewire. --}}

    <div class="row mb-3">
        <div class="col-sm-12">
            <div class="callout callout-success">
                <span class="text-danger">Coming soon - Informasi Keuangan LST MIPA Universitas Indonesia</span>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3> Rp. 000.000,- </h3>
                    <p class="text-light">Total Saldo</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-chart-simple"></i>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3> Rp. 000,- </h3>
                    <p class="text-light">Pemasukan</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-wallet"></i>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3> Rp. 000,- </h3>
                    <p class="text-light">Pengeluaran</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-coins"></i>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3> Rp. 000,- </h3>
                    <p class="text-light">Piutang</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-wallet"></i>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3> Rp. 000,- </h3>
                    <p class="text-light">Hutang</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-coins"></i>
                </div>
            </div>
        </div>
        {{-- /.col --}}
    </div>
    {{-- /.row --}}

    <div class="row mb-3">
        <div class="col-sm-12">
            <div class="card card-success card-outline">
                <div class="card-header"></div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Aksi</th>
                                <th>Tanggal Transaksi</th>
                                <th>Keterangan</th>
                                <th>Jenis Transaksi</th>
                                <th>Nominal Uang</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataTransaksi as $item)
                            <tr>
                                <td>
                                    <a class="btn btn-sm btn-outline-info"><i class="fa-solid fa-display"></i></a>
                                    <a class="btn btn-sm btn-outline-warning"><i class="fa-solid fa-edit"></i></a>
                                    <a class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></a>
                                </td>
                                <td>{{ $item['tanggal'] }}</td>
                                <td>{{ $item['keterangan'] }}</td>
                                <td>{{ $item['jenis'] }}</td>
                                <td>Rp. {{ number_format($item['nominal'], 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <small class="text-danger">Pembaharuan data di tanggal {{ date('Y-m-d') }} pukul {{ date('H:i')}} WIB</small>
                </div>
                {{-- /.card-footer --}}
            </div>
            {{-- /.card --}}
        </div>
        {{-- /.col --}}
    </div>
    {{-- /.row --}}

    {{-- content livewire. --}}
</div>