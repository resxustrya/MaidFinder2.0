<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content gray-text browser-default">
    <li><a class="black-text" href="{{ asset('/account/logout') }}">Logout</a></li>
</ul>
<!-- Dropdown Structure -->
<ul id="dropdown2" class="dropdown-content gray-text browser-default">
    <li><a class="black-text" href="{{ asset('/account/logout') }}">Logout</a></li>
</ul>
<div class="navbar-fixed">
    <nav class="white navHeader">
        <div class="nav-wrapper navbar-fixed container-fluid" >
            <a href="#" data-activates="mobile-demo" class="blue blue-text btn-floating btn-large waves-effect waves-light button-collapse"><i class="material-icons">menu</i></a>
            <a href="{{asset('/')}}" style="font-family:DancingScript, cursive; margin-left:0;color:#46a7f7; weight:100;font-size:2em;"  class="brand-logo above animated bounceInLeft"><span><img height="55"   src="{{ asset('public/images/headerHome.gif') }}" /></span></a>

            <ul class="right hide-on-med-and-down ">
                <li><a class="black-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="Home" href="{{ asset('/') }}"><strong>Home</strong> </a></li>
                <li><a class="black-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="About us" href="{{ asset('/about-us')}}"><strong>About Us</strong> </a></li>
                @if(!isset($user))
                    <li><a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Sign-in" href="{{ asset('/user-login') }}"><strong>Sign-in</strong> </a></li>
                    <li><a class="btn blue white-text waves-effect waves-light" href="{{ asset('/user-register') }}">Sign up</a></li>
                @else
                    <li><a class="black-text dropdown-button" data-hover="true" data-beloworigin="true"  data-activates="dropdown1"><strong>{{ $user->fname }}<i class="material-icons right">arrow_drop_down</i></strong></a></li>
                @endif
                    <!-- Dropdown Trigger -->
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li class="">
                    <div class="collection white-text ">
                        <a class="collection-item black-text" href="{{ asset('/') }}">Home</a>
                        <a class="collection-item black-text" href="{{ asset('/user-login') }}">Sign In</a>
                        <a class="collection-item black-text" href="{{ asset('/user-register') }}">Sign Up</a>
                    </div>
                </li>
                <!-- Dropdown Trigger -->
            </ul>
        </div>
    </nav>
</div>
