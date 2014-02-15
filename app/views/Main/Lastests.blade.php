<section class="browse-grid panel panel-default panel-latests">
    <div class="panel-heading">
        <h3 class="panel-title"><span><i class="fa fa-stop"></i>{{ trans('main.latests') }}</span></h3>
    </div>

    <div class="panel-body">

    @foreach($latests as $k => $r)

    <figure class="col-sm-3 col-lg-2 col-xs-6" ontouchstart="this.classList.toggle('hover');">
        <div class="img-container">
            <a class="flip-container-vertical" href="{{Helpers::url($r['title'], $r['id'], $r['type'])}}">
                <div class="flipper">
                    <img class ="img-responsive flip-front" src="{{str_replace('w185', 'w342', $r->poster) }}" alt="{{{ $r['title'] }}}">
                    <div class="flip-back">
                        <h5>{{ $r['title'] }}</h5>
                    </div>
                </div>
            </a>

            <figcaption title="{{{ $r->title }}}" >
                <a href="{{Helpers::url($r['title'], $r['id'], $r['type'])}}"> {{  Helpers::shrtString($r['title']) }} </a>

                <section class="row action-buttons">

                    @include('Partials.AddToListButtons')


                    @if ($r['mc_critic_score'])
                    <span class="pull-right">{{ substr($r['mc_critic_score'], 0, -1) . '/10' }}</span>
                    @elseif ($r['imdb_rating'])
                    <span class="pull-right">{{ ! str_contains($r['imdb_rating'], '.') ? $r['imdb_rating'] . '.0' : $r['imdb_rating'] . '/10'}} </span>
                    @elseif ($r['tmdb_rating'])
                    <span class="pull-right">{{ ! str_contains($r['tmdb_rating'], '.') ? $r['tmdb_rating'] . '.0' : $r['tmdb_rating'] . '/10'}}</span>
                    @endif

                </section>

            </figcaption>
        </div>
    </figure>

    @endforeach

</div>

</section>