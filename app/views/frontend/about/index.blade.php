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
<div class="container">
    </br>
    </br>
    </br>
<!-- +++++ First Post +++++ -->
<div id="white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                    <h4>{{ $about->title }}
                        <img src="/stanley/assets/img/user.png" alt="Stanley">

                    </h4></a>
                <a></a>Body</a>
                <p>{{ $about->body }}</p>

            </div>

        </div>

    </div><!-- /row -->

</div>

</div>
@stop

