@extends('backend/_layout/layout')
@section('content')
<div class="container">
    {{ Form::open( array( 'action' => array( 'App\Controllers\Admin\PostController@destroy', $post->id ) ) ) }}
    {{ Form::hidden( '_method', 'DELETE' ) }}
    <div class="alert alert-warning">
        <div class="pull-left"><b> Dikkatli Ol!</b> Bu yazıyı silmek istediğinden emin misin? <b>{{{ $post->title }}} </b> ?
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