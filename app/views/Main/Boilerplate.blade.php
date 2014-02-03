<!DOCTYPE html>

@section('htmltag')
<html>
@show

<head>

    @section('title')

    <title>{{ trans('main.meta title') }}</title>

    @show

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @section('assets')

    <link rel="shortcut icon" href="{{{ asset('assets/images/kakkak16-2.png') }}}">

    {{ HTML::style('assets/ionicons/css/ionicons.css') }}
    {{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css') }}
    {{ HTML::style('//nangkakkak.github.io/cdn.nangkakkak.com/bootflat/css/bootflat.css') }}
    {{ HTML::style('//nangkakkak.github.io/cdn.nangkakkak.com/bootflat/css/bootflat-extensions.css') }}


    <!--
    {{ HTML::style('assets/css/bootstrap.css') }}
    -->
    {{ HTML::style('assets/css/style.css') }}
    <!--
    {{ HTML::style('assets/css/' . $options->getColorScheme() . '.css') }}
    -->

    @show
<style type="text/css">
    .kk-fade-hide {
        opacity: 0;
    }
    .kk-fade-show {
        opacity: 1;
        transition: opacity 1s ease-in-out;
        -moz-transition: opacity 1s ease-in-out;
        -webkit-transition: opacity 1s ease-in-out;
    }
</style>
</head>


@section('bodytag')

<body>

@show

@section('nav')

@include('Partials.Navbar')

@show

@yield('content')

@section('ads')

@if($ad = $options->getFooterAd())

<div class="row ads-row">{{ $ad }}</div>

@endif


@show

<footer>
    <section class="col-sm-10 hidden-xs">

    <div class="copyright"> {{ trans('main.copyright') }} <a class="brand" href="{{ url() }}">{{ trans('main.brand') }}</a>{{ Carbon\Carbon::now()->year }}</div>

    <div>
        <a href="{{ url('privacy') }}">{{ trans('main.privacy') }}</a> |
        <a href="{{ url('tos') }}">{{ trans('main.tos') }}</a> |
        <a href="{{ url('contact') }}">{{ trans('main.contact') }}</a>
    </div>
    </section>
    <div class="col-sm-2 home-social hidden-xs hidden-sm">

        <div id="twitter" data-url="{{ url() }}" data-text='{{ trans("main.meta description") }}' data-title="<i class='fa fa-twitter'></i>"></div>
        <div id="facebook" data-url="{{ url() }}" data-text='{{ trans("main.meta description") }}' data-title="<i class='fa fa-facebook'></i>"></div>
        <div id="pinterest" data-url="{{ url() }}" data-text='{{ trans("main.meta description") }}' data-title="<i class='fa fa-pinterest'></i>"></div>
        <div id="linkedin" data-url="{{ url() }}" data-text='{{ trans("main.meta description") }}' data-title="<i class='fa fa-linkedin'></i>"></div>

    </div>
</footer>
{{ HTML::script('assets/js/library.js') }}
{{ HTML::script('//nangkakkak.github.io/cdn.nangkakkak.com/bootflat/js/jquery.icheck.js') }}
{{ HTML::script('assets/js/script.min.js') }}

@yield('scripts')
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=184864731723977";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>