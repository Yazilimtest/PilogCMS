@extends('backend/_layout/layout')
@section('content')
{{ HTML::style('ckeditor/contents.css') }}
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ $post->title }}</h3>
        </div>
        <div class="panel-body">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ url('admin/post') }}"
                       class="btn btn-primary">
                        <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back
                    </a>
                </div>
            </div>
            <br>
            <br>
            <br>
            <table class="table table-striped">
                <tbody>

                <tr>
                    <td><strong>Title</strong></td>
                    <td>{{ $post->title }}</td>
                </tr>
                <tr>
                    <td><strong>Content</strong></td>
                    <td>{{ $post->body }}</td>
                </tr>
                    <td><strong>Date Created</strong></td>
                    <td>{{ $post->created_at }}</td>
                </tr>
                <tr>
                    <td><strong>Date Updated</strong></td>
                    <td>{{ $post->updated_at }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop