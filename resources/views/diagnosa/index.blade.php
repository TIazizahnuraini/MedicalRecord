@extends('layouts.app')

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-display1 icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Data Diagnosa
                        <div class="page-title-subheading">
                            Data Diagnosa adalah halaman daftar data diagnosa.
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">

                <a href="{{ route('diagnosa.create') }}" class="btn btn-primary mb-2">
                    <i class="fas fa-plus"></i> Tambah
                </a>


                <div class="main-card mb-3 card">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="datatables" class="table table-hover table-striped display nowrap" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th>Diagnosa (Indonesia)</th>
                                        <th>Diagnosa (English)</th>
                                        <th>Keterangan</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php $no = 1 @endphp
                                    @foreach ($diagnosas as $diagnosa)
                                        <tr>
                                            <th class="text-center" scope="row">{{ $no++ }}.</th>
                                            <td>{{ $diagnosa->nama_diagnosa }}</td>
                                            <td><i>{{ $diagnosa->name_diagnosa }}</i></td>
                                            <td>{{ $diagnosa->keterangan }}</td>

                                            <td class="text-center">
                                                <form action="{{ route('diagnosa.destroy', $diagnosa->id) }}" method="post">

                                                    <a href="{{ route('diagnosa.update', $diagnosa->id) }}"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>

                                                    @csrf
                                                    @method('delete')

                                                    <button type="submit" class="btn btn-danger btn-sm destroy-diagnosa">
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
