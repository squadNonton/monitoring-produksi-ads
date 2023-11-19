<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{$title}}</title>

        <!-- Favicons -->
        <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
        <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/daterangepicker/datepicker.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/daterangepicker/daterangepicker.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/daterangepicker/datepicker.min.css')}}">
        <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/select2/select2.min.css') }}" rel="stylesheet">
        <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/daterangepicker/datepicker.min.css')}}">

        <!-- Vendor JS Files -->
        <script src="{{ asset ('assets/js/moment.min.js')}}"></script>
        <script src="{{ asset ('assets/js/id.min.js')}}"></script>
        <script src="{{ asset ('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/daterangepicker/bootstrap-datepicker.js')}}"></script>
        <script src="{{asset('assets/select2/select2.min.js')}}"></script>
        <script src="{{asset('assets/sweetalert2/sweetalert2.all.min.js')}}"></script>
        <script src="{{ asset ('assets/highchart/highcharts.js')}}"></script>

        @include('Template.head')

        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
    </head>
    <body class="toggle-sidebar">
        {{-- Header --}}
        @include('Template.header')
        {{-- Sidebar --}}
        @include('Template.sidebar')

        <main id="main" class="main">

            <div class="pagetitle">
                <h1>{{$title}}</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </nav>
            </div>

            {{-- Content --}}
            @yield('content')

        </main>

        {{-- Footer --}}
        @include('Template.footer')

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i  class="bi bi-arrow-up-short"></i></a>

        
        <!-- Template Main JS File -->
        <script src="{{asset('assets/js/main.js')}}"></script>
    </body>
</html>
