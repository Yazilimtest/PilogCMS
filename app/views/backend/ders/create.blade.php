@extends('backend/_layout/layout')
@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Ders Ekle</h3>
        </div>
        <div class="panel-body">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ url('admin/ders') }}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Geri
                    </a>
                </div>
            </div>
            <br>
            <br>
            <br>
            {{ Form::open(array('route' => array( 'admin.ders.store' ))) }}
            <!-- Title -->
            <div class="control-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label class="control-label" for="title">Ders</label>

                <div class="controls">
                    {{ Form::text('title', null, array('class'=>'form-control', 'id' => 'title', 'placeholder'=>'Ders', 'value'=>Input::old('title'))) }}
                    @if ($errors->first('title'))
                    <span class="help-block">{{ $errors->first('title') }}</span>
                    @endif
                </div>
            </div>
            <br>
            <!-- Form actions -->
            {{ Form::submit('Değişiklikleri Kaydet', array('class' => 'btn btn-success')) }}
            <a href="{{ url('admin/ders') }}" class="btn btn-default">&nbsp;Vazgeç</a>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop