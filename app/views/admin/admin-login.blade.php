<!doctype html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('public/material/css/mycss.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/material/css/materialize.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/material/css/page.css')}}" />
    @section('css')

    @show
    @section('title')
    <title>MaidFinder PH</title>
    @show
</head>
<body class="grey lighten-3">

<div class="container-fluid">
    <div class="row white valign-wrapper">
        <div class="col s12 m12 l6">
            <img class="responsive-img" src="{{ asset('/public/images/header.png')}}" >
        </div>
        <div class="col s12 m12 l6 right-align">
            <a href="{{ asset('/') }}">Home</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col s12 m12 l3 hide-on-med-and-down	">
            <h1>&nbsp;</h1>
        </div>
        <div class="col s12 m12 l6">
            <ul class="collection with-header center-align">
                <li class="collection-header blue white-text"><h4>Admin, Staff Account</h4></li>
                <li class="collection-item">
                    @if(Session::has('admin-err'))
                       <h6 class="orange-text">{{ Session::get('admin-err') }}</h6>
                    @endif
                    <form action="{{ asset('/admin/account/login') }}" method="POST">
                        <div class="row">
                            <div class="input-field col s12 m12 l12 valign-wrapper">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="icon_prefix" type="text" class="validate" required name="username" placeholder="Username">
                            </div>
                            <div class="input-field col s12 m12 l12 valign-wrapper">
                                <i class="material-icons prefix">lock</i>
                                <input id="icon_prefix" type="password" name="password" required class="validate" placeholder="Password">
                            </div>
                            <div class="input-field col s12 m12 l12 valign-wrapper">
                                <div class="row center-align">
                                    <input type="submit" name="submit" value="Login" class="btn-large right green"/>
                                </div>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
        <div class="col s12 m12 l3">
            <h1>&nbsp;</h1>
        </div>
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
