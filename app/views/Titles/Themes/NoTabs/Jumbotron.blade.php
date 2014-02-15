<section class="jumbotron title" style="background-image: url({{{ asset($data->getBackground()) }}})">
  <div class="transparent">
    <div class="container">
    <section class="row title-jumbo-row">
      <a href="{{ Helpers::url($data->getTitle(), $data->getId(), $data->getType()) }}" class="col-sm-2 hidden-xs hidden-sm title-poster"><img class="img-responsive" src="{{{ asset($data->getPoster()) }}}" alt="{{{ $data->getTitle() }}}"></a>
      <div class="col-sm-12 col-md-10">
        <div class="row"><h1 class="title-title"><a href="{{ Helpers::url($data->getTitle(), $data->getId(), $data->getType()) }}">{{{ $data->getTitle() }}}</a></h1></div>
        <div class="row title-info">

          @if ($data->getRuntime())
            <span>{{ $data->getRuntime() . ' ' . trans('main.min')}}</span> - 
          @endif

          @if ($data->getGenre())
            <span>{{ $data->getGenre() }}</span> -
          @endif

           @if ($data->getReleasedate())
            <span>{{ $data->getReleasedate() }}</span>
          @endif
          
        </div>

        <div class="row">
          <button type="button" class="btn btn-danger" data-trailer="{{{ $data->getTrailer() }}}">
            <span><i class="fa fa-toggle-right"></i> {{ trans('main.play movie') }}</span>
          </button>
          <button type="button" class="btn btn-info trailer-trigger" data-trailer="{{{ $data->getTrailer() }}}">
            <span><i class="fa fa-youtube-play"></i> {{ trans('main.play trailer') }}</span>
          </button>
          <a type="button" href="{{{ $data->getBuyLink() }}}" class="btn btn-info">
            <span><i class="fa fa-credit-card"></i> {{ trans('main.buy now') }}</span>
          </a>

          @if ( Helpers::hasAccess('titles.edit') )

            <a href="{{ Helpers::url($data->getTitle(), $data->getid(), $data->getType()) . '/edit' }}" type="button" class="btn trans-button">
              <span><i class="fa fa-edit"></i> {{ trans('main.edit') }}</span>
            </a>

          @endif

          <div class="title-list-btns">
            @include('Partials.TitleListButtons')
          </div>
         
        </div>

        <div class="row title-social">
            @include('Main.Socials')
        </div>

        <div class="row title-plot">
              {{{ $data->getPlot() }}}
        </div>

        <div class="row no-mar-right" id="title-votes-row">
            <div class="col-sm-12 title-seasons">
                            
              @if ($data->getType() == 'series')

                <span>{{ trans('main.seasons') }} :</span>

                <div class="btn-group">

                @foreach ($data->getSeasons() as $v)

                  @if ($v->number == Request::segment(4))

                    <a class="btn btn-info btn-sm active" href="{{ Helpers::season($data->getTitle(), $v) }}">{{{ $v->number }}}</a>

                  @else

                    <a class="btn btn-info btn-sm" href="{{ Helpers::season($data->getTitle(), $v) }}">{{{ $v->number }}}</a>

                  @endif

                @endforeach
                </div>

                  @if (Helpers::hasAccess('titles.create'))

                    <a class="btn btn-primary btn-sm title-new-s" href="{{ Helpers::url($data->getTitle(), $data->getId(), 'series') . '/seasons/create'}}"><i class="fa fa-plus"></i> {{ trans('main.new') }}</a>

                  @endif

              @endif
            </div>

            @if ($data->getRating())

              <div class="col-sm-3 title-vote-bar">
                <section class="title-vote-text">
                  @if($data->getImdbRating())
                    <div>{{ 'IMDb - ' . "<strong>{$data->getImdbRating()}</strong>" . '/10'}}</div>
                  @endif

                  @if($data->getMcRating())
                    <div >{{ 'Metacritic - ' . "<strong>{$data->getMcRating()}</strong>" . '/10' }}</div>
                  @endif

                   @if($data->getTmdbRating())
                    <div class="hidden-sm hidden-xs">{{ 'TMDB - ' . "<strong>{$data->getTmdbRating()}</strong>" . '/10'}}</div>
                   @endif                 
                </section>

              <div class="progress hidden-xs">
                  <div class="progress-bar progress-bar-{{{ $data->getVoteBarColor() }}}" role="votebar" style="width: {{{ $data->getRating() }}}"></div>
                </div>
              </div>

            @endif
        </div>
      </div>

    </section>
  </div>
  </div>
</section>