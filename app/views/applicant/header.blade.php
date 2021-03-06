<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content gray-text browser-default">
    <li><a class="black-text" href="{{ asset('applicant/profile') }}">My profile</a></li>
    <li><a class="black-text" href="{{ asset('applicant/logout') }}">Logout</a></li>
</ul>
<!-- Dropdown Structure -->
<ul id="dropdown2" class="dropdown-content black-text browser-default">
    <li><a class="black-text" href="{{ asset('applicant/profile') }}">My profile</a></li>
    <li><a class="black-text" href="{{ asset('applicant/logout') }}">Logout</a></li>
</ul>
<div class="navbar-fixed">
    <nav class="blue darken-2">
        <div class="nav-wrapper navbar-fixed container-fluid">
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <a href="{{asset('/')}}" class="brand-logo offset-s10 white-text"><img class="animated bounceInLeft" height="55" style="padding-left:70px; padding-top: 10px;" src="{{ asset('public/images/header.png') }}" /></a>
            <ul class="right hide-on-med-and-down animated bounceInRight">
                <li><a class="white-text tooltipped" data-position="bottom" data-delay="20" data-tooltip="Home" href="{{ asset('applicant/home') }}"><strong>Home</strong></a></li>
                <li><a class="white-text tooltipped" data-position="bottom" data-delay="20" data-tooltip="Find Employers" href="{{ asset('employer/job/ads') }}"><strong>Employer ads</strong> </a></li>
                <!-- Dropdown Trigger -->
                <li><a class="dropdown-button white-text" data-hover="true" data-beloworigin="true" href="{{ asset('applicant/profile') }}" data-activates="dropdown1">{{ $app['fname'] }}<i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li>
                    <a class="collection-item black-text" href="{{ asset('applicant/home') }}">Home</a>
                    <a class="collection-item black-text" href="{{ asset('applicant/shortlist') }}">Shortlist</a>
                    <a class="collection-item black-text" href="{{ asset('employer/job/request') }}">Employers request</a>
                    <a class="collection-item black-text" href="{{ asset('applicant/messagebox') }}">Message box</a>
                    <a class="collection-item black-text" href="{{ asset('applicant/application') }}">Job application</a>
                    <a class="collection-item black-text" href="{{ asset('applicant/experience') }}">Experiences</a>
                </li>
                <li><a class="black-text" href="{{ asset('employers/job/ads') }}">Employer ads</a></li>
                <li><a class="black-text" href="badges.html">Recomendations</a></li>
                <!-- Dropdown Trigger -->
                <li><a class="dropdown-button" href="#_" data-activates="dropdown2">{{ $app['fname'] }}<i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
        </div>
    </nav>
</div>