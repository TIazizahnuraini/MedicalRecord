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

                <a href="{{ route('antrian.create') }}" class="btn btn-primary mb-2">
                    <i class="fas fa-user-plus"></i> Tambah
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
                                        <th>Poli</th>
                                        <th>Tanggal</th>
                                        <th>Dokter</th>
                                        <th>Status </th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php $no = 1 @endphp
                                    @foreach ($antrians as $antrian)
                                        <tr>
                                            <th class="text-center" scope="row">{{ $no++ }}.</th>
                                            <td>{{ $antrian->pasien->nama_pasien }}</td>
                                            <td>{{ $antrian->poli->nama_poli }}</td>
                                            <td>{{ $antrian->tanggal }}</td>
                                            <td>{{ $antrian->dokter->nama_dokter }}</td>
                                            <td>{{ $antrian->status }}</td>

                                            <td class="text-center">
                                                
                                                <form action="{{ route('antrian.destroy', $antrian->id) }}" method="post">

                                                    <a href="{{ route('antrian.update', $antrian->id) }}"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>

                                                    @csrf
                                                    @method('delete')

                                                    <button type="submit" class="btn btn-danger btn-sm destroy-antrian">
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
