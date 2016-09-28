

@extends('subs.layout')

@section('content')
    <div class="col s12 m12 l1">
        <h1>&nbsp;</h1>
    </div>
    <div class="col s12 m12 l10 center">
        <div class="row">
            <h3 class="black-text">Subscribe to our subscription plan</h3>
        </div>
        <div class="row">
            <img src="{{ asset('public/images/subscription.png') }}"  class="responsive-img"/>
        </div>
        <div class="row" style="margin-top: -160px;">
            <h3 class="center-align">Payment Options</h3>
            <h5 class="center-align">Choose from multiple payment options that you want.</h5>
        </div>
        <div class="row">
            <div class="center-align">
                <img src="{{ asset('public/files/Money.png') }}"  class="responsive-img"/>
            </div>
        </div>
        <div class="divider"></div>
        <div class="row white">
            <div class="col s12 m12 l12">
                <h5>Payment guide :</h5>
                <p class="tab3">
                    Go to your nearest MLHUILLIER, CEBUANA LHUILLIER, WESTERN UNION, PALAWAWAN EXPRESS BRANCH in your place.
                    Get a remittance form from the branch staff available there.
                </p>
                <p class="tab3">
                    Fill-up the remittance form using the information below:
                </p>
                <p class="tab3">
                    Receiver's Name: Lourence Rex B. Traya<br />
                    Receiver's Address: CEBU CITY 2300 PHILIPPINES <br />
                    Receiver's Contact #: 09226663075 <br />
                    Amount: (the subscription amount you paid)
                </p>
                <p class="tab3">
                    Before sending the subscription, send us a text message to Mobile #: 09226663075 containing the information from your remittance receipt and follow the format bellow:
                </p>
                <p class="tab3">
                    KPTN, PEPP,TRK CTRL, (Kwarta Padala Tracking Number, Control Number from your receipt - must be exactly as is) <br />
                    Sender's Name: (according to your receipt - must be exact to the receipt) <br />
                    Sender's Address: (according to your receipt if any - must be exactly as is) <br />
                    Amount: (according to your receipt) <br />
                    Contact no. :(your MaidFinder account mobile number.)
                    Your email address : (your MaidFinder account email address) <br />
                </p>
                <p class="tab3">
                   <strong>After we received and confirm your remittance, we will notify you through text and email for confimation. Thank you.</strong>
                </p>
            </div>
        </div>
    </div>
    <div class="col s12 m12 l1">
        <h1>&nbsp;</h1>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop