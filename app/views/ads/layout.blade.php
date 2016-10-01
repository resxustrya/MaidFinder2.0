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
    @show
</head>
<body class="indigo lighten-5">
    @include('ads.header')
        @yield('content')
    <div class="row">
        @include('shared.footer')
    </div>

<script src="{{ asset('public/material/js/jquery.js') }}"></script>
<script src="{{ asset('public/material/js/materialize.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.modal-trigger').leanModal();
        $(".button-collapse").sideNav();
        $('select').material_select();
        $('.close').click(function (e) {
            e.closeModal();
        });
    });
</script>
@section('js')

@show
</body>
</html>
