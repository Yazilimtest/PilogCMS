@extends('frontend/_layout/layout')
@section('content')
{{ HTML::style('ckeditor/contents.css') }}
{{ HTML::style('assets/css/style.css') }}
{{ HTML::style('code_prettify/css/prettify.css') }}
{{ HTML::script('code_prettify/js/prettify.js') }}
<!-- +++++ Post +++++ -->
<div id="white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <p><img src="assets/img/user.png" width="50px" height="50px"> <ba>Stanley Stinson</ba></p>
                <p><bd>January 3, 2014</bd></p>
                <h4>An Image Post</h4>
                <h1 class="page-header">
                    <a>{{ HTML::image($post->image, $post->title,array('class'=>'feature','width'=>'640','height'=>'340')) }}</a></p>
                    </h4></a>
                </h1>                            {{ $post->body }}
                <br>

                <p><bt>Etiketler:   @foreach($post->tags as $tag)
                        <a href="{{ URL::route('dashboard.tag', array('tag'=>$tag->slug)) }}"><span class="label label-warning">{{ $tag->name }}</span></a>
                        @endforeach</bt></p>
                <hr>
                <p><a href="{{ url('/blog') }}"># Back</a></p>
            </div>

        </div><!-- /row -->
        </div><!-- /row -->
    </div> <!-- /container -->
</div><!-- /white -->

    <div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'newpostbox'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
        
</div>
<script type="text/javascript">
    !function ($) {
        $(function () {
            window.prettyPrint && prettyPrint()
        })
    }(window.jQuery)
</script>
@stop