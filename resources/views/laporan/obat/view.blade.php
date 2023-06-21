@extends('layouts.app')

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-server icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Laporan Data Obat
                        <div class="page-title-subheading">
                            Laporan Data Obat adalah halaman laporan daftar data obat.
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">

                <a href="{{ route('laporan-obat.cetak') }}" class="btn btn-info mb-2">
                    <i class="fas fa-print"></i> Print Data Obat
                </a>


                <div class="main-card mb-3 card">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="datatables" class="table table-hover table-striped display nowrap" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th>Nama Obat</th>
                                        <th>Jumlah</th>
                                        <th>Satuan</th>
                                        <th>Kandungan Obat</th>
                                        <th>Expired</th>
                                        {{-- <th class="text-center">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>

                                    @php $no = 1 @endphp
                                    @foreach ($obats as $obat)
                                        <tr>
                                            <th class="text-center" scope="row">{{ $no++ }}.</th>
                                            <td>{{ $obat->nama_obat }}</td>
                                            <td>{{ $obat->jumlah }}</td>
                                            <td>{{ $obat->satuan }}</td>
                                            <td>{{ $obat->dosis }}</td>
                                            <td>{{ $obat->expired }}</td>

                                            {{-- <td class="text-center">
                                                <form action="{{ route('obat.destroy', $obat->id) }}" method="post"> --}}

                                                    {{-- <a href="{{ route('obat.detail', $obat->id) }}"
                                                        class="btn btn-info btn-sm">
                                                        <i class="fas fa-eye"></i> Lihat
                                                    </a> --}}
                                                    
                                                    {{-- <a href="{{ route('obat.update', $obat->id) }}"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>

                                                    @csrf
                                                    @method('delete')

                                                    <button type="submit" class="btn btn-danger btn-sm destroy-obat">
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
