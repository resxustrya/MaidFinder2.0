
@extends('employer.layout')

@section('content')
    <div class="container-fluid">
        @if(Session::has('error'))
            <?php $error = Session::get('error'); ?>
        @endif
        <div class="row">
            <h4>Update ad</h4>
            {{ (isset($input) ?var_dump($input) : '') }}
        </div>
        
    </div>

@stop

@section('js')
    @parent
    <script>
        var input_count = 1;
        $(document).ready(function() {
            $('.add_desc').click(function(e) {
                e.preventDefault();
                if(input_count != 10) {
                    $('.job_desc').append('<tr><td><span class="orange-text">* </span></td><td> <input type="text" name="job_desc[]" placeholder="Write your job description here"/></td></tr>');
                    input_count ++;
                }
            });
        });
    </script>
@stop
