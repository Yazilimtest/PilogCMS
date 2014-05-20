@extends('backend/_layout/layout')
@section('content')
<script type="text/javascript">
    $(document).ready(function () {
        $('#notification').show().delay(4000).fadeOut(700);
    });
</script>
<div class="container">
    {{ Notification::showAll() }}
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Dersler</h3>
        </div>
        <div class="panel-body">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ URL::route('admin.ders.create') }}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;Yeni Ders
                    </a>
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $dersler as $ders )
                    <tr>
                        <td> {{ link_to_route( 'admin.ders.show', $ders->title, $ders->id, array( 'class' => 'btn btn-link btn-xs' )) }}
                        <td>                         
                            <div class="btn-group">
                                <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#">
                                    Action
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ URL::route('admin.ders.show', array($ders->id)) }}">
                                            <span class="glyphicon glyphicon-eye-open"></span>&nbsp;Show ders
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::route('admin.ders.edit', array($ders->id)) }}">
                                            <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit ders
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{ URL::route('admin.ders.delete', array($ders->id)) }}">
                                            <span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Delete ders
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="pull-left">
        <ul class="pagination">
            {{ $dersler->links() }}
        </ul>
    </div>
</div>
@stop