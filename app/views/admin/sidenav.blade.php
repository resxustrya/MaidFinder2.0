

<div class="collection hide-on-med-and-down" style="height: 500px;">
    <a href="{{ asset('/admin/staffs') }}" class="collection-item {{ (Session::has('url') and Session::get('url') == 'staffs') ? 'active' : '' }}" >Admin staff's</a>
    <a href="{{ asset('/admin/account/users') }}" class="collection-item {{ (Session::has('url') and Session::get('url') == 'accounts') ? 'active' : '' }}">User accounts</a>
    <a href="{{ asset('/admin/job-description')}}" class="collection-item {{ (Session::has('url') and Session::get('url') == 'job-desc') ? 'active' : '' }}">Job Description</a>
    <a href="{{ asset('/admin/employer/subscription') }}" class="collection-item {{ (Session::has('url') and Session::get('url') == 'emp-subs') ? 'active' : '' }}">Employer subscription</a>
</div>