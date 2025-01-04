@extends('layouts.auth')
@section('title', 'Login')
@push('css')
@endpush
@section('body')
    <div class="login-box">
        <div class="login-logo">
            <b>E</b> Ticaret
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <form action="{{ route('login') }}" method="POST">
                    <div class="input-group mb-3">
                        <input type="email" name="email" id="email" class="form-control" placeholder="E-Posta Adresi">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Parola">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">
                                    Beni Hatırla
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button id="btnLogin" type="submit" class="btn btn-primary btn-block">Giriş Yap</button>
                        </div>
                        <!-- /.col -->
                        <div class="col-12">
                            <div class="social-auth-links text-center">
                                <p>- veya -</p>
                                <a href="javascript:void(0)" id="googleLogin" class="btn btn-block btn-danger">
                                    <i class="fab fa-google-plus mr-2"></i>
                                    Google+ Giriş Yap
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /.social-auth-links -->
                <p class="mb-1">
                    <a href="javascript:void(0)">Şifremi Unuttum</a>
                </p>
                <p class="mb-0">
                    <a href="{{ route('register') }}" class="text-center">Henüz kayıt olmadınız mı?</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@endsection
@push('js')
@endpush
