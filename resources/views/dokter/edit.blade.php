@extends('layouts.app')

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-repeat icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Edit Dokter
                        <div class="page-title-subheading">
                            Edit Dokter adalah halaman untuk mengedit data dokter.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-xl-12">
                <div class="mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Edit Dokter</h5>
                        <form action="{{ route('dokter.edit', $dokter->id) }}" method="post" class="needs-validation">

                            @csrf
                            @method('patch')

                            <div class="form-row">

                                <div class="col-md-6 mb-3">
                                    <label for="nama_dokter">Nama Dokter</label>
                                    <input type="text" name="nama_dokter"
                                        class="form-control @error('nama_dokter') is-invalid @enderror" id="nama_dokter"
                                        value="{{ old('nama_dokter') ?? $dokter->nama_dokter }}">

                                    @error('nama_dokter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="sip">SIP Dokter</label>
                                    <input type="text" name="sip"
                                        class="form-control @error('sip') is-invalid @enderror" id="sip"
                                        value="{{ old('sip') ?? $dokter->sip}}">

                                    @error('sip')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin"
                                        class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                        id="jenis_kelamin">

                                        <option selected disabled>Pilih Jenis Kelamin</option>
                                        <option selected value="{{ $dokter->jenis_kelamin }}">
                                            {{ $dokter->jenis_kelamin }}</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>

                                    @error('jenis_kelamin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="spesialis">Spesialis</label>
                                    <select name="spesialis" class="form-control @error('spesialis') is-invalid @enderror"
                                        id="spesialis">

                                        <option selected disabled>Pilih Spesialis</option>

                                        @foreach ($polis as $poli)
                                            <option {{ $poli->nama_poli == $dokter->spesialis ? 'selected' : '' }}
                                                value="{{ $poli->nama_poli }}">{{ $poli->nama_poli }}</option>
                                        @endforeach


                                    </select>

                                    @error('spesialis')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir"
                                        class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir"
                                        value="{{ old('tempat_lahir') ?? $dokter->tempat_lahir }}">

                                    @error('tempat_lahir')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="date" name="tgl_lahir"
                                        class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir"
                                        value="{{ old('tgl_lahir') ?? $dokter->tgl_lahir }}">

                                    @error('tgl_lahir')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                                        id="alamat">{{ old('alamat') ?? $dokter->alamat }}</textarea>

                                    @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="nik">Nik</label>
                                    <input type="number" name="nik" class="form-control @error('nik') is-invalid @enderror"
                                        id="nik" value="{{ old('nik') ?? $dokter->nik }}">

                                    @error('nik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="no_hp">No HP</label>
                                    <input type="number" name="no_hp"
                                        class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                                        value="{{ old('no_hp') ?? $dokter->no_hp }}">

                                    @error('no_hp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary mt-2">
                                <i class="fas fa-user-edit"></i> Edit
                            </button>


                            <a href="{{ route('dokter') }}" class="btn btn-warning mt-2 ml-1">
                                <i class="fas fa-angle-double-left"></i> Kembali
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
