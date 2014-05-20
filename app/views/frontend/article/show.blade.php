@extends('frontend/_layout/layout')
@section('content')
{{ HTML::style('ckeditor/contents.css') }}
{{ HTML::style('assets/css/style.css') }}
{{ HTML::style('code_prettify/css/prettify.css') }}
{{ HTML::script('code_prettify/js/prettify.js') }}
<!-- +++++ article +++++ -->
<div id="white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                </h4>Ders İçeriği</h4>

                <h1 class="page-header">


                </h1>     {{ $article->body }}
                <br>


                <hr>
                <p><a href="{{ url('/article') }}"># Geri</a></p>
            </div>

        </div><!-- /row -->
    </div><!-- /row -->
</div> <!-- /container -->
</div><!-- /white -->

</div>
<script type="text/javascript">
    !function ($) {
        $(function () {
            window.prettyPrint && prettyPrint()
        })
    }(window.jQuery)
</script>
@stop