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
<div class="container">
    <div class="row ads-row">{{ $ad }}</div>
</div>
@endif


@show

<footer>
    <div class="container">
        <section class="col-sm-10 hidden-xs">

        <div class="copyright"> {{ trans('main.copyright') }} <a class="brand" href="{{ url() }}">{{ trans('main.brand') }}</a>{{ Carbon\Carbon::now()->year }}</div>

        <div>
            <a href="{{ url('privacy') }}">{{ trans('main.privacy') }}</a> |
            <a href="{{ url('tos') }}">{{ trans('main.tos') }}</a> |
            <a href="{{ url('contact') }}">{{ trans('main.contact') }}</a>
        </div>
        </section>

        <section class="col-sm-2 home-social hidden-xs hidden-sm">

            @include('Main.Socials')

        </section>
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