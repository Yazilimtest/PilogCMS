@extends('backend/_layout/layout')
@section('content')

{{ HTML::script('ckeditor/ckeditor.js') }}
{{ HTML::style('assets/bootstrap/css/bootstrap-tagsinput.css') }}
{{ HTML::script('assets/bootstrap/js/bootstrap-tagsinput.js') }}
{{ HTML::script('assets/js/jquery.slug.js') }}
<script type="text/javascript">
    $(document).ready(function () {
        $("#title").slug();
    });
</script>
<div class="container">
    <div class="page-header">
        <h3>
            Yazı Oluştur
            <div class="pull-right">
                {{ HTML::link('/admin/article','Geri', array('class'=>'btn btn-primary')) }}
            </div>
        </h3>
    </div>
    {{ Form::open(array('action' => 'App\Controllers\Admin\ArticleController@store','files' => true)) }}
    <!-- Title -->
    <div class="control-group {{ $errors->has('title') ? 'has-error' : '' }}">
        <label class="control-label" for="title">Başlık</label>

        <div class="controls">
            {{ Form::text('title', null, array('class'=>'form-control', 'id' => 'title', 'placeholder'=>'Başlık', 'value'=>Input::old('title'))) }}
            @if ($errors->first('title'))
            <span class="help-block">{{ $errors->first('title') }}</span>
            @endif
        </div>
    </div>
    <br>

    <!-- Slug -->
    <div class="control-group {{ $errors->has('slug') ? 'has-error' : '' }}">
        <label class="control-label" for="title">Url</label>

        <div class="controls">
            <div class="input-group">
                <span class="input-group-addon">www.pilogcms.com/</span>
                {{ Form::text('slug', null, array('class'=>'form-control slug', 'id' => 'slug', 'placeholder'=>'Url', 'value'=>Input::old('slug'))) }}
            </div>
            @if ($errors->first('slug'))
            <span class="help-block">{{ $errors->first('slug') }}</span>
            @endif
        </div>
    </div>
    <br>





    <!-- Ders -->
    <div class="control-group {{ $errors->has('ders') ? 'error' : '' }}">
        <label class="control-label" for="title">Ders</label>

        <div class="controls">
            {{ Form::select('ders', $dersler, null, array('class' => 'form-control', 'value'=>Input::old('ders'))) }}
            @if ($errors->first('ders'))
            <span class="help-block">{{ $errors->first('ders') }}</span>
            @endif
        </div>
    </div>
    <br>

    <!-- Description -->
    <div class="control-group {{ $errors->has('content') ? 'has-error' : '' }}">
        <label class="control-label" for="title">İçerik</label>

        <div class="controls">
            {{ Form::textarea('body', null, array('class'=>'form-control', 'id' => 'body', 'placeholder'=>'Body', 'value'=>Input::old('body'))) }}
            @if ($errors->first('body'))
            <span class="help-block">{{ $errors->first('body') }}</span>
            @endif
        </div>
    </div>
    <br>







    <br>
    {{ Form::submit('Create', array('class' => 'btn btn-success')) }}
    {{ Form::close() }}
    <script type="text/javascript">
        window.onload = function () {
            CKEDITOR.replace('body', {
                "filebrowserBrowseUrl": "{{ url('filemanager/show') }}"
            });
        };

        $(document).ready(function () {

            if ($('#tag').length != 0) {
                var elt = $('#tag');
                elt.tagsinput();
            }
        });
    </script>
</div>
@stop