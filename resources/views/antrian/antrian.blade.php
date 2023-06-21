@extends('layouts.app')

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="metismenu-icon pe-7s-add-user icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Data Antrian
                        <div class="page-title-subheading">
                            Data Antrian adalah halaman daftar antrian pasien.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">

                @if ($antrianUser)
                    <div class="alert alert-success mb-2" role="alert">
                        Nomor Antrian Anda : {{ $antrianUser->nomor_antrian }} pada {{ $antrianUser->poli->nama_poli }}
                    </div>
                @else
                    @if ($cekPeriksa)
                    <div class="alert alert-info mb-2" role="alert">
                        Anda sudah terlayani, semoga lekas sembuh
                    </div>
                    @else
                    <div class="alert alert-warning mb-2" role="alert">
                        Anda belum melakukan antrian
                    </div>
                    
                    @endif
                    
                    <a href="{{ route('antrian.create') }}" class="btn btn-primary mb-2">
                        <i class="fas fa-user-plus"></i> Tambah
                    </a>
                @endif



                <div class="main-card mb-3 card">
                    <div class="card-body">

                        <div class="row">
                            @foreach ($antrians as $antrian)
                                <div class="col-md-6">
                                    <div
                                        class="card text-white {{ $antrian['poli'] == 'Poli Gigi' ? 'bg-primary' : 'bg-info' }} mb-3">
                                        <div class="card-header">{{ $antrian['poli'] }} : {{$antrian['jadwal']}}</div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h5 class="card-title">Total Antrian</h5>
                                                    <p class="card-text">{{ $antrian['totalAntrian'] == 0 ? 'Belum ada antrian' : $antrian['totalAntrian'] }}</p>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="card-title">Nomor Antrian Sekarang</h5>
                                                    <p class="card-text">{{ $antrian['antrianSekarang'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- <div class="table-responsive">
                            <table id="datatables" class="table table-hover table-striped display nowrap" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th>Poli</th>
                                        <th>Dokter</th>
                                        <th>Jadwal</th>
                                        <th>Total Antrian</th>
                                        <th>Antrian Sekarang</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php $no = 1 @endphp
                                    @foreach ($antrians as $antrian)
                                        {{-- @php
                                            dd($antrian);
                                        @endphp 
                                        <tr>
                                            <th class="text-center" scope="row">{{ $no++ }}.</th>
                                            <td>{{ $antrian['poli'] }}</td>
                                            <td>{{ $antrian['dokter'] }}</td>
                                            <td>{{ $antrian['jadwal']}}</td>
                                            <td>{{ $antrian['totalAntrian'] }}</td>
                                            <td>{{ $antrian['antrianSekarang'] }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
