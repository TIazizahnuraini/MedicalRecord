@extends('layouts.app')

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-id icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Data Rekam Medis
                        <div class="page-title-subheading">
                            Data Rekam Medis adalah halaman daftar data rekam medis.
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">

                {{-- <a href="{{ route('dokter.create') }}" class="btn btn-primary mb-2">
                    <i class="fas fa-user-plus"></i> Tambah
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
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php $no = 1 @endphp
                                    @foreach ($kunjungans as $kunjungan)
                                        <tr>
                                            <th class="text-center" scope="row">{{ $no++ }}.</th>
                                            <td>{{ $kunjungan->user->name }}</td>

                                            <td class="text-center">

                                                    <a href="{{ route('laporan-medis.show', $kunjungan->user->id) }}"
                                                        class="btn btn-success btn-sm">Detail
                                                        <i class="fas fa-info"></i>
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
