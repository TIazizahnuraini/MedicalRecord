@extends('layouts.app')

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-note2 icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Data Periksa {{ $poli->nama_poli }}
                        <div class="page-title-subheading">
                            Data Periksa adalah halaman daftar data periksa.
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">

                {{-- <a href="{{ route('periksa.create') }}" class="btn btn-primary mb-2">
                    <i class="fas fa-plus"></i> Tambah
                </a> --}}


                <div class="main-card mb-3 card">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="datatables" class="table table-hover table-striped display nowrap" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th>Nama Pasien</th>
                                        <th>Dokter</th>
                                        <th>Poli</th>
                                        <th>Nomor Pasien</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php $no = 1 @endphp
                                    @foreach ($antrians as $antrian)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $antrian->user->name }}</td>
                                            <td>{{ $antrian->dokter->nama_dokter }}</td>
                                            <td>{{ $antrian->poli->nama_poli }}</td>
                                            <td>{{ $antrian->nomor_antrian }}</td>
                                            <td>{{ $antrian->status }}</td>
                                            <td>
                                                <a href="{{ route('kunjungan.create.step1', $antrian->id) }}"
                                                    class="btn btn-info btn-sm">
                                                    <i class="fas fa-arrow-right"></i>
                                                </a>
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
