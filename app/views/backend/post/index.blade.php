@extends('backend/_layout/layout')
@section('content')
<script type="text/javascript">
    $(document).ready(function () {

        $('#notification').show().delay(4000).fadeOut(700);

        // publish settings
        $(".publish").bind("click", function (e) {
            var id = $(this).attr('id');
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ url('/admin/post/" + id + "/toggle-publish/') }}",
                success: function (response) {
                    if (response['result'] == 'success') {
                        var imagePath = (response['changed'] == 1) ? "{{url('/')}}/assets/images/publish.png" : "{{url('/')}}/assets/images/not_publish.png";
                        $("#publish-image-" + id).attr('src', imagePath);
                    }
                },
                error: function () {
                    alert("error");
                }
            })
        });
    });
</script>
<div class="container">
    {{ Notification::showAll() }}
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Blog</h3>
        </div>
        <div class="panel-body">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ URL::route('admin.post.create') }}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;Yeni Yazı
                    </a>
                    <a href="{{ URL::route('admin.category.create') }}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;Yeni Kategori
                    </a>
                </div>
            </div>
            <br>
            <br>
            <br>
            @if($posts->count())
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Başlık</th>
                        <th>Yayınlanma Tarihi</th>
                        <th>Güncellenme Tarihi</th>
                        <th>Düzenle</th>
                        <th>Ayarlar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $posts as $post )
                    <tr>
                        <td> {{ link_to_route( 'admin.post.show', $post->title, $post->id, array( 'class' => 'btn btn-link btn-xs' )) }}</td>
                        <td>{{{ $post->created_at }}}</td>
                        <td>{{{ $post->updated_at }}}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#">
                                    Düzenle
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ URL::route('admin.post.show', array($post->id)) }}">
                                            <span class="glyphicon glyphicon-eye-open"></span>&nbsp;Show post
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::route('admin.post.edit', array($post->id)) }}">
                                            <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit post
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{ URL::route('admin.post.delete', array($post->id)) }}">
                                            <span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Delete post
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                        <td>
                        <a href="#" id="{{ $post->id }}" class="publish">
                            <img id="publish-image-{{ $post->id }}" src="{{url('/')}}/assets/images/{{ ($post->is_published) ? 'publish.png' : 'not_publish.png'  }}"/>
                        </a>
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
            {{ $posts->links() }}
        </ul>
    </div>
</div>
@stop