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
                    <div>Laporan Data Dokter
                        <div class="page-title-subheading">
                            Laporan Data Dokter adalah halaman daftar data dokter.
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">

                <a href="{{ route('laporan-dokter.cetak') }}" class="btn btn-info mb-2">
                    <i class="fas fa-print"></i> Print Data Dokter
                </a>


                <div class="main-card mb-3 card">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="datatables" class="table table-hover table-striped display nowrap" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th>Nama Dokter</th>
                                        <th>Spesialis</th>
                                        <th>Jenis Kelamin</th>
                                        <th>No HP</th>
                                        {{-- <th class="text-center">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>

                                    @php $no = 1 @endphp
                                    @foreach ($dokters as $dokter)
                                        <tr>
                                            <th class="text-center" scope="row">{{ $no++ }}.</th>
                                            <td>{{ $dokter->nama_dokter }}</td>
                                            <td>{{ $dokter->spesialis }}</td>
                                            <td>{{ $dokter->jenis_kelamin }}</td>
                                            <td>{{ $dokter->no_hp }}</td>

                                            {{-- <td class="text-center">
                                                <form action="{{ route('dokter.destroy', $dokter->id) }}" method="post">

                                                    <a href="{{ route('dokter.update', $dokter->id) }}"
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
