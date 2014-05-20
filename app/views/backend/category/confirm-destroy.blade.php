@extends('backend/_layout/layout')
@section('content')
<div class="container">
    {{ Form::open( array( 'route' => array( 'admin.category.destroy', $category->id ) ) ) }}
    {{ Form::hidden( '_method', 'DELETE' ) }}
    <div class="alert alert-warning">
        <div class="pull-left"><br> Dikkatli ol!</br> Kategoriyi Silmek İstiyor musun? <b>{{{ $category->title }}}  </b> ?
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