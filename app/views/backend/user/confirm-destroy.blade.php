@extends('backend/_layout/layout')
@section('content')
<div class="container">
    {{ Form::open( array( 'route' => array( 'admin.user.destroy', $user->id ) ) ) }}
    {{ Form::hidden( '_method', 'DELETE' ) }}
    <div class="alert alert-warning">
        <div class="pull-left"><b> Dikkat Et!</b> Yöneticiyi ortadan kaldırmak istiyor musun ? <b>{{{ $user->username }}} </b> ?
        </div>
        <div class="pull-right">
            {{ Form::submit( 'Evet', array( 'class' => 'btn btn-danger' ) ) }}
            {{ link_to( URL::previous(), 'Hayır', array( 'class' => 'btn btn-primary' ) ) }}
        </div>
        <div class="clearfix"></div>
    </div>
    {{ Form::close() }}
</div>
@stop