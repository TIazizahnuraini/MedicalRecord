@extends('layouts.app')

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-display2 icon-gradient bg-mean-fruit">
                        </i>
                    </div> 
                    <div>Edit Kunjungan
                        <div class="page-title-subheading">
                            Edit kunjungan adalah halaman untuk mengedit data kunjungan pasien.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-xl-12">
                <div class="mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Edit Data Kunjungan</h5>
                        <form action="{{ route('kunjungan.edit', $kunjungan->id) }}" method="post" class="needs-validation">
                           
                            @csrf
                            @method('patch')

                            <div class="form-row">


                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
    