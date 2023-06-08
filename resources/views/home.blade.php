@extends('layouts.app')

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-home icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Dashboard
                        <div class="page-title-subheading">
                            Dashboard adalah halaman utama aplikasi.
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">

            {{-- admin --}}
            @if (auth()->user()->role == "admin")
            <div class="col-md-6 col-xl-4">
                <a href="pasien" class="text-white" style="text-decoration: none;">
                    <div class="card mb-3 widget-content bg-arielle-smile">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Data Pasien</div>
                                <div class="widget-subheading">lihat detail <i class="fas fa-arrow-right"></i></div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white">
                                    <span class="pe-7s-folder"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endif

            @if (auth()->user()->role == "admin")
            <div class="col-md-6 col-xl-4">
                <a href="kunjungan" class="text-white" style="text-decoration: none;">
                    <div class="card mb-3 widget-content bg-grow-early">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Data Medis</div>
                                <div class="widget-subheading">lihat detail <i class="fas fa-arrow-right"></i></div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white">
                                    <span class="pe-7s-folder"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endif

            @if (auth()->user()->role == "admin")
            <div class="col-md-6 col-xl-4">
                <a href="obat" class="text-white" style="text-decoration: none;">
                    <div class="card mb-3 widget-content bg-ripe-malin">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Data Stok Obat</div>
                                <div class="widget-subheading">lihat detail <i class="fas fa-arrow-right"></i></div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white">
                                    <span class="pe-7s-server"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endif

            {{-- pasien --}}
            @if (auth()->user()->role == "pasien")
            <div class="col-md-4 mb-3">
                <a href="pasien" class="text-white" style="text-decoration: none;">
                    <div class="card mb-3 widget-content bg-arielle-smile">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Edit Data Pasien</div>
                                <div class="widget-subheading">lihat detail <i class="fas fa-arrow-right"></i></div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white">
                                    <span class="pe-7s-folder"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endif

            @if (auth()->user()->role == "pasien")
            <div class="col-md-4 mb-3">
                <a href="?page=supplier" class="text-white" style="text-decoration: none;">
                    <div class="card mb-3 widget-content bg-grow-early">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Daftar Antrian</div>
                                <div class="widget-subheading">lihat detail <i class="fas fa-arrow-right"></i></div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white">
                                    <span class="pe-7s-folder"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endif

            @if (auth()->user()->role == "pasien")
            <div class="col-md-4 mb-3">
                <a href="?page=supplier" class="text-white" style="text-decoration: none;">
                    <div class="card mb-3 widget-content bg-ripe-malin">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Laporan Data Rekam Medis</div>
                                <div class="widget-subheading">lihat detail <i class="fas fa-arrow-right"></i></div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white">
                                    <span class="pe-7s-folder"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endif
            

            {{-- KpKlinik --}}
            @if (auth()->user()->role == "kepala_klinik")
            <div class="col-md-3 mb-3">
                <a href="?page=supplier" class="text-white" style="text-decoration: none;">
                    <div class="card mb-3 widget-content bg-arielle-smile">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Laporan Data Rekam Medis</div>
                                <div class="widget-subheading">lihat detail <i class="fas fa-arrow-right"></i></div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white">
                                    <span class="pe-7s-folder"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endif

            @if (auth()->user()->role == "kepala_klinik")
            <div class="col-md-3 mb-3">
                <a href="?page=supplier" class="text-white" style="text-decoration: none;">
                    {{-- <div class="card mb-3 widget-content bg-ripe-malin"> --}}
                    <div class="card mb-3 widget-content bg-arielle-smile">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Laporan Data Pasien</div>
                                <div class="widget-subheading">lihat detail <i class="fas fa-arrow-right"></i></div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white">
                                    <span class="pe-7s-folder"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endif

            @if (auth()->user()->role == "kepala_klinik")
            <div class="col-md-3 mb-3">
                <a href="?page=supplier" class="text-white" style="text-decoration: none;">
                    <div class="card mb-3 widget-content bg-arielle-smile">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Laporan Data Dokter</div>
                                <div class="widget-subheading">lihat detail <i class="fas fa-arrow-right"></i></div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white">
                                    <span class="pe-7s-folder"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endif

            @if (auth()->user()->role == "kepala_klinik")
            <div class="col-md-3 mb-3">
                <a href="?page=supplier" class="text-white" style="text-decoration: none;">
                    <div class="card mb-3 widget-content bg-arielle-smile ">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Laporan Obat</div>
                                <div class="widget-subheading">lihat detail <i class="fas fa-arrow-right"></i></div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white">
                                    <span class="pe-7s-folder"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endif


            


        {{-- </div>
        <div class="main-card mb-3 card">
            <div class="card-body">

                <div class="table-responsive">
                    <table id="datatables" class="table table-hover table-striped display nowrap" cellspacing="0"
                        width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th>Nama Pasien</th>
                                <th>Status</th> 
                                <th>Tanggal</th>
                                <th>Poli</th>
                                <th>Dokter</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> --}}


    </div>
@endsection
