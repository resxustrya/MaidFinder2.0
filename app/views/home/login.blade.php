@extends('home.layout')

@section('content')
    <div class="container s6 " style="margin-top: 6em;">
        @if(Session::has('auth'))
            <div class="card-panel center pink lighten-6" style="padding: 2px;">
                <h5 class="white-text">{{ Session::get('auth') }}</h5>
            </div>
        @endif
        <div class="row">
            <div class="col s12 m12 l3" >
            </div>
            <div class="col s12 m12 l6 animated" >
                <div class="row ">
                    <ul class="collection with-header z-depth-4">
                        <li class="collection-header">
                            <div class="center  white-text animated flipInX">
                                <img style="height: 100px;" id="img" src={{ asset('public/images/icon2.png')}} />
                            </div>

                            <h6 class="center-align"><strong class="white-text">Login</strong></h6>
                           <div class="container animated bounceInRight">
                                <div class="row">
                                    @if(Session::has('msg'))
                                        <h5 class="center-align orange-text">{{ Session::get('msg') }}</h5>
                                    @endif
                                </div>
                                <form   action="{{ asset('/user-login')  }}" method="POST">
                                    <div class="row">
                                        <div class="input-field col s12 m12 l12 grey-text">
                                            <i class="material-icons prefix">account_circle</i>
                                            <input id="icon_prefix" type="text" name="email" class="validate">
                                            <label for="icon_prefix">Email</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12 m12 l12 grey-text">
                                            <i class="material-icons prefix">lock</i>
                                            <input id="icon_prefix" type="password" name="password" class="validate">
                                            <label for="icon_prefix">Password</label>
                                        </div>
                                    </div>
                                    <div class="row center-align">
                                        <div class="input-field col s12 m12 l12">
                                            <button  type="submit" class="btn-large blue-grey darken-1 waves-effect waves-light col s12">Sign In</button>
                                        </div>
                                        <div class="row col s1 m12 l12"></div>
                                        <div class="row ">
                                       <div class="input-field white-text col s12 m12 l11 ">
                                            <a  href="{{ asset('/user-register') }}">Sign Up For MaidFinderPh</a>
                                        </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="col s12 m12 l3">

            </div>
        </div>
    </div>
@stop

@section('css')

@stop
@section('js')

@stop