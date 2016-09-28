

@extends('admin.layout')

@section('content')
    <div class="card-panel">
        <div class="row valign-wrapper">
            <span style="font-size: 2em;" class="grey-text">Job description</span>
            <p><button class="btn green offset-l4 square right modal-trigger" href="#modal1"><i class="material-icons">note_add</i> </button> </p>
        </div>
        <div class="row">
            <table class="centered highlight">
                <thead>
                <tr>
                    <th>Job Descripton</th>
                    <th><i class="material-icons">settings</i> </th>
                </tr>
                </thead>
                <tbody>
                <?php $count =20; ?>
                @foreach($jobtype as $job)
                    <tr>
                        <td>{{ $job->description }}</td>
                        <td>
                            <a class='dropdown-button' href='#' data-activates='dropdown{{$count}}'><i class="material-icons black-text">play_arrow</i> </a>

                            <!-- Dropdown Structure -->
                            <ul id='dropdown{{$count}}' class='dropdown-content'>
                                <li onclick="edit({{ $job->jobtypeid }}, {{"'" . $job->description ."'"}});"><span>edit</span></li>
                                <li onclick="del({{ $job->jobtypeid }}, {{"'" . $job->description ."'"}});"><span>remove</span> </li>
                            </ul>
                        </td>
                    </tr>
                    <?php $count++; ?>
                @endforeach
                </tbody>
            </table>
            <div class="row">
                <ul class="pagination">
                    <?php echo $jobtype->links();?>
                </ul>
            </div>
        </div>
    </div>


    <!--modal -->
    <div id="modal1" class="modal ">
        <div class="row">
            <div class="col s12 m12 l12">
                <ul class="collection with-header center-align">
                    <li class="collection-header blue white-text"><h4>Add new job description</h4></li>
                    <li class="collection-item">
                        <form action="{{ asset('/admin/new/job/desc') }}" method="POST">
                            <div class="row">
                                <div class="input-field col s12 m12 l10 valign-wrapper">
                                    <strong>Job description</strong>
                                    <input id="icon_prefix" type="text" class="validate desc" required name="desc" placeholder="Job description">
                                </div>

                                <div class="input-field col s12 m12 l12 valign-wrapper">
                                    <div class="row center-align">
                                        <input type="submit" name="submit" value="Submit" class="btn-large right green"/>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!--modal2 -->
    <div id="modal2" class="modal ">
        <div class="row">
            <div class="col s12 m12 l12">
                <ul class="collection with-header center-align">
                    <li class="collection-header blue white-text"><h4>Add new job description</h4></li>
                    <li class="collection-item">
                        <form action="{{ asset('/admin/job/desc/edit') }}" method="POST">
                            <input type="hidden" name="id" value="" id="jobid" />
                            <div class="row">
                                <div class="input-field col s12 m12 l10 valign-wrapper">
                                    <strong>Job description</strong>
                                    <input id="icon_prefix" type="text" class="validate desc" required name="desc" placeholder="Job description">
                                </div>

                                <div class="input-field col s12 m12 l12 valign-wrapper">
                                    <div class="row center-align">
                                        <input type="submit" name="submit" value="Submit" class="btn-large right green"/>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@stop


@section('css')

@stop

@section('js')
    @parent
    <script>
        function edit(id, val) {
            $('#modal2').openModal();
            $('.desc').val(val);
            $('#jobid').val(id);
        }
        function del(id, val) {
            if(confirm("Remove " + val +" ?") == true) {
                var url = {{ "'" . asset('/admin/remove/job') ."'" }};
                var data = {
                    'id' : id
                };
                $.post(url, data ,function(response){
                    if(response == "ok") {
                        alert(val + "was removed.");
                        window.location.href = {{ "'". asset('/admin/job-description')."'"}};
                    }
                });
            }
        }
    </script>
@stop