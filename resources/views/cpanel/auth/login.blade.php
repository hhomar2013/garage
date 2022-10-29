@extends('layouts.auth')
<title>MTG | دخول المديرين</title>
@section('content')
    <body class="bg-secondary">
    <div class="container">
        <div class="row justify-content-center p-5">
            <div class="col-md-6">
                <div class="card" style="border-bottom-left-radius: 10%;">
                    <div class="card-header bg-dark text-white text-center"><h3>تسجيل دخول الادارة</h3></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.login') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="user_name" class="col-md-4 col-form-label text-md-end">أسم المستخدم: </label>

                                <div class="col-md-6">
                                    <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required  autofocus>

                                    @error('user_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">كلمة المرور : </label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            تذكرني
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-user-alt"></i> دخـــول
                                    </button>

                                    @if (Route::has('password.request'))
                                        {{--                                        <a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                        {{--                                            {{ __('Forgot Your Password?') }}--}}
                                        {{--                                        </a>--}}
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>

@endsection
