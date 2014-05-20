@extends('backend/_layout/layout')
@section('content')
<script type="text/javascript">
    $(document).ready(function () {
        $('#notification').show().delay(4000).fadeOut(700);
    });
</script>
<div class="container">
    {{ Notification::showAll() }}
    <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a href="#settings" data-toggle="tab">Ayarlar</a></li>
        <li><a href="#info" data-toggle="tab">Info</a></li>
    </ul>

    <div class="tab-content">

        <div class="tab-pane active" id="settings">
            <br>
            <h4><i class="glyphicon glyphicon-cog"></i> Ayarlar</h4>

            <br>
            {{ Form::open() }}

            <!-- Title -->
            <div class="control-group {{ $errors->has('site_title') ? 'has-error' : '' }}">
                <label class="control-label" for="title">Başlık</label>

                <div class="controls">
                    {{ Form::text('title', $about->title, array('class'=>'form-control', 'id' => 'title', 'placeholder'=>'Title', 'value'=>Input::old('title'))) }}
                    @if ($errors->first('title'))
                    <span class="help-block">{{ $errors->first('title') }}</span>
                    @endif
                </div>
            </div>
            <br>





            <!-- Meta Description -->
            <div class="control-group {{ $errors->has('meta_description') ? 'has-error' : '' }}">
                <label class="control-label" for="title">İçerik</label>

                <div class="controls">
                    {{ Form::textarea('body', $about->body, array('class'=>'form-control', 'id' => 'body', 'placeholder'=>'Body', 'value'=>Input::old('body'))) }}
                    @if ($errors->first('body'))
                    <span class="help-block">{{ $errors->first('body') }}</span>
                    @endif
                </div>
            </div>
            <br>
            {{ Form::submit('Değişiklikleri Kaydet', array('class' => 'btn btn-success')) }}
            {{ Form::close() }}
        </div>
        <div class="tab-pane" id="info">
            <br>
            <h4><i class="glyphicon glyphicon-info-sign"></i> Info</h4>
            <br>
            Lorem profile dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.
            <p>Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis
                dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan.
                Aliquam in felis sit amet augue.</p>
        </div>
    </div>
</div>
@stop
