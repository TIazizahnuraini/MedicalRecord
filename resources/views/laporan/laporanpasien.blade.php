@extends('layouts.app')

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-user icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Laporan Data Pasien
                        <div class="page-title-subheading">
                            Laporan Data Pasien adalah halaman laporan data pasien.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">

                {{-- <a href="{{ route('pasien.cetakpasien') }}" class="btn btn-primary mb-2">
                    <i class="fas fa-plus"></i> Export Data
                </a> --}}

                {{-- <a href="/cetak" class="btn btn-primary">Export Data</a>
                <table class="table"> --}}

                <a href="{{route('')}}"></a>

                <div class="main-card mb-3 card">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="datatables" class="table table-hover table-striped display nowrap" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th>Nama Pasien</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Registrasi</th>
                                        <th>No Hp</th>
                                        <th>Tgl Registrasi</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
 
                                    @php $no = 1 @endphp
                                    @foreach ($pasiens as $pasien)
                                        <tr>
                                            <th class="text-center" scope="row">{{ $no++ }}.</th>
                                            <td>{{ $pasien->user->name }}</td>
                                            <td>{{ $pasien->jenis_kelamin }}</td>
                                            <td>{{ $pasien->jenis_registrasi }}</td>
                                            <td>{{ $pasien->no_hp }}</td>
                                            <td>{{ date('d F Y', strtotime($pasien->tgl_registrasi)) }}</td>

                                            <td class="text-center">
                                                <form action="{{ route('pasien.destroy', $pasien->id) }}" method="post">

                                                    <a href="{{ route('pasien.update', $pasien->id) }}"
                                                        class="btn btn-info btn-sm">
                                                        <i class="fas fa-print"></i> Print
                                                    </a>
                                                    
                                                    {{-- <a href="{{ route('pasien.update', $pasien->id) }}"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a> --}}

                                                    @csrf
                                                    @method('delete')

                                                    <button type="submit" class="btn btn-danger btn-sm destroy-pasien">
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
