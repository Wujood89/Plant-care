<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.APP_NAME') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Kufi+Arabic&subset=arabic">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous">

    <!-- Favicon -->
    <link rel="icon" href="/images/fav_icon.png">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js" integrity="sha512-k6/Bkb8Fxf/c1Tkyl39yJwcOZ1P4cRrJu77p83zJjN2Z55prbFHxPs9vN7q3l3+tSMGPDdoH51AEU8Vgo1cgAA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-css/1.4.6/select2-bootstrap.min.css" integrity="sha512-3//o69LmXw00/DZikLz19AetZYntf4thXiGYJP6L49nziMIhp6DVrwhkaQ9ppMSy8NWXfocBwI3E8ixzHcpRzw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/css/adminlte.css') }}">

    @yield('third_party_stylesheets')

    @stack('page_css')
</head>

<body class="hold-transition sidebar-collapse sidebar-mini layout-fixed" dir="{{(App::isLocale('ar') ? 'rtl' : 'ltr')}}">
<div class="wrapper">
    <!-- Main Header -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <ul class="navbar-nav">
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="/images/profile_avatar.png"
                         class="user-image img-circle elevation-2" alt="User Image">
                    <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- User image -->
                    <li class="user-header bg-primary">
                        <img src="/images/profile_avatar.png"
                             class="img-circle elevation-2"
                             alt="User Image">
                        <p>
                            {{ Auth::user()->name }}
                            <small>{{ Auth::user()->email }}</small>
                            {{-- <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small> --}}
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <a href="" class="btn btn-default btn-flat">profile</a>
                        <form 
                            method="POST" 
                            action="{{ route('logout') }}" 
                            {{-- class="d-none" --}}
                            class="btn btn-default btn-flat float-right"
                        >
                            @csrf

                            <a 
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();this.closest('form').submit();"
                                style="color: gray;"
                            >
                            sign out
                            </a>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Left side column. contains the logo and sidebar -->
@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
</div>

<script src="https://assets.efatoorah.sa/fatoorah/assets/js/bootstrap.bundle.min.js"></script>

{{-- <script src="{{ asset('js/chart.js/Chart.min.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://assets.efatoorah.sa/fatoorah/assets/js/adminlte.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@if(str_contains(url()->current(), '/dashboard'))
<script>
let labels = @json($dates);
let moisture_data = @json($moisture_readings);
let nitrogen_data = @json($nitrogen_readings);
let phosphorous_data = @json($phosphorous_readings);
let potassium_data = @json($potassium_readings);
const data = {
  labels: labels,
  datasets: [
    {
      label: 'Mositure',
      data: moisture_data,
      borderColor: 'rgb(18, 95, 196, 0.5)',
      backgroundColor: 'rgb(18, 95, 196)',
      yAxisID: 'y',
    },
    {
      label: 'Nitrogen',
      data: nitrogen_data,
      borderColor: 'rgba(255, 165, 0, 0.5)',
      backgroundColor: 'rgb(255, 165, 0)',
      yAxisID: 'y1',
    },
    {
      label: 'Phosphorous',
      data: phosphorous_data,
      borderColor: 'rgba(105, 12, 204, 0.5)',
      backgroundColor: 'rgb(105, 12, 204)',
      yAxisID: 'y1',
    },
    {
      label: 'Potassium',
      data: potassium_data,
      borderColor: 'rgba(192, 192, 192, 0.5)',
      backgroundColor: 'rgb(192, 192, 192)',
      yAxisID: 'y1',
    },
  ]
};
var ctx = document.getElementById("soildata").getContext('2d');
var moistureChart = new Chart(ctx, {
  type: 'line',
  data: data,
  options: {
    responsive: true,
    interaction: {
      mode: 'index',
      intersect: false,
    },
    stacked: false,
    plugins: {
      title: {
        display: true,
        text: 'Soil Monitoring Data'
      }
    },
    scales: {
      y: {
        type: 'linear',
        display: true,
        position: 'left',
      },
      y1: {
        type: 'linear',
        display: true,
        position: 'right',

        // grid line settings
        grid: {
          drawOnChartArea: false, // only want the grid lines for one axis to show up
        },
      },
    }
  },
});

$(function () {
    $('#datetimepickerFrom').datetimepicker({
        format: 'L'
    });
    $('#datetimepickerTo').datetimepicker({
        useCurrent: false,
        format: 'L'
    });
    $("#datetimepickerFrom").on("change.datetimepicker", function (e) {
        $('#datetimepickerTo').datetimepicker('minDate', e.date);
    });
    $("#datetimepickerTo").on("change.datetimepicker", function (e) {
        $('#datetimepickerFrom').datetimepicker('maxDate', e.date);
    });
});
</script>
@endif

@yield('third_party_scripts')

@stack('page_scripts')
</body>
</html>

