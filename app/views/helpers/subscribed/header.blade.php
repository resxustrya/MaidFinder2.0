<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content gray-text browser-default">
    <li><a class="black-text" href="{{ asset('employer/profile') }}">My profile</a></li>
    <li><a class="black-text" href="{{ asset('employer/logout') }}">Logout</a></li>
</ul>
<!-- Dropdown Structure -->
<ul id="dropdown2" class="dropdown-content gray-text browser-default">
    <li><a class="black-text" href="{{ asset('employer/profile') }}">My profile</a></li>
    <li><a class="black-text" href="#!">Subscription</a></li>
    <li><a class="black-text" href="{{ asset('employer/logout') }}">Logout</a></li>
</ul>
<div class="navbar-fixed">
    <nav class="indigo darken-2">
        <div class="nav-wrapper container-fluid">
            <a href="#" data-activates="mobile-demo" class="grey-text button-collapse"><i class="material-icons">menu</i></a>
            <a href="{{asset('/')}}" class="brand-logo offset-s10 grey-text"><img height="55" style="padding-left:70px; padding-top: 10px;" src="{{ asset('public/images/header.png') }}" /></a>
            <ul class="right hide-on-med-and-down ">
                <li><a class="white-text" href="{{ asset('employer/home') }}"><strong><i class="material-icons">home</i> </strong></a></li>
                <li><a class="white-text" href="{{ asset('helpers') }}"><strong>Find helpers</strong></a></li>
                <li><a class="white-text" href="{{ asset('/employer/recommend') }}">Recommendations</a> </li>
                <li><a class="white-text dropdown-button" data-hover="true" data-beloworigin="true" href="{{ asset('/employer/profile') }}" data-activates="dropdown1"><strong>{{ $emp->fname }}<i class="material-icons right">arrow_drop_down</i></strong></a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a class="black-text" href="{{ asset('employer/home') }}">Home</a></li>
                <li><a class="black-text" href="{{ asset('helpers') }}">Find helpers</a></li>
                <!-- Dropdown Trigger -->
                <li><a class="black-text dropdown-button" href="#_" data-activates="dropdown2">{{ $emp->fname }}<i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
        </div>
    </nav>
</div>