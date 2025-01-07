@extends('layouts.auth')
@section('title', 'Register')
@push('css')
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
@endpush
@section('body')
    <div class="register-box">
        <div class="register-logo">
            <b>E</b> Ticaret
        </div>
        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Yeni Kayıt Oluştur</p>
                <form id="formRegister" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Ad Soyad"
                            value="{{ old('name') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                            placeholder="E-Posta Adresi">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Parola Giriniz">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                            placeholder="Parola Tekrarı">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password_confirmation')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Beni Hatırla --}}
                    <div class="row mb-2">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Beni Hatırla
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    @if ($errors->any())
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-danger">
                                    <ul class="m-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                    @endif
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <a href="javascript:void(0)" id="btnRegister" class="btn btn-primary btn-block">Kayıt Ol</a>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="social-auth-links text-center">
                        <p>- veya -</p>
                        <a href="javascript:void(0)" id="googleRegister" class="btn btn-block btn-danger">
                            <i class="fab fa-google-plus mr-2"></i>
                            Google+ Kayıt Ol
                        </a>
                    </div>
                </form>
                <a href="{{ route('login') }}" class="text-center">Zaten kayıtlı mısınız?</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.login-box -->
@endsection
@push('js')
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/auth/register.js') }}"></script>
@endpush
