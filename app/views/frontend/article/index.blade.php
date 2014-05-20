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

<!-- +++++ First article +++++ -->
<div id="white">
    <div class="container">
        <div class="row">
            @foreach( $articles as $article )
            <div class="col-lg-8 col-lg-offset-2">
                <a href="{{ URL::route('dashboard.article.show', array('id'=>$article->id, 'slug'=>$article->slug)) }}">
                    <h4>{{ $article->title }}<span datetime="{{ $article->created_at }}" class="label label-default label-arrow label-arrow-left time"></span>

                    </h4></a>
              
                <p>{{{ mb_substr(strip_tags($article->body),0,75) }}}</p>                         <a href="{{ URL::route('dashboard.article.show', array('id'=>$article->id, 'slug'=>$article->slug)) }}" class="btn btn-xs btn-primary">Okumaya Devam Et..</a>

            </div>
            @endforeach


        </div>

    </div><!-- /row -->

</div>
<div class="container">
    <div class="row">
        <div class="pull-left">
            <ul class="pagination">
                {{ $articles->links() }}
            </ul>
        </div>
    </div>
</div>

@stop

