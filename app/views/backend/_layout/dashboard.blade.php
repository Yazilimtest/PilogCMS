@extends('backend/_layout/layout')
@section('content')
<div class="container">
<div class="col-md-3">
        <a href="#"><strong><i class="glyphicon glyphicon-briefcase"></i> Hızlı Formlar</strong></a>
        <hr>
        <ul class="nav nav-pills nav-stacked">
            <li><a href="{{ route('admin.form-post.index') }}"><i class="glyphicon glyphicon-envelope"></i> Gelen Kutusu</a></li>
            <li><a href="{{ route('admin.settings') }}"><i class="glyphicon glyphicon-cog"></i> Ayarlar</a></li>
            <li><a href="#"><i class="glyphicon glyphicon-plus"></i> Advanced</a></li>
        </ul>
        <hr>

    </div>
<div class="col-md-9">
        <a href="#"><strong><i class="glyphicon glyphicon-briefcase"></i> Modüller</strong></a>
         <hr>
          <div class="row">
            <div class="col-xs-6 col-md-12">
                    <a href="{{ route('admin.form-post.index') }}" class="btn btn-info btn-lg" role="button"><span class="glyphicon glyphicon-envelope"></span> <br/>Gelen Kutusu</a>

                <a href="{{ route('admin.user.index') }}" class="btn btn-warning btn-lg" role="button"><span class="glyphicon glyphicon-user"></span> <br/>Yöneticiler</a>
                <a href="{{ route('admin.settings') }}" class="btn btn-default btn-lg" role="button"><span class="glyphicon glyphicon-cog"></span> <br/>Ayarlar</a>
                <a href="{{ route('admin.about') }}" class="btn btn-default btn-lg" role="button"><span class="glyphicon glyphicon-th"></span> <br/>Hakkımda</a>

            </div>
</div>
@stop