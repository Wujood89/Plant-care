@extends('layouts.login')

@section('content')
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">{{ __('login.You forgot your password? Here you can easily retrieve a new password.') }}</p>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('password.email') }}" method="post">
            @csrf

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

            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-block" style="background-color: #075d82; color: #f3f4f6">{{ __('login.Send Password Reset Link') }}</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <p class="mt-3 mb-1">
            <a href="{{ route("login") }}" style="color: #075d82">{{ __('login.Login') }}</a>
        </p>
        <div class="row">
            <div class="col-8">
                <p class="mb-0">
                    <a href="{{ route('register') }}" class="text-center" style="color: #075d82;">{{ __('login.Register a new membership') }}</a>
                </p>
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
