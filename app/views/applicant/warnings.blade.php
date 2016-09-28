
@if($app['profilepic'] == null)
    <p class="center-align orange darken-1" style="border-radius: 5px; padding: 10px;">
        <span class="white-text">
            You haven't uploaded a profile picture yet. Your account won't be valid unless you complete all the required details about your account.
            <br />
            Please update your profile. <strong><a href="{{ asset('applicant/update') }}">Update Profile</a> </strong>
        </span>
    </p>
@endif