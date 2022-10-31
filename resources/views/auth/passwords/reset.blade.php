@extends('layouts.login')

@section('content')
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">{{ __('login.You are only one step a way from your new password, recover your password now.') }}</p>

        <form action="{{ route('password.update') }}" method="POST">
            @csrf

            @php
                if (!isset($token)) {
                    $token = \Request::route('token');
                }
            @endphp

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="input-group mb-3">
                <input type="email"
                       name="email"
                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                       placeholder="{{ __('login.Email') }}">
                <div class="input-group-append">
                    <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                </div>
                @if ($errors->has('email'))
                    <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="input-group mb-3">
                <input type="password"
                       name="password"
                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                       placeholder="{{ __('login.Password') }}">
                <div class="input-group-append">
                    <div class="input-group-text"><span class="fas fa-lock"></span></div>
                </div>
                @if ($errors->has('password'))
                    <span class="error invalid-feedback">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="input-group mb-3">
                <input type="password"
                       name="password_confirmation"
                       class="form-control"
                       placeholder="{{ __('login.Confirm Password') }}">
                <div class="input-group-append">
                    <div class="input-group-text"><span class="fas fa-lock"></span></div>
                </div>
                @if ($errors->has('password_confirmation'))
                    <span class="error invalid-feedback">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>

            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-block" style="background-color: #075d82; color: #f3f4f6">{{ __('login.Reset Password') }}</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <div class="row mt-2">
            <div class="col-8">
                <a href="{{ route('login') }}" style="color: #075d82">{{ __('login.Login') }}</a>
            </div>
            <div class="col-4">
                @if(App::getLocale() == 'ar')
                <p>
                    <a lang="en" class="themeFont float-right" href="{{ route('lang.switch', 'en') }}"> EN</a>
                </p>
                @elseif(App::getLocale() == 'en')
                <a lang="ar" class="themeFont float-right" style="color: #075d82;" href="{{ route('lang.switch', 'ar') }}"> العربية</a>
                @endif
            </div>
        </div>
    </div>
    <!-- /.login-card-body -->
</div>
@endsection
