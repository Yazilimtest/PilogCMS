@extends('backend/_layout/layout')
@section('content')
<script type="text/javascript">
    $(document).ready(function () {
        $('#message').show().delay(4000).fadeOut(700);
    });
</script>
<div class="container">
    @if(Session::has('message'))
    <div class="alert alert-success" id="message">
        {{ Session::get('message') }}
    </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Yöneticiler</h3>
        </div>
        <div class="panel-body">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ URL::route('admin.user.create') }}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;Yeni Yönetici
                    </a>
                </div>
            </div>
            <br>
            <br>
            <br>
               @if($users->count())
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>İsim</th>
                        <th>Email</th>
                        <th>Kayıt Tarihi</th>
                        <th>Son Giriş</th>
                        <th>Düzenle</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $users as $user )
                    <tr>
                        <td> {{ link_to_route( 'admin.user.show', $user->first_name . " " . $user->last_name, $user->id, array( 'class' => 'btn btn-link btn-xs' )) }}
                        <td>{{{ $user->email }}}</td>
                        <td>{{{ $user->created_at }}}</td>
                        <td>{{{ $user->last_login }}}</td>
                        <td>                         
                            <div class="btn-group">
                                <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#">
                                    Düzenle
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ URL::route('admin.user.show', array($user->id)) }}">
                                            <span class="glyphicon glyphicon-eye-open"></span>&nbsp;Show User
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::route('admin.user.edit', array($user->id)) }}">
                                            <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit User
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{ URL::route('admin.user.delete', array($user->id)) }}">
                                            <span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Delete User
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
             @else
            <div class="alert alert-danger">No results found</div>
            @endif
        </div>
    </div>

    <div class="pull-left">
        <ul class="pagination">
            {{ $users->links() }}
        </ul>
    </div>
</div>
@stop