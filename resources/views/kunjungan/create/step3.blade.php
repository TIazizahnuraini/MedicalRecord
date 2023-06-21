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
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-md-6 col-xl-12">
                <div class="mb-3 card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-3 text-center">
                                <div class="mb-3 card text-white card-body bg-primary">
                                    <i class="fas fa-user icon-md mb-2"></i>
                                    <h5 class="text-white card-title">INFORMASI PASIEN</h5>
                                </div>
                            </div>
                            <div class="col-md-3 text-center">
                                <div class="mb-3 card text-white card-body bg-primary">
                                    <i class="fas fa-user icon-md mb-2"></i>
                                    <h5 class="text-white card-title">PEMERIKSAAN FISIK</h5>
                                </div>
                            </div>
                            <div class="col-md-3 text-center">
                                <div class="mb-3 card text-white card-body bg-primary">
                                    <i class="fas fa-user icon-md mb-2"></i>
                                    <h5 class="text-white card-title">STATUS PEMERIKSAAN</h5>
                                </div>
                            </div>
                            {{-- <div class="col-md-3 text-center">
                                <div class="mb-3 card card-body">
                                    <i class="fas fa-user icon-md mb-2"></i>
                                    <h5 class="card-title">STATUS PEMERIKSAAN</h5>
                                </div>
                            </div> --}}
                        </div>





                        <div class="form-row">

                            <div class="col-md-6 mb-3">


                                <div class="col-md-12 mb-3">
                                    <label for="resep" class="mt-4"> Resep Obat</label>
                                    <table class="table table-bordered " id="table">
                                        <tr>
                                            <th>Nama Obat</th>
                                            <th>Jumlah</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr>
                                            <form action="{{ route('kunjungan.tambahObat') }}" method="post">
                                                @csrf
                                                <td>
                                                    <select name="obat" id="obat"
                                                        class="form-control @error('obat') is-invalid @enderror">
                                                        <option>---Pilih Obat---</option>

                                                        @foreach ($obats as $obat)
                                                            <option value="{{ $obat->id }}">{{ $obat->nama_obat }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td> <input type="number" name="jumlah_obat" placeholder="Jumlah obat"
                                                        class="form-control"></td>
                                                <td> <button type="submit" class="btn btn-success ">Tambah obat</button>
                                                </td>
                                            </form>
                                        </tr>
                                        @if ($obatPasiens)
                                            {{-- {{dd($kunjungans)}} --}}
                                            @foreach ($obatPasiens as $obatPasien)
                                                <tr>
                                                    <td>{{ $obatPasien->obat->nama_obat }}</td>
                                                    <td>{{ $obatPasien->jumlah }}</td>
                                                    <td>
                                                        <form action="{{ route('kunjungan.hapusObat', $obatPasien->id) }}"
                                                            method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">Hapus
                                                                obat</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="3">
                                                    <h3>Tidak Ada Data</h3>
                                                </td>
                                            </tr>
                                        @endif

                                        {{-- <tr>
                                                <td>
                                                    <input type="text" name="nama_obat[0]" id="nama_obat"
                                                        class="form-control">
                                                </td>
                                                <td>
                                                    <input type="number" name="jumlah_obat" id=""
                                                        class="form-control">
                                                </td>
                                                <td>
                                                    <button type="button" name="add" id="add"
                                                        class="btn btn-success">Tambah obat</button>
                                                </td>
                                            </tr> --}}
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6 mb3">
                                <form action="{{ route('kunjungan.step3') }}" method="post" class="needs-validation mt-4"
                                    id="bash_path">
                                    @csrf
                                    @method('put')
                                    <div class="col-md-12 mb-3">
                                        <label for="diagnosa">Diagnosa</label>

                                        <select name="diagnosa" id="diagnosa"
                                            class="form-control @error('diagnosa') is-invalid @enderror">
                                            <option>---Pilih Diagnosa---</option>

                                            @foreach ($diagnosa as $diag)
                                                <option value="{{ $diag->id }}">{{ $diag->nama_diagnosa }}</option>
                                            @endforeach
                                        </select>

                                        @error('diagnosa')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <input type="hidden" name="diagnosa_id" id="diagnosa_id"
                                        value="{{ old('diagnosa_id') }}">

                                    {{-- <div class="col-md-12 mb-3">
                                        <label for="resep">Resep Obat</label>
                                        <textarea name="resep" id="resep" class="form-control @error('resep') is-invalid @enderror"
                                            id="resep">{{ old('resep') }}</textarea>
    
                                        @error('resep')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> --}}


                                    <div class="col-md-12 mb-3">
                                        <label for="status">Status Kunjungan</label>

                                        <select name="status" id="status"
                                            class="form-control @error('status') is-invalid @enderror">
                                            <option value="Belum dilayani">Belum dilayani</option>
                                            <option value="Sudah dilayani">Sudah dilayani</option>
                                        </select>

                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="biaya">Biaya Administrasi</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="biaya">RP</span>
                                            </div>

                                            <input type="number" name="biaya"
                                                class="form-control  @error('biaya') is-invalid @enderror" id="biaya"
                                                aria-describedby="biaya" value="{{ old('biaya') }}">

                                            @error('biaya')
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
                            {{-- <div class="col-md-6 mb-3">
                                    <label for="tekanan_darah">Tekanan Darah</label>

                                    <div class="input-group">
                                        <input type="number" name="tekanan_darah" class="form-control  @error('tekanan_darah') is-invalid @enderror"
                                            id="tekanan_darah" aria-describedby="tekanan_darah" value="{{ old('tekanan_darah') }}" placeholder="120/80">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="tekanan_darah">mmHg</span>
                                        </div>

                                        @error('tekanan_darah')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> --}}
                            {{-- <input type="number" name="jmlObat" id="jmlObat" value="1">

                                <div id="divResep0" class="col-md-12 mb-3">
                                    <label for="namaObat0">Resep Obat</label>
                                    <input type="text" name="namaObat0" class="form-control @error('kesadaran') is-invalid @enderror" id="namaObat0" value="{{ old('kesadaran') }}">

                                    @error('kesadaran')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror      
                                </div>

                                <input type="hidden" name="obat_id" id="obat_id" value="{{ old('obat_id') }}">

                                <a id="btnTmbh" href="javascript:void(0)" class="btn btn-primary mb-2" onclick="tambahObat()">
                                    <i class="fas fa-plus"></i> Tambah Obat
                                </a> --}}


                        </div>



                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
