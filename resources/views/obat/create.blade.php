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
                    <div>Tambah Obat
                        <div class="page-title-subheading">
                            Tambah Obat adalah halaman untuk menginputkan data obat.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-xl-12">
                <div class="mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Tambah Obat</h5>
                        <form action="{{ route('obat.store') }}" method="post" class="needs-validation">

                            @csrf

                            <div class="form-row">

                                <div class="col-md-12 mb-3">
                                    <label for="nama_obat">Nama Obat</label>
                                    <input type="text" name="nama_obat"
                                        class="form-control @error('nama_obat') is-invalid @enderror" id="nama_obat"
                                        value="{{ old('nama_obat') }}">

                                    @error('nama_obat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" name="jumlah"
                                        class="form-control @error('jumlah') is-invalid @enderror" id="jumlah"
                                        value="{{ old('jumlah') }}">

                                    @error('jumlah')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="satuan">Satuan</label>
                                    <select name="satuan" class="form-control @error('satuan') is-invalid @enderror"
                                        id="satuan">
                                        <option selected disabled>Pilih satuan</option>
                                        <option value="Tablet">Tablet</option>
                                        <option value="Botol">Botol</option>
                                        <option value="Kapsul">Kapsul</option>
                                        <option value="Pil">Pil</option>
                                    </select>

                                    @error('satuan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="dosis">Dosis</label>
                                    <input type="text" name="dosis"
                                        class="form-control @error('dosis') is-invalid @enderror" id="dosis"
                                        value="{{ old('dosis') }}">

                                    @error('dosis')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="expired">Expired</label>
                                    <input type="date" name="expired"
                                        class="form-control @error('expired') is-invalid @enderror" id="expired"
                                        value="{{ old('expired') ?? $obat->expired }}">

                                    @error('expired')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary mt-2">
                                <i class="fas fa-plus"></i> Tambah
                            </button>


                            <a href="{{ route('obat') }}" class="btn btn-warning mt-2 ml-1">
                                <i class="fas fa-angle-double-left"></i> Kembali
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
