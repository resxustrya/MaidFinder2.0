
<div class="row fixed-section">
   <div class="row">
   </div>
    <div class="collection side-links black-text">
        <a class="collection-item black-text {{ (Session::has('url') and Session::get('url') == 1) ? 'active white-text' : '' }}" href="{{ asset('/applicant/profile') }}">Profile</a>
        <a class="collection-item black-text {{ (Session::has('url') and Session::get('url') == 2) ? 'active white-text' : '' }}" href="{{ asset('/applicant/job/preference') }}">Job application</a>
        <a class="collection-item black-text {{ (Session::has('url') and Session::get('url') == 3) ? 'active white-text' : '' }}" href="{{ asset('/applicant/applications/list')}}">Applied jobs
            <?php
                $count = 0;
                $count = ApplyAds::where('appid', '=', $app->appid)->count();
            ?>
            @if($count > 0)
                <span class="badge white-text grey">{{ $count}} </span>
            @endif
        </a>
        <a class="collection-item black-text {{ (Session::has('url') and Session::get('url') == 5) ? 'active white-text' : '' }}" href="{{ asset('/applicant/shortlist') }}">Shortlist
            <?php
                $shortlist_count = 0;
                $shortlist = AppShortList::where('appid', '=', $app->appid)->get();
                if(isset($shortlist) and count($shortlist) > 0) {
                    $shortlist_count = count($shortlist);
                }
            ?>
            @if($shortlist_count > 0)
                <span class="badge white-text grey">{{ $shortlist_count }}</span>
            @endif
        </a>
        <a class="collection-item black-text {{ (Session::has('url') and Session::get('url') == 6) ? 'active white-text' : '' }}" href="{{ asset('/applicant/employer/job/request') }}">Job request
            <?php
                $hirelist_count = 0;
               $hirelist = HireLists::where('appid', '=', $app->appid)
                                        ->where('accepted', '=', 0)
                                        ->get();
                if(isset($hirelist) and count($hirelist) > 0) {
                    $hirelist_count = count($hirelist);
                }
            ?>
            @if($hirelist_count > 0)
                <span class="badge white-text grey"> {{ $hirelist_count }}</span>
            @endif
        </a>
        <a class="collection-item black-text {{ (Session::has('url') and Session::get('url') == 4) ? 'active white-text' : '' }}" href="{{ asset('/hired/job') }}">Employment history</a>
    </div>
</div>
