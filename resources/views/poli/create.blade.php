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
                    <div>Tambah Poli
                        <div class="page-title-subheading">
                            Tambah Poli adalah halaman untuk menginputkan data poli.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-xl-12">
                <div class="mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Tambah Poli</h5>
                        <form action="{{ route('poli.store') }}" method="post" class="needs-validation">

                            @csrf

                            <div class="form-row">

                                <div class="col-md-12 mb-3">
                                    <label for="nama_poli">Nama Poli</label>
                                    <input type="text" name="nama_poli"
                                        class="form-control @error('nama_poli') is-invalid @enderror" id="nama_poli"
                                        value="{{ old('nama_poli') }}">

                                    @error('nama_poli')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="jadwal_mulai">Buka</label>
                                    <input type="text" name="jadwal_mulai"
                                        class="form-control @error('jadwal_mulai') is-invalid @enderror" id="jadwal_mulai"
                                        value="{{ old('jadwal_mulai') }}">

                                    @error('jadwal_mulai')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="jadwal_selesai">Tutup</label>
                                    <input type="text" name="jadwal_selesai"
                                        class="form-control @error('jadwal_selesai') is-invalid @enderror" id="jadwal_selesai"
                                        value="{{ old('jadwal_selesai') }}">

                                    @error('jadwal_selesai')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                            </div>

                            <button type="submit" class="btn btn-primary mt-2">
                                <i class="fas fa-plus"></i> Tambah
                            </button>


                            <a href="{{ route('poli') }}" class="btn btn-warning mt-2 ml-1">
                                <i class="fas fa-angle-double-left"></i> Kembali
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
