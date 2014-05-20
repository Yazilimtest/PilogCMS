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
            <h1 class="page-header">Tags</h1>
        </div>
    </div>
    <div class="col-md-11">

        <div class="row">

        @foreach( $posts as $post )
        <div class="row">
            <div class="col-sm-12">
                	<h4>{{ $post->title }}<span datetime="{{ $post->created_at }}" class="label label-default label-arrow label-arrow-left time">Admin</span></h4>
                <hr>
            </div>
            <div class="col-sm-2">
            </div>
            <div class="col-sm-10">
                <p>{{{ mb_substr(strip_tags($post->body),0,600) }}}</p>
                <div class="pull-right">
                    @foreach($post->tags as $tag)
                     <a href="{{ URL::route('dashboard.tag', array('tag'=>$tag->name)) }}"><span class="label label-warning">{{ $tag->name }}</span></a>
                    @endforeach
                </div>
                <p>
                      <a href="{{ URL::route('dashboard.post.show', array('id'=>$post->id, 'slug'=>$post->slug)) }}" class="btn btn-default">Read More</a>
                </p>
            </div>
        </div>
        <hr>
        @endforeach

    </div>
        </div>
        <div class="pull-left">
        <ul class="pagination">
            {{ $posts->links() }}
        </ul>
    </div>
</div>

@stop

