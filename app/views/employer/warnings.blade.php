@if($emp['subscribe'] == 0)
    <p class="center-align orange darken-1" style="border-radius: 5px; padding: 10px;">
        <strong class="white-text">Subscription details !</strong><br />
        <span class="white-text">
                If you haven subscribe yet, your account won't be visible or
                cannot viewed by helpers.
        </span>
        <br />
        <a href="{{ asset('subscription') }}" class="btn cyan lighten-3">Subscribe now</a>

    </p>
@endif
@if($emp['profilepic'] == null)
    <p class="center-align orange darken-1" style="border-radius: 5px; padding: 10px;">
        <span class="white-text">
            You haven't uploaded a profile picture yet. Your account won't be valid unless you complete all the required details about your account.
            <br />
            Please update your profile. <strong><a href="{{ asset('employer/update') }}">Update Profile</a> </strong>
        </span>
    </p>
@endif