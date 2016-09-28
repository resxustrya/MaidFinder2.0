
@extends('employer.layout')

@section('content')

<div class="row"> 
    <div class="col s12 m12 l6 offset-l2">
        <h4>Create job ad</h4>
        <div class="card-panel">
            <form action="{{ asset('/employer/create/ad')}}" method="GET" id="job-form">
                <div class="row">
                    <h6 style="font-size: 1.3em;">What is your ideal helper?</h6>
                </div>
                <br />
                <div class="row">
                    <select class="browser-default" name="jobtype" id="jobtype">
                        <option value="" selected disabled="">Select helper type</option>
                        @foreach($jobtype as $type)
                            <option value="{{ $type->jobtypeid}}">{{ $type->description }} </option>
                        @endforeach
                    </select>
                </div>
                <br />
                <div class="row">
                    <div class="col s12 m12 l12 center">
                        <input type="submit" value="Ok" name="submit" class="btn blue"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@stop


@section('js')
    @parent
    <script>
        $(document).ready(function() {
            $('#job-form').submit(function(e){
               
               var val = $('#jobtype').val();
               if(val == "" || val == null) {
                    e.preventDefault();
                   alert('Please select helper type');
               } else {
                   $(this).submit();
               }
            });
        });
    </script>
@stop


@section('css')

@stop