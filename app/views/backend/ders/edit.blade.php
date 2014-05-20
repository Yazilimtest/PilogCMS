@extends('backend/_layout/layout')
@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Edit ders "{{ $ders->title }}"</h3>
        </div>
        <div class="panel-body">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ URL::route('admin.ders.delete', array($ders->id)) }}" class="btn btn-danger">
                        <span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Delete ders
                    </a>
                </div>
            </div>
            <br>
            <br>
            <br>
            {{ Form::open( array( 'route' => array( 'admin.ders.update', $ders->id), 'method' => 'PATCH')) }}
            <!-- Title -->
            <div class="control-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label class="control-label" for="first-name">Title</label>
                <div class="controls">
                    {{ Form::text('title', $ders->title, array('class'=>'form-control', 'id' => 'title', 'placeholder'=>'Title', 'value'=>Input::old('title'))) }}
                    @if ($errors->first('title'))
                    <span class="help-block">{{ $errors->first('title') }}</span>
                    @endif
                </div>
            </div>
            <br>
            <!-- Form actions -->
            {{ Form::submit('Save Changes', array('class' => 'btn btn-success')) }}
            <a href="{{ url('admin/ders') }}"  class="btn btn-default">&nbsp;Cancel</a>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop