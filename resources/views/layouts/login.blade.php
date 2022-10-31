<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.APP_NAME') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Kufi+Arabic&subset=arabic">

    <!-- Favicon -->
    <link rel="icon" href="/images/fav_icon.png">

    <link 
        rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous"
    />

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/css/adminlte.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <img src="/images/logo.png" class="mb-4" alt="logo" width="300">
    </div>
    <!-- /.login-logo -->

    @yield('content')
</div>

<script src="{{ asset('/js/bootstrap.js') }}"></script>
<script src="{{ asset('/js/adminlte.js') }}"></script>
</body>
</html>
