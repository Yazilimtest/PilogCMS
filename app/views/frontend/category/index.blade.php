@extends('frontend/_layout/layout')
@section('content')
{{ HTML::script('assets/js/moment-with-langs.min.js') }}
<script type="text/javascript">
    moment().format();
    moment.lang('en');

    jQuery(document).ready(function($){
        var now = moment();
        $('.time').each(function(i, e) {

            var time = moment($(e).attr('datetime'));
            $(e).text(time.from(now));

        });

    });
</script>
<div class="container">
      <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Category</h1>
        </div>
    </div>
    <div class="col-md-11">

        <div class="row">

        @foreach( $articles as $article )
        <div class="row">
            <div class="col-sm-12">
                	<h4>{{ $article->title }}<span datetime="{{ $article->created_at }}" class="label label-default label-arrow label-arrow-left time">Admin</span></h4>
                <hr>
            </div>
            <div class="col-sm-2">
                <img src="//placehold.it/75x75" class="img-circle center-block">
            </div>
            <div class="col-sm-10">
                <p>{{{ mb_substr(strip_tags($article->description),0,600) }}}</p>
                <div class="pull-right">
                    @foreach($article->tags as $tag)
                     <a href="{{ URL::route('dashboard.tag', array('tag'=>$tag->name)) }}"><span class="label label-warning">{{ $tag->name }}</span></a>
                    @endforeach
                </div>
                <p>
                      <a href="{{ URL::route('dashboard.article.show', array('id'=>$article->id, 'slug'=>$article->slug)) }}" class="btn btn-xs btn-primary">Read More</a>
                </p>
            </div>
        </div>
        <hr>
        @endforeach

    </div>
        </div>
        <div class="pull-left">
        <ul class="pagination">
            {{ $articles->links() }}
        </ul>
    </div>
</div>

@stop

