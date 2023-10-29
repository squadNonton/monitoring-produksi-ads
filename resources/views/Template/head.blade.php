@if(Route::currentRouteName()=='dasbor')
    <link href="{{asset('assets/css/dasbor.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('assets/daterangepicker/daterangepicker.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/daterangepicker/datepicker.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/daterangepicker/bootstrap-datepicker.js')}}"></script>
@endif

@if(Route::currentRouteName()=='prodin')
    <link href="{{asset('assets/css/in.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('assets/daterangepicker/daterangepicker.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/daterangepicker/datepicker.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/daterangepicker/bootstrap-datepicker.js')}}"></script>
@endif

@if(Route::currentRouteName()=='prodout')
    <link href="{{asset('assets/css/out.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('assets/daterangepicker/daterangepicker.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/daterangepicker/datepicker.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/daterangepicker/bootstrap-datepicker.js')}}"></script>
@endif

@if(Route::currentRouteName()=='effmachine')
    <link href="{{asset('assets/css/eff.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('assets/daterangepicker/daterangepicker.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/daterangepicker/datepicker.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/daterangepicker/bootstrap-datepicker.js')}}"></script>
@endif