<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('public/material/css/mycss.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/material/css/materialize.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/material/css/page.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/material/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/material/css/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('public/material/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/material/css/home-style.css')}}" />
    <link rel="icon" href="{{ asset('public/images/icon2.png') }}">
    @section('css')

    @show
    @section('title')
        <title>MaidFinder PH</title>
    @show
    <style>
        .side-links {
            border:0;
        }
        .side-links a {
            border-radius: 8px;
        }
    </style>
</head>
<body class="indigo lighten-5"> 
    
@include('applicant.header')
<div class="container-fluid">
    @if(Session::has('message'))
        <div class="row">
            <div class="card-panel green lighten-3" style="padding: 10px;margin-top: 0px;">
                <h6 class="blue-grey-text center-align">{{ Session::get('message')}}</h6>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col s12 m12 l2 hide-on-med-and-down">
            @include('applicant.sidenav')
        </div>
        <div class="col s12 m12 l10">
            @yield('content')
        </div>
    </div>
    <div class="row" style="margin-top: 20%;">
        @include('shared.footer')
    </div>

</div>

<script src="{{ asset('public/material/js/jquery.js') }}"></script>
<script src="{{ asset('public/material/js/materialize.min.js') }}" ></script>
<script>
    $(document).ready(function() {
        $(".button-collapse").sideNav();
        $('select').material_select();
       // $('.fixed-section').pushpin({ top: $('.fixed-section').offset().top });
    });
</script>
@section('js')
@show
</body>
</html>
