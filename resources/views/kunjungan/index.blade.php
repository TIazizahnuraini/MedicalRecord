@extends('layouts.app')

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-display2 icon-gradient bg-mean-fruit">
                        </i>
                    </div> 
                    <div>Data Kunjungan
                        <div class="page-title-subheading">
                            Data Kunjungan adalah halaman daftar data kunjungan pasien.
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">

                <a href="{{ route('kunjungan.create.step1') }}" class="btn btn-primary mb-2">
                    <i class="fas fa-plus"></i> Tambah
                </a>

                <div class="main-card mb-3 card">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="datatables" class="table table-hover table-striped display nowrap" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th>Nama Pasien</th>
                                        <th>Tgl Kunjungan</th>
                                        <th>Poli</th>
                                        <th>Tipe Kunjungan</th>
                                        <th>Nama Dokter</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php $no = 1 @endphp
                                    @foreach ($kunjungans as $kunjungan)
                                        <tr>
                                            <th class="text-center" scope="row">{{ $no++ }}.</th>
                                            <td>{{ $kunjungan->pasien->nama_pasien }}</td>
                                            <td>{{ date('d F Y', strtotime($kunjungan->tgl_kunjungan)) }}</td>
                                            <td>{{ $kunjungan->poli->nama_poli }}</td>
                                            <td>{{ $kunjungan->jenis_kunjungan }}</td>
                                            <td>{{ $kunjungan->dokter->nama_dokter }}</td>
                                            <td>{{ $kunjungan->status }}</td>

                                            <td class="text-center">
                                                <form action="" method="post">

                                                    {{-- <a href="" class="btn btn-success btn-sm">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a> --}}

                                                    @csrf
                                                    @method('get')

                                                    <button type="submit" class="btn btn-danger btn-sm destroy-kunjungan">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
