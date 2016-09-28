

@extends('admin.layout')

@section('content')
    <div class="card-panel">
        <div class="row valign-wrapper">
            <span style="font-size: 2em;" class="grey-text">Verified applicant accounts -  {{ $count }} Results</span>
        </div>
        <div class="row">
            <table class="centered highlight">
                <thead>
                <tr>
                    <th>Applicant name</th>
                    <th>Status</th>
                    <th><i class="material-icons">settings</i> </th>
                </tr>
                </thead>
                <tbody>
                <?php $count =20; ?>
                @foreach($employers as $emp)
                    @if(isset($emp))
                        <tr>
                            <td>{{ $emp->fname ." " . $emp->lname }}</td>
                            <td>
                                @if($emp->isVerified == 1)
                                    <span>Verified</span>
                                @endif
                            </td>
                            <td>
                                <a class='dropdown-button' href='#' data-constrainwidth="true" data-activates='dropdown{{$count}}'><i class="material-icons black-text">play_arrow</i> </a>
                                <!-- Dropdown Structure -->
                                <ul id='dropdown{{$count}}' class='dropdown-content'>
                                    <li><a href="{{ asset('/admin/employer/verified/' . $emp->empid) }}" target="_blank"><span style="font-size: 0.7em;">View profile</span></a></li>
                                    <li onclick="del({{ $emp->empid }});"><span style="font-size: 0.7em;">Remove accnt</span> </li>
                                </ul>
                            </td>
                        </tr>
                    @endif
                    <?php $count++; ?>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <ul class="pagination">
                <?php echo $employers->links(); ?>
            </ul>
        </div>
    </div>
    <!-- VEIW MODAL PROFILE -->
    <div id="modal2" class="modal modal-fixed-footer" style="height:100%;margin-top: -70px;">
        <div class="row right-align" style="margin-top: 0px;">
            <a class="modal-close btn-small circle"> <i class="material-icons ">closed</i></a>
        </div>
        <div class="row">
            <div class="img">
                <img class="profilepic" src="" />
            </div>
            <span id="id"></span>
        </div>

    </div>
@stop

@section('css')

@stop

@section('js')
    @parent
    <script>
        function del(id) {
            if(confirm("Delete applicant?") == true) {
                var url = {{ "'" . asset('/admin/employer/remove') ."'" }};
                var data = {
                    "empid" : id
                };
                $.post(url, data, function(response){
                    var res = JSON.parse(response);
                    if(res.status == "ok") {
                        var $toastContent = $('<h5>Employer successfully removed</h5>');
                        Materialize.toast($toastContent,5000);
                        window.location.href = {{ "'" .asset('/admin/employer/accounts-pending') ."'"  }};
                    }
                });
            }
        }
    </script>
@stop
