@extends('layouts.app')

@section('content.guest')
    <div class="app-container app-theme-white body-tabs-shadow closed-sidebar-mobile closed-sidebar">
        <div class="app-container closed-sidebar-mobile closed-sidebar">
            <div class="h-100 bg-deep-blue bg-animation">
                <div class="d-flex h-100 justify-content-center align-items-center">
                    <div class="mx-auto app-login-box col-md-8">

                        <h6 class="text-center text-white mb-3">
                            <img src="{{ asset('images/logo/dark.png') }}" width="200px">
                        </h6>

                        <div class="modal-dialog w-100 mx-auto mt-2">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="h5 modal-title text-center">
                                        <h5 class="mt-1 mb-5">
                                            <div class="text-secondary">
                                                Silahkan buat akun dan login.
                                            </div>
                                        </h5>
                                    </div>


                                    <form action="{{ route('register') }}" method="post" novalidate>

                                        @csrf

                                        <div class="form-row">

                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input id="name" type="text"
                                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                                        placeholder="Nama Lengkap" value="{{ old('name') }}" autocomplete="name"
                                                        autofocus>

                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input id="email" type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" required
                                                        autocomplete="email" placeholder="E-Mail">

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input id="username" type="text"
                                                        class="form-control @error('username') is-invalid @enderror"
                                                        placeholder="Username" name="username"
                                                        value="{{ old('username') }}" autocomplete="username" autofocus>

                                                    @error('username')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input id="password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        placeholder="Password" name="password" required
                                                        autocomplete="new-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input id="password-confirm" type="password" class="form-control"
                                                        placeholder="Konfirmasi Password" name="password_confirmation" required
                                                        autocomplete="new-password">
                                                </div>
                                            </div>


                                        </div>
                                        <div class="divider"></div>
                                        <h6 class="mb-0">
                                            sudah punya akun?
                                            <a href="{{ route('login') }}" class="text-primary">Login</a>
                                        </h6>
                                </div>
                                <div class="modal-footer clearfix">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-info btn-lg">Buat Akun</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
