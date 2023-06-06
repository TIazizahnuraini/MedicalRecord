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
                        

                        <form action="{{ route('kunjungan.step3') }}" method="post" class="needs-validation mt-4"
                        id="bash_path">

                            @csrf
                            @method('put')
                            <div class="form-row">

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

                                <input type="hidden" name="diagnosa_id" id="diagnosa_id" value="{{ old('diagnosa_id') }}">

                                <div class="col-md-12 mb-3">
                                    <label for="resep">Resep Obat</label>
                                    <textarea name="resep" id="resep" class="form-control @error('resep') is-invalid @enderror"
                                        id="resep">{{ old('resep') }}</textarea>

                                    @error('resep')
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

                                <div class="col-md-12 mb-3">
                                    <label for="biaya">Biaya Administrasi</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="biaya">RP</span>
                                        </div>

                                        <input type="number" name="biaya" class="form-control  @error('biaya') is-invalid @enderror" id="biaya"
                                            aria-describedby="biaya" value="{{ old('biaya') }}">

                                        @error('biaya')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
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

{{-- @section('js')
    <script>
        var valJml = document.getElementById('jmlObat');
        valJml.value = 1;

        function tambahObat(){
            var btnTmbh = document.getElementById('btnTmbh');
            let addObat =   '<div id="divResep'+valJml.value+'" class="col-md-12 mb-3">'+
                            '<label for="namaObat'+valJml.value+'">Resep Obat</label>'+
                            '<input type="text" name="namaObat'+valJml.value+'" class="form-control @error("kesadaran") is-invalid @enderror" id="namaObat'+valJml.value+'" value="{{ old("kesadaran") }}">'+
                            '@error("kesadaran")'+
                                '<span class="invalid-feedback" role="alert">'+
                                    '<strong>{{ $message }}</strong>'+
                                '</span>'+
                            '@enderror'+      
                        '</div>';
            let btnHps =    '<a id="btnHps" href="javascript:void(0)" class="btn btn-danger mb-2" onclick="hapusObat()" style="margin-left: 10px">'+
                                '<i class="fas fa-trash"></i> Hapus Obat'+
                            '</a>'
            
            btnTmbh.insertAdjacentHTML("beforebegin", addObat);
            btnTmbh.insertAdjacentHTML("afterend", btnHps);
            valJml.value = Number(valJml.value) + 1;
        }

        function hapusObat(){
            // alert(Number(valJml.value) - 1);
            if(Number(valJml.value) > 1){

                var divResep = document.getElementById('divResep'+(Number(valJml.value) - 1));
                divResep.remove();
                valJml.value = Number(valJml.value) - 1; 

                if(Number(valJml.value) == 1){
                    document.getElementById('btnHps').remove();
                }
            }
            
        }
    </script>
@endsection
 --}}
