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
                    <div>Tambah Kunjungan Rekam Medis
                        <div class="page-title-subheading">
                            Tambah Kunjungan adalah halaman untuk menginputkan data kunjungan.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-xl-12">
                <div class="mb-3 card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-3 text-center">
                                <div id="tombol1" class="mb-3 card text-white card-body bg-primary">
                                    <i class="fas fa-user icon-md mb-2"></i>
                                    <h5 class="text-white card-title">INFORMASI PASIEN</h5>
                                </div>
                            </div>
                            <div class="col-md-3 text-center"onclick="$('#input1').addClass('d-none');$('#input2').removeClass('d-none');$('#tombol1').removeClass('text-white bg-primary');">
                                <div class="mb-3 card card-body">
                                    <i class="fas fa-user icon-md mb-2"></i>
                                    <h5 class="card-title">PEMERIKSAAN FISIK</h5>
                                </div>
                            </div>
                            <div class="col-md-3 text-center" onclick="$('#myId').removeClass('d-none');">
                                <div class="mb-3 card card-body">
                                    <i class="fas fa-user icon-md mb-2"></i>
                                    <h5 class="card-title">STATUS PEMERIKSAAN</h5>
                                </div>
                            </div>
                            {{-- <div class="col-md-3 text-center">
                                <div class="mb-3 card card-body">
                                    <i class="fas fa-user icon-md mb-2"></i>
                                    <h5 class="card-title">STATUS PEMERIKSAAN</h5>
                                </div>
                            </div> --}}
                        </div>


                        <form action="{{ route('periksa.step1') }}" method="post" class="needs-validation mt-4"
                            id="bash_path">

                            @csrf


                            <div class="form-row" id="input1">
                                <div class="col-md-12 mb-3">
                                    <label for="nama_pasien">Nama Pasien</label>
                                    <input type="text" name="nama_pasien"
                                        class="form-control @error('nama_pasien') is-invalid @enderror" id="nama_pasien"
                                        value="{{ old('nama_pasien') }}">

                                    @error('nama_pasien')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <input type="hidden" name="pasien_id" id="pasien_id" value="{{ old('pasien_id') }}">

                                <div class="col-md-6 mb-3">
                                    <label for="jenis_registrasi">Jenis Registrasi</label>
                                    <input type="text" name="jenis_registrasi"
                                        class="form-control @error('jenis_registrasi') is-invalid @enderror"
                                        id="jenis_registrasi" value="{{ old('jenis_registrasi') }}" readonly>

                                    @error('jenis_registrasi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="no_bpjs">No BPJS</label>
                                    <input type="text" name="no_bpjs"
                                        class="form-control @error('no_bpjs') is-invalid @enderror" id="no_bpjs"
                                        value="{{ old('no_bpjs') }}" readonly>

                                    @error('no_bpjs')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="tgl_kunjungan">Tanggal Kunjungan</label>
                                    <input type="date" name="tgl_kunjungan"
                                        class="form-control @error('tgl_kunjungan') is-invalid @enderror" id="tgl_kunjungan"
                                        value="{{ old('tgl_kunjungan') }}">

                                    @error('tgl_kunjungan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="poli">Poli Tujuan</label>

                                    <select name="poli" id="poli"
                                        class="form-control @error('poli') is-invalid @enderror">
                                        @foreach ($polis as $poli)
                                            <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                                        @endforeach
                                    </select>

                                    @error('poli')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="jenis_kunjungan">Jenis Kunjungan</label>

                                    <select name="jenis_kunjungan" id="jenis_kunjungan"
                                        class="form-control @error('jenis_kunjungan') is-invalid @enderror">
                                        <option value="Kunjungan sakit">Kunjungan sakit</option>
                                        <option value="Kunjungan sehat">Kunjungan sehat</option>
                                    </select>

                                    @error('jenis_kunjungan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="tindak_lanjut">Tindak Lanjut</label>

                                    <select name="tindak_lanjut" id="tindak_lanjut"
                                        class="form-control @error('tindak_lanjut') is-invalid @enderror">
                                        <option value="Pulang sehat">Pulang sehat</option>
                                        <option value="Rawat jalan">Rawat jalan</option>
                                        <option value="Pemeriksaan berkala">Pemeriksaan berkala</option>
                                        <option value="Rujukan">Rujukan</option>
                                    </select>

                                    @error('tindak_lanjut')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="keluhan">Keluhan</label>
                                    <textarea name="keluhan" id="keluhan" class="form-control @error('keluhan') is-invalid @enderror" id="keluhan">{{ old('keluhan') }}</textarea>

                                    @error('keluhan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="terapi">Terapi</label>
                                    <input type="text" name="terapi"
                                        class="form-control @error('terapi') is-invalid @enderror" id="terapi"
                                        value="{{ old('terapi') }}">

                                    @error('terapi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="nama_dokter">Dokter</label>
                                    <input type="text" name="nama_dokter"
                                        class="form-control @error('nama_dokter') is-invalid @enderror" id="nama_dokter"
                                        value="{{ old('nama_dokter') }}">

                                    @error('nama_dokter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <input type="hidden" name="dokter_id" id="dokter_id" value="{{ old('dokter_id') }}">

                                <div class="col-md-12 mb-3">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror"
                                        id="keterangan">{{ old('keterangan') }}</textarea>

                                    @error('keterangan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-row d-none" id="input2">
                                <div class="col-md-12 mb-3">
                                    <label for="nama_dokter">Form Coba 1</label>
                                    <input type="text" name="nama_dokter"
                                        class="form-control @error('nama_dokter') is-invalid @enderror" id="nama_dokter"
                                        value="{{ old('nama_dokter') }}">

                                    @error('nama_dokter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="nama_dokter">Form Coba 2</label>
                                    <input type="text" name="nama_dokter"
                                        class="form-control @error('nama_dokter') is-invalid @enderror" id="nama_dokter"
                                        value="{{ old('nama_dokter') }}">

                                    @error('nama_dokter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary mt-3">
                                    Selanjutnya <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
