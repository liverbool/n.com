@extends('Main.Boilerplate')

@section('assets')

@parent

<meta name="title" content="{{ trans('main.meta title') }}">
<meta name="description" content="{{ trans('main.meta description') }}">

<meta name="keywords" content="{{ trans('main.meta keywords') }}">

@stop

@section('bodytag')
<body id="home-rows" class="nav-trans animate-nav">
@stop

@section('nav')
@include('Partials.HomeNavbar')
@stop

@section('content')

@include('Partials.Jumbotron')

<div class="home container push-footer-wrapper kk-fade-hide">

<div class="row ads-row">
    @if($ad = $options->getHomeJumboAd())
    {{ $ad }}
    @endif
</div>

<div class="yt-modal-box"></div>

@include('Partials.Response')

{{--in theaters now begins--}}

<section class="browse-grid panel panel-default panel-theaters">
    <div class="panel-heading">
        <h3 class="panel-title"><span><i class="fa fa-stop"></i>{{ trans('main.in theaters') }}</span>

            @if (Helpers::hasAccess('titles.update'))

            {{ Form::open(array('route' => 'titles.updatePlaying', 'class' => 'pull-right in-heading-form')) }}
            <button type="submit" class="btn btn-info btn-xs"><i class="fa fa-refresh"></i> {{ trans('dash.update') }}</button>
            {{ Form::close() }}

            @endif

        </h3>
    </div>

    <div class="panel-body">

        @foreach($playing->slice(0, 6) as $k => $movie)

        <figure class="col-sm-2">
            <div class="img-container">
                <a href="{{ Helpers::url($movie['title'], $movie['id'], $movie['type']) }}">
                    <img src="{{{ asset($movie['poster']) }}}" class="img-responsive" alt="{{ 'Poster of ' . $movie['title'] }}">
                </a>

                <figcaption>
                    <a href="{{ Helpers::url($movie['title'], $movie['id'], $movie['type']) }}">{{{ $movie['title'] }}}</a> <br>
                </figcaption>
            </div>
        </figure>

        @endforeach
    </div>

</section>

@if (isset($upcoming) && ! $upcoming->isEmpty())

<section class="browse-grid panel panel-default panel-upcoming">
    <div class="panel-heading">
        <h3 class="panel-title"><span><i class="fa fa-stop"></i>{{ trans('main.upcoming') }}</span></h3>
    </div>

    <div class="panel-body">
        @foreach($upcoming as $k => $movie)

        <figure class="col-sm-2">
            <div class="img-container">
            <a href="{{ Helpers::url($movie['title'], $movie['id'], $movie['type']) }}">
                <img src="{{{ asset($movie['poster']) }}}" class="img-responsive" alt="{{ 'Poster of ' . $movie['title'] }}">
            </a>

            <figcaption>
                <a href="{{ Helpers::url($movie['title'], $movie['id'], $movie['type']) }}">{{{ $movie['title'] }}}</a> <br>
            </figcaption>
        </div>
        </figure>

        @endforeach
    </div>
</section>

@endif

@if (isset($latests) && ! $latests->isEmpty())
@include('Main.Lastests')
@endif

@if (isset($actors) && ! $actors->isEmpty())

<section class="browse-grid panel panel-default panel-actors">

    <div class="panel-heading">
        <h3 class="panel-title"><span><i class="fa fa-stop"></i>{{ trans('main.popular actors') }}</span></h3>
    </div>

    <div class="panel-body">
        @foreach($actors as $k => $v)

        <figure class="col-sm-2">
            <div class="img-container">
            <a href="{{ Helpers::url($v['name'], $v['id'], 'people') }}">
                <img src="{{{ asset($v['image']) }}}" class="img-responsive" alt="{{ 'Poster of ' . $v['name'] }}">
            </a>

            <figcaption>
                <a href="{{ Helpers::url($v['name'], $v['id'], 'people') }}">{{{ $v['name'] }}}</a> <br>
            </figcaption>
        </div>
        </figure>

        @endforeach
    </div>

</section>

@endif

<div class="row">
    <div class="col-sm-7">
        <div class="panel panel-default panel-news">
            <div class="panel-heading">
                <h3 class="panel-title"><span><i class="fa fa-stop"></i>{{ trans('main.latest news') }}</span></h3>
            </div>

            <div class="panel-body">
                @foreach($news->slice(0,6) as $k => $n)

                @if ($k == 3)

                @if($ad = $options->getHomeNewsAd())
                <div class="ads-row">{{ $ad }}</div>
                @endif

                @endif

                <div class="media">
                    @if ($options->scrapeNewsFully())
                    <a class="pull-left hidden-xs" href="{{{ Helpers::url($n->title, $n->id, 'news') }}}">
                        <img style="max-width:235px" class="media-object img-responsive" src="{{{ asset($n->image) }}}" alt="{{ 'Image of News Item' . $k }}">
                    </a>
                    @else
                    <a class="pull-left hidden-xs" href="{{{ $n->full_url ? $n->full_url : Helpers::url($n->title, $n->id, 'news') }}}">
                        <img style="max-width:235px" class="media-object img-responsive" src="{{{ asset($n->image) }}}" alt="{{ 'Image of News Item' . $k }}">
                    </a>
                    @endif

                    <div class="media-body">

                        @if ($options->scrapeNewsFully())
                        <h5 class="media-heading"><a href="{{{ Helpers::url($n->title, $n->id, 'news') }}}">{{{ $n['title'] }}}</a></h5>
                        @else
                        <h5 class="media-heading">
                            <a href="{{{ $n['full_url'] ? $n['full_url'] : Helpers::url($n->title, $n->id, 'news') }}}">{{{ $n['title'] }}}</a></h5>
                        @endif


                        <p class="home-news-body">

                            {{ Helpers::shrtString($n['body'], $options->getNewsExeLen()) }}

                        </p>

                         <span class="home-news-time pull-left"> {{ trans('main.from') }} {{{ $n['source'] ? $n['source'] : trans('main.brand') }}}
                           <span class="home-news-ago"><i class="fa fa-clock-o"></i>
                               {{ \Carbon\Carbon::createFromTimeStamp(strtotime($n['created_at']))->diffForHumans() }}
                           </span>

                           @if ($options->scrapeNewsFully())
                                <a href="{{{ Helpers::url($n->title, $n->id, 'news') }}}">{{ trans('main.read full article') }}
                                    <i class="fa fa-external-link"></i></a>
                           @else
                               <a href="{{{ $n['full_url'] ? $n['full_url'] : Helpers::url($n->title, $n->id, 'news') }}}">{{ trans('main.read full article') }}
                                   <i class="fa fa-external-link"></i></a>
                           @endif

                         </span>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>

    <div class="col-sm-5">

        <!--
        <div class="row ads-row">
            {{--PLACE YOUR AD CODE HERE--}}
        </div>
        -->

        @if (isset($facebook))
        <div class="panel panel-default panel-facebook">
            <div class="panel-heading">
                <h3 class="panel-title"><span><i class="fa fa-stop"></i>{{ trans('main.Find us on Facebook') }}</span>
                </h3>
            </div>
            <div class="panel-body">
                <iframe src="//www.facebook.com/plugins/likebox.php?href={{{ $facebook }}}&amp;width&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:290px;" allowTransparency="true"></iframe>
            </div>
        </div>

        @endif
    </div>
</div>
</div>

</div>

@stop

@section('scripts')

{{ HTML::script('assets/js/home-autocomplete.js') }}

@stop