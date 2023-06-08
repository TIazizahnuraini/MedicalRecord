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
                    <div>Data Periksa
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
                                        <th>Nama Poli</th>
                                        <th>Buka</th>
                                        <th>Tutup</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php $no = 1 @endphp
                                    @foreach ($polis as $poli)
                                        <tr>
                                            <th class="text-center" scope="row">{{ $no++ }}.</th>
                                            <td>{{ $poli->nama_poli }}</td>
                                            <td>{{ $poli->jadwal_mulai }}</td>
                                            <td>{{ $poli->jadwal_selesai }}</td>

                                            <td class="text-center">
                                                <form action="{{ route('poli.destroy', $poli->id) }}" method="post">

                                                     <a href="{{ route('periksa.pasien', [$poli->nama_poli, $antrian[$poli->nama_poli]]) }}" class="btn btn-primary mb-2">
                                                        <i class="fas fa-plus"></i> 
                                                     </a>

                                                    {{-- <a href="{{ route('poli.update', $poli->id) }}"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>

                                                    @csrf
                                                    @method('delete')

                                                    <button type="submit" class="btn btn-danger btn-sm destroy-poli">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button> --}}
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
