<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('public/material/css/mycss.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/material/css/materialize.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/material/css/page.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/material/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/material/css/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('public/material/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/material/css/home-style.css')}}" />
    <link rel="icon" href="{{ asset('public/images/icon2.png') }}">
    @section('title')
    @show
    @section('css')
        <style>
            body {
                display: flex;
                min-height: 100vh;
                flex-direction: column;
            }
            main {
                flex: 1 0 auto;
            }
        </style>
    @show
</head>
<body class="grey lighten-3">

    @include('helpers.subscribed.header')
    @if($emp->subscribe == 0)
        <div class="card-panel green lighten-3" style="padding: 4px;">
            <h6 class="blue-grey-text center-align"><span>You will need to <a href="{{ asset('/subscription') }}">subscribe</a> to a membership plan in order to contact applicants.</span></h6>
        </div>
    @endif
    <div class="container-fluid">
        @yield('content')
    </div>
    <div class="row" style="margin-top: 20%;">
        @include('shared.footer')
    </div>


<script src="{{ asset('public/material/js/jquery.js') }}"></script>
<script src="{{ asset('public/material/js/materialize.js') }}"></script>
<script>
    $(document).ready(function() {
        $(".button-collapse").sideNav();
        $('select').material_select();
    });
</script>
@section('js')
    <script>
        $('.modal-trigger').leanModal();
        $(document).ready(function() {
            $('.modal-trigger').leanModal();

            $('.close').click(function (e) {
                e.closeModal();
            });
        });
    </script>
@show
</body>
</html>
