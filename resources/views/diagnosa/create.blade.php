@extends('layouts.app')

@section('content')

    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-plus icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Tambah Diagnosa
                        <div class="page-title-subheading">
                            Tambah Diagnosa adalah halaman untuk menginputkan data diagnosa.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-xl-12">
                <div class="mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Tambah Diagnosa</h5>
                        <form action="{{ route('diagnosa.store') }}" method="post" class="needs-validation">

                            @csrf

                            <div class="form-row">

                                <div class="col-md-12 mb-3">
                                    <label for="nama_diagnosa">Nama diagnosa</label>
                                    <input type="text" name="nama_diagnosa"
                                        class="form-control @error('nama_diagnosa') is-invalid @enderror" id="nama_diagnosa"
                                        value="{{ old('nama_diagnosa') }}">

                                    @error('nama_diagnosa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="name_diagnosa">Name diagnosa</label>
                                    <input type="text" name="name_diagnosa"
                                        class="form-control @error('name_diagnosa') is-invalid @enderror" id="name_diagnosa"
                                        value="{{ old('name_diagnosa') }}">

                                    @error('name_diagnosa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" id="keterangan" class="form-control">{{ old('keterangan') }}</textarea>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary mt-2">
                                <i class="fas fa-plus"></i> Tambah
                            </button>


                            <a href="{{ route('diagnosa') }}" class="btn btn-warning mt-2 ml-1">
                                <i class="fas fa-angle-double-left"></i> Kembali
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
