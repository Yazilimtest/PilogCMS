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
                type: "article",
                url: "{{ url('/admin/article/" + id + "/toggle-publish/') }}",
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
            <h3 class="panel-title">Ders Yazıları</h3>
        </div>
        <div class="panel-body">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ URL::route('admin.article.create') }}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;Yeni Yazı
                    </a>
                    <a href="{{ URL::route('admin.ders.create') }}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;Yeni Ders
                    </a>
                </div>
            </div>
            <br>
            <br>
            <br>
            @if($articles->count())
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Başlık</th>
                        <th>Yayınlanma Tarihi</th>
                        <th>Güncellenme Tarihi</th>
                        <th>Düzenle</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $articles as $article )
                    <tr>
                        <td> {{ link_to_route( 'admin.article.show', $article->title, $article->id, array( 'class' => 'btn btn-link btn-xs' )) }}</td>
                        <td>{{{ $article->created_at }}}</td>
                        <td>{{{ $article->updated_at }}}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#">
                                    Düzenle
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ URL::route('admin.article.show', array($article->id)) }}">
                                            <span class="glyphicon glyphicon-eye-open"></span>&nbsp;Yazıyı Göster
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::route('admin.article.edit', array($article->id)) }}">
                                            <span class="glyphicon glyphicon-edit"></span>&nbsp;Yazıyı Düzenle
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{ URL::route('admin.article.delete', array($article->id)) }}">
                                            <span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Yazıyı Sil
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
td>
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
            {{ $articles->links() }}
        </ul>
    </div>
</div>
@stop