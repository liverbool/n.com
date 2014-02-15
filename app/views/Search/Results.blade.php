@extends('Main.Boilerplate')

@section('bodytag')
<body class="padding nav search-page">
@stop

@section('nav')
  @include('Partials.Navbar')
@stop

@section('content')

<div class="container search-container">

	<div class="row well search-well">

		<div class="col-xs-6">
			<p><i class="fa fa-search"></i> {{ trans('main.top matches for') }} <strong>{{{ $term }}}</strong></p>
		</div>

    	<div class="col-xs-6 hidden-xs">
			<div class="btn-group pull-right">
			    <a id="trigger" href="#movies" class="btn" data-toggle="tab"><i class="ion-social-youtube-outline"></i><span class="hidden-xs">{{ trans('main.movies') }}</span></a>
			    <a id="trigger2" href="#series" class="btn" data-toggle="tab"><i class="ion-android-playstore"></i><span class="hidden-xs">{{ trans('main.series') }}</span></a>
			    <a id="trigger3" href="#people" class="btn" data-toggle="tab"><i class="ion-android-social"></i><span class="hidden-xs">{{ trans('main.people') }}</span></a>
			    <a href="#news" class="btn" data-toggle="tab"><i class="ion-speakerphone"></i><span class="hidden-xs">{{ trans('main.news') }}</span></a>
			  </div>
		 </div>

	</div>

    <div class="row"> @include('Partials.Response') </div>

		<div class="tab-content">
	      <div class="tab-pane fade in active" id="movies">
	       	@include('Search.MoviesGrid')
	      </div>

	      <div class="tab-pane fade" id="series">
	       @include('Search.SeriesGrid')
	      </div>

	      <div class="tab-pane fade" id="people">
	        @include('Search.PeopleGrid')
	      </div>

	      <div class="tab-pane fade" id="news">
	        @include('Search.NewsResults')
	      </div>
	    </div>

	</div>

@stop
