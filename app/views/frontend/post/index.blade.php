@extends('frontend/_layout/layout')
@section('content')
{{ HTML::script('assets/js/moment-with-langs.min.js') }}
<script type="text/javascript">
    moment().format();
    moment.lang('en');

    jQuery(document).ready(function ($) {
        var now = moment();
        $('.time').each(function (i, e) {

            var time = moment($(e).attr('datetime'));
            $(e).text(time.from(now));

        });

    });
</script>

<!-- +++++ First Post +++++ -->
<div id="white">
    <div class="container">
        <div class="row">
            @foreach( $posts as $post )
            <div class="col-lg-8 col-lg-offset-2">
                <a href="{{ URL::route('dashboard.post.show', array('id'=>$post->id, 'slug'=>$post->slug)) }}">
                    <h4>{{ $post->title }}<span datetime="{{ $post->created_at }}" class="label label-default label-arrow label-arrow-left time"></span>

                        </h4></a>
                <a href="{{ URL::route('dashboard.post.show', array('id'=>$post->id, 'slug'=>$post->slug)) }}">{{ HTML::image($post->image, $post->title, array('class'=>'feature','width'=>'530','height'=>'337')) }}</a>
                <p>{{{ mb_substr(strip_tags($post->body),0,400) }}}</p>                         <a href="{{ URL::route('dashboard.post.show', array('id'=>$post->id, 'slug'=>$post->slug)) }}" class="btn btn-xs btn-primary">Okumaya Devam Et..</a>

            </div>
            @endforeach

        </div>

        </div><!-- /row -->

    </div>
<div class="container">
    <div class="row">
        <div class="pull-left">
            <ul class="pagination">
                {{ $posts->links() }}
            </ul>
        </div>
    </div>
</div>

@stop

