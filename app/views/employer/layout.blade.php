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
<body class="grey lighten-4">

@include('employer.header')
@if($emp->subscribe == 0)
    <div class="card-panel green lighten-3" style="padding: 5px; margin-top: -0px;">
        <h6 class="blue-grey-text center-align"><span>You will need to <a href="{{ asset('/subscription') }}"><img style="width:120px; height: 14px;" src="{{ asset('public/images/k.gif') }}"></a> to a membership plan in order to hire and contact applicants.</span></h6>
    </div>
@endif
<div class="container-fluid">
    @if(Session::has('message'))
        <div class="row">
            <div class="card-panel green lighten-3" style="padding: 10px;">
                <h6 class="blue-grey-text center-align">{{ Session::get('message')}}</h6>
            </div>
        </div>
    @endif
    @if(Session::has('update_ad'))
        <div class="row">
            <div class="card-panel green lighten-3" style="padding: 10px;">
                <h6 class="blue-grey-text center-align">{{ Session::get('update_ad')}}</h6>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col s12 m12 l2 hide-on-med-and-down">
            @include('employer.sidenav')
        </div>
        <div class="col s12 m12 l10" style="padding: 0px;">
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
    });
</script>
@section('js')

@show
</body>
</html>
