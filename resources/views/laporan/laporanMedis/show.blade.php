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
                    <div>Data Rekam Medis {{ $user->name }}
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
                                        <th>Poli</th>
                                        <th>Dokter</th>
                                        <th>Jenis Kunjungan</th>
                                        <th>Tanggal Kunjungan</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php $no = 1 @endphp
                                    @foreach ($kunjungans as $kunjungan)
                                        <tr>
                                            <th class="text-center" scope="row">{{ $no++ }}.</th>
                                            <td>{{ $kunjungan->poli->nama_poli }}</td>
                                            <td>{{ $kunjungan->dokter->nama_dokter }}</td>
                                            <td>{{ $kunjungan->jenis_kunjungan }}</td>
                                            <td>{{ $kunjungan->tgl_kunjungan }}</td>
                                            <td>
                                                <a href="{{ route('laporan-medis.cetak', $kunjungan->id) }}"
                                                    class="btn btn-info"><i class="fas fa-print"> Cetak RM</i></a>
                                            </td>

                                            {{-- <td class="text-center">
                                                <form action="{{ route('dokter.destroy', $kunjungan->user->id) }}" method="post">

                                                    <a href="{{ route('dokter.update', $kunjungan->user->id) }}"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>

                                                    @csrf
                                                    @method('delete')

                                                    <button type="submit" class="btn btn-danger btn-sm destroy-dokter">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </form>

                                            </td> --}}
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
