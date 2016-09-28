<div class="row fixed-section">
   <div class="row">

   </div>
    <div class="collection black-text side-links">
        <a class="collection-item black-text {{ (Session::has('url') and Session::get('url') == 5) ? 'active white-text' : '' }}" href="{{ asset('employer/profile') }}">Your profile</a>
        <a class="collection-item black-text {{ (Session::has('url') and Session::get('url') == 4) ? 'active white-text' : '' }}" href="{{ asset('/employer/ads') }}">Your job ad</a>      
        <a class="collection-item black-text {{ (Session::has('url') and Session::get('url') == 2) ? 'active white-text' : '' }}" href="{{ asset('/employer/applicant/shortlist') }}">Shortlist
           <?php
                $shorlist = EmpShortLists::where('empid', '=', $emp->empid)->get();
                $shorlist_count = 0;
                if(isset($shorlist) and count($shorlist) >0) {
                    $shorlist_count = count($shorlist);
                }
           ?>
           @if($shorlist_count > 0)
                <span class="badge grey white-text"> {{ $shorlist_count }}</span>
           @endif
        </a>
        <a class="collection-item black-text {{ (Session::has('url') and Session::get('url') == 3) ? 'active white-text' : '' }}" href="{{ asset('/employer/job/request') }}">Job request
            <?php
                $app_ad = ApplyAds::where('empid','=', $emp->empid)->get();
                if(isset($app_ad)) {
                    $count = count($app_ad);
                }
            ?>
            @if($count > 0)
                <span class="badge grey white-text">{{ $count }}</span>
            @endif
        </a>
       
        <a class="collection-item black-text {{ (Session::has('url') and Session::get('url') == 6) ? 'active white-text' : '' }}" href="{{ asset('/employer/recommend') }}">Recomend
            <?php
                $count = 0;
                $reco = Recommedations::where('empid','=', $emp->empid)->get();
                if(isset($reco)) {
                    $count = count($reco);
                }
                ?>
                @if($count > 0)
                    <span class="badge grey white-text">{{ $count }}</span>
                @endif
        </a>
        <a class="collection-item black-text {{ (Session::has('url') and Session::get('url') == 7) ? 'active white-text' : '' }}" href="{{ asset('/employer/hired/list') }}">Hired applicant</a>
    </div>
</div>
