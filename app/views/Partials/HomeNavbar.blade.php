<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="navbar-inside">
        <div class="container">
            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand kkf-kakkak" href="{{ route('home') }}" title="{{ trans('main.brand') }}"></a>
            </div>

            {{ Form::open(array('url' => 'search', 'method' => 'GET', 'class' => 'navbar-form navbar-left')) }}

                <div class="form-group form-search">
                    {{ Form::text('q', null, array('id' => 'auto-complete', 'class' => 'form-control search-query search-bar', 'placeholder' => trans('main.search placeholder'), 'data-url' => url('typeahead'))) }}
                </div>
                <button class="btn" type="submit"><i class="fa fa-search"></i></button>

            {{ Form::close() }}

            <div class="collapse navbar-collapse navbar-ex1-collapse">

                @if(Sentry::check())

                <ul class="nav navbar-nav navbar-right logged-in-box hidden-xs">
                    <li>
                        <a class="no-pad" href="{{ Helpers::profileUrl() }}"><img class="small-avatar" src="{{ Helpers::smallAvatar() }}" alt="" class="img-responsive"></a>
                    </li>
                    <li><a class="logged-box-text" href="{{ Helpers::profileUrl() }}">{{ trans('main.hello') }},<br><span>{{{ Helpers::loggedInUser()->first_name ? Helpers::loggedInUser()->first_name : Helpers::loggedInUser()->username }}}</span></a></li>
                    <li><a class="logout" title="{{ trans('main.logout') }}" href="{{ action('SessionController@logOut') }}"><i class="ion-log-out"></i> </a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right visible-xs logged-in-box">
                    <li><a href="{{ Helpers::profileUrl() }}">{{ trans('users.profile') }}</a></li>
                </ul>

                @endif

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url(Str::slug(trans('main.movies'))) }}"><i class="ion-social-youtube-outline"></i> {{ trans('main.movies') }}</a></li>
                    <li><a href="{{ url(Str::slug(trans('main.series'))) }}"><i class="ion-android-playstore"></i> {{ trans('main.series') }}</a></li>
                    <li><a href="{{ url(Str::slug(trans('main.news'))) }}"><i class="ion-speakerphone"></i> {{ trans('main.news') }}</a></li>
                    <li><a href="{{ url(Str::slug(trans('main.people'))) }}"><i class="ion-android-social"></i> {{ trans('main.people') }}</a></li>

                    @if(Helpers::hasSuperAccess())
                    <li><a href="{{ url('dashboard') }}"><i class="ion-android-settings"></i>{{ trans('main.dashboard') }}</a></li>
                    @endif

                    @if( ! Sentry::check())
                    <li><a href="{{ url('register') }}"><i class="ion-person-add"></i> {{ trans('main.register') }}</a></li>
                    <li><a href="{{ url('login') }} "><i class="ion-wineglass"></i> {{ trans('main.login') }}</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="navbar-brand-text hidden-xs"><a class="brand" href="{{ url() }}"><i class="kkf-kakkak"></i> <span>{{ trans('main.brand') }}</span></a></div>
<div class="navbar-share"><div id="sharrre" data-url="http://www.nangkakkak.com" data-text="http://www.nangkakkak.com" data-title="แชร์เลย"></div></div>