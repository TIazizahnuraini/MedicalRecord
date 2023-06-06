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
                    <div>Edit Antrian
                        <div class="page-title-subheading">
                            Edit Antrian adalah halaman untuk mengedit data antrian.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-xl-12">
                <div class="mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Edit Antrian</h5>
                        
                        <form action="{{ route('antrian.edit', $antrian->id) }}" method="post" class="needs-validation">
                        
                        {{-- <form action="{{ route('antrian.edit', $antrian->id) }}" method="post" class="needs-validation mt-4"
                        id="bash_path"> --}}

                            @csrf
                            @method('patch')

                            <div class="form-row">

                                <div class="col-md-6 mb-3">
                                    <label for="nama_pasien">Nama Pasien</label>
                                    <input type="text" name="nama_pasien"
                                        class="form-control @error('nama_pasien') is-invalid @enderror" id="nama_pasien"
                                        value="{{ old('nama_pasien') ?? $antrian->pasien->nama_pasien}}">

                                    @error('nama_pasien')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <input type="hidden" name="pasien_id" id="pasien_id" value="{{ old('pasien_id') }}">

                                <div class="col-md-6 mb-3">
                                    <label for="nama_dokter">Dokter</label>
                                    <input type="text" name="nama_dokter"
                                        class="form-control @error('nama_dokter') is-invalid @enderror" id="nama_dokter"
                                        value="{{ old('nama_dokter') ?? $antrian->dokter->nama_dokter}}">

                                    @error('nama_dokter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <input type="hidden" name="dokter_id" id="dokter_id" value="{{ old('dokter_id') }}">
                                
                                <div class="col-md-6 mb-3">
                                    <label for="poli">Poli Tujuan</label>

                                    <select name="poli" id="poli"
                                        class="form-control @error('poli') is-invalid @enderror">
                                        @foreach ($polis as $poli)
                                            <option value="{{ $poli->nama_poli }}">{{ $poli->nama_poli }}</option>
                                        @endforeach
                                    </select>

                                    @error('poli')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="tanggal">Tanggal Kunjungan</label>
                                    <input type="date" name="tanggal"
                                        class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                        value="{{ old('tanggal') ?? $antrian->tanggal}}">

                                    @error('tanggal')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="status">Status Kunjungan</label>
                                
                                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                        <option value="Belum dilayani">Belum dilayani</option>
                                        <option value="Sudah dilayani">Sudah dilayani</option>
                                    </select>
                                
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary mt-2">
                                <i class="fas fa-edit"></i> Edit
                            </button>

                            <a href="{{ route('antrian') }}" class="btn btn-warning mt-2 ml-1">
                                <i class="fas fa-angle-double-left"></i> Kembali
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
