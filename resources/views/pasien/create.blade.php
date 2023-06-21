@extends('layouts.app')

@section('content')
    <div class="app-main__inner">

        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-add-user icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Tambah Pasien
                        <div class="page-title-subheading">
                            Tambah Pasien adalah halaman untuk menginputkan data pasien.
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{-- 
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

        <div class="row">
            <div class="col-md-6 col-xl-12">
                <div class="mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Tambah Pasien</h5>
                        <form action="{{ route('pasien.store') }}" method="post" class="needs-validation">

                            @csrf

                            <div class="form-row">

                                <input type="hidden" name="user_id" value="{{Auth::id()}}">

                                <div class="col-md-6 mb-3">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin"
                                        class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                        id="jenis_kelamin">
                                        <option selected disabled>Pilih jenis kelamin</option>
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
                                    <label for="agama">Agama</label>
                                    <select name="agama" class="form-control @error('agama') is-invalid @enderror"
                                        id="agama">
                                        <option selected disabled>Pilih agama</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Protestan">Protestan</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buddha">Buddha</option>
                                        <option value="Khonghucu">Khonghucu</option>
                                    </select>

                                    @error('agama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" id="alamat"
                                        class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>

                                    @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label for="jenis_registrasi">Jenis Registrasi</label>
                                    <select name="jenis_registrasi"
                                        class="form-control @error('jenis_registrasi') is-invalid @enderror"
                                        id="jenis_registrasi">
                                        <option selected disabled>Pilih jenis registrasi</option>
                                        <option value="Umum">Umum</option>
                                        <option value="BPJS">BPJS</option>
                                    </select>

                                    @error('jenis_registrasi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label for="tgl_registrasi">Tanggal Registrasi</label>
                                    <input type="date" name="tgl_registrasi"
                                        class="form-control @error('tgl_registrasi') is-invalid @enderror"
                                        id="tgl_registrasi" value="{{ old('tgl_registrasi') }}">

                                    @error('tgl_registrasi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="no_bpjs">No BPJS</label>
                                    <input type="number" name="no_bpjs"
                                        class="form-control @error('no_bpjs') is-invalid @enderror" id="no_bpjs"
                                        value="{{ old('no_bpjs') }}">

                                    @error('no_bpjs')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="no_hp">No HP</label>
                                    <input type="number" name="no_hp"
                                        class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                                        value="{{ old('no_hp') }}">

                                    @error('no_hp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                {{-- <div class="col-md-12 mb-3">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <input type="text" name="pekerjaan"
                                        class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan"
                                        value="{{ old('pekerjaan') }}">

                                    @error('pekerjaan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> --}}

                                <div class="col-md-12 mb-3">
                                    <label for="pekerjaan">Jenis Registrasi</label>
                                    <select name="pekerjaan"
                                        class="form-control @error('pekerjaan') is-invalid @enderror"
                                        id="pekerjaan">
                                        <option selected disabled>Pilih jenis pekerjaan</option>
                                            <option value="Belum/Tidak Bekerja">Belum/Tidak Bekerja</option>
                                            <option value="Mengurus Rumah Tangga">Mengurus Rumah Tangga</option>
                                            <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                                            <option value="TNI/POLRI">TNI/POLRI</option>
                                            <option value="Wiraswasta">Wiraswasta</option>
                                            <option value="Pegawai Swasta">Pegawai Swasta</option>
                                            <option value="Lainnya">Lainnya</option>
                                    </select>

                                    @error('pekerjaan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            </div>

                            <button type="submit" class="btn btn-primary mt-2">
                                <i class="fas fa-user-plus"></i> Tambah
                            </button>


                            <a href="{{ route('pasien') }}" class="btn btn-warning mt-2 ml-1">
                                <i class="fas fa-angle-double-left"></i> Kembali
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
