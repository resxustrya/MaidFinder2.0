
@extends('admin.layout')


@section('content')
    <div class="row">
        <h4>Employers subscription</h4>
    </div>
    <div class="row">
        <div class="col s12 m12 l10">
            <div class="valign-wrapper">
                <a href="{{ asset('/admin/subscriber/add') }}" class="btn blue">Add new subscriber</a>
                <a href="{{ asset('/admin/subscriber') }}" class="btn blue tab2">View subscriber</a>
            </div>
        </div>
    </div>
    <br />
    <div class="divider"></div>
    <br />
    <div class="row">
        <h5>Add new subscriber</h5>
    </div>
    <div class="row">
        <div class="col s12 m12 l5">
            <form action="{{asset('/admin/subscriber/add')}}" method="POST">
                <div class="valign-wrapper">
                    <input type="text" name="email" placeholder="Search email address"/>
                    <input type="submit" name="search" value="Search" class="btn green"/>
                </div>
            </form>
        </div>
    </div>
    @if(isset($emp) and count($emp) > 0)
        <div class="row">
           <div class="card-panel">
               <table>
                   <tr>
                       <th>Name</th>
                       <th>Contact no.</th>
                       <th>Email</th>
                       <th>Address</th>
                       <th>Status</th>
                       <th><i class="material-icons">settings</i></th>
                   </tr>
                   <tr>
                       <td>{{ $emp->fname ." " .$emp->lname }}</td>
                       <td>{{ $emp->contactno }}</td>
                       <td>{{ $emp->email }}</td>
                       <?php $loc = Regions::find($emp->regionid); ?>
                       <td>{{ $loc->location }} - {{ $emp->address }}</td>
                       <td>
                          @if($emp->subscribe == 0)
                              <strong>Not paid</strong>
                          @else
                            <strong>Subscription paid</strong>
                          @endif
                       </td>
                       <td>
                           <a class='dropdown-button' href='#' data-constrainwidth="true" data-activates='id1'><i class="material-icons black-text">play_arrow</i> </a>
                           <!-- Dropdown Structure -->
                           <ul id="id1" class='dropdown-content'>
                               <li onclick="approve({{ $emp->empid }})"><span style="font-size: 0.8em;">Confirm</span> </li>
                           </ul>
                       </td>
                   </tr>
               </table>
           </div>
        </div>
    @else
        <div class="row">
            <h6>No results found.</h6>
        </div>
    @endif

@stop

@section('css')


@stop

@section('js')
    @parent
    <script>
        function approve(id) {
            if(confirm('Do you confirm payment ?') == true) {
                var url = {{ "'". asset('/admin/subscriber/approve') . "'" }};
                var data = {
                    "empid" : id
                };
                $.post(url , data, function(response){
                    var res = JSON.parse(response);
                    if(res.status == "ok") {
                        if(confirm("Subscription paid. Employer now recieves message notification.") == true) {
                            window.location.href = {{ "'". asset('/admin/subscriber')."'"}};
                        }
                    }
                });
            }
        }
    </script>
@stop
