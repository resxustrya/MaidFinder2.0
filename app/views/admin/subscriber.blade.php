

@extends('admin.layout')

@section('content')
    <div class="row">
        <h4>Employer's Subscribed.</h4>
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
    @if(isset($emp) and count($emp) > 0)
        <div class="row">
            <div class="card-panel">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                    </tr>
                    @foreach($emp as $e)
                        <tr>
                            <td>{{ $e->fname ." " .$e->lname }}</td>
                            <td>
                                @if($e->subscribe == 0)
                                    <strong>Not paid</strong>
                                @else
                                    <strong>Subscription paid</strong>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="row">
            <ul class="pagination">
                <?php echo $emp->links(); ?>
            </ul>
        </div>
    @else
        <h5>No subscriber</h5>
    @endif

@stop


@section('css')
@stop

@section('js')


@stop