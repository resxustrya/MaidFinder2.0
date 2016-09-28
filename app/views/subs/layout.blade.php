
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

@include('employer.header')
<div class="container-fluid">
    @if($emp->subscribe == 0)
        <div class="row">
            <div class="card-panel green lighten-3" style="padding: 10px;">
                <h6 class="blue-grey-text center-align">Contacting and hiring matched applicants should require you to be subscribe to us.</h6>
            </div>
        </div>
    @endif
    <div class="row">
        @yield('content')
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
