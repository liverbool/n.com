{{--Cast column begins--}}
<section class="col-sm-4 col-md-3">
 <div class="title-actors-header"><span class="text-border-top"><i class="fa fa-stop"></i> {{ trans('main.cast') }}</span>
  
    @if (Helpers::hasAccess('titles.edit'))

      <a href="{{ Request::fullUrl() . '/edit-cast' }}" type="button" class="pull-right btn btn-info btn-xs"><i class="fa fa-edit"></i> {{ trans('main.edit') }}</a>

    @endif

  </div>

 <section class="cast-grid">

    @foreach($data->getCast() as $k => $actor)

      <figure class="col-xs-6 title-actors-image" data-order="{{{ $k }}}">

        <div class="img-container">
          
          <a href="{{{ Helpers::url($actor['name'], $actor['id'], 'people') }}}">
            <img src="{{{ asset($actor['image']) }}}" class="img-responsive" alt="{{ 'Picture of ' . $actor['name'] }}">
          </a>         
          
          <figcaption>
            <a href="{{{ Helpers::url($actor['name'], $actor['id'], 'people') }}}">{{{ $actor['name'] }}}</a> <br>

              {{{ $actor['pivot']['char_name'] }}}

          </figcaption>

        </div>

      </figure> 

    @endforeach

  </section>
</section>
{{--Cast column ends--}}

{{--critic review column--}}
<section class="col-sm-8 col-md-5">

    @include('Titles.Themes.NoTabs.facebookComment')

  <div class="bordered-heading"><span class="text-border-top"><i class="fa fa-thumbs-o-down"></i> {{ trans('main.critic reviews') }}</span>
  
    @if (Helpers::hasAccess('reviews.update'))

      {{ Form::open(array('url' => 'private/update-reviews', 'class' => 'pull-right')) }}
        {{ Form::hidden('id', $data->getId()) }}
      <button type = "submit" title="{{ trans('dash.delete') }}" class="btn btn-info btn-xs"><i class="fa fa-refresh"></i> {{ trans('main.update') }}</button>
      {{ Form::close() }}

    @endif

  </div>
    @if ($data->getCriticReviews())

      @foreach(array_slice($data->getCriticReviews(), 0, 10) as $k => $r)

       @if ($k == 4)
        @if($ad = $options->getTitleCriticAd())
            <div class="row ads-row">{{ $ad }}</div>
            <hr>
        @endif
       @endif

        <div class="row review-info">
          <span class="review-score"><span>{{{ $r['score'] }}}</span></span> {{ trans('main.by') }} 

          @if ($r['author'])
            <strong>{{{ $r['author'] }}}</strong> - 
          @endif

          <strong>{{{ $r['source'] }}}</strong>
        </div>

        <p class="review-body">{{{ $r['body'] }}}</p>

        <p class="row review-full">
          <a target="_blank" href="{{{ $r['link'] }}}">{{ trans('main.full review') }} <i class="icon-share-alt"></i></a>
          
          @if(Helpers::hasAccess('reviews.delete'))

            {{ Form::open(array('url' => Request::url() . '/reviews/' . $r['id'], 'class' => 'trash-ico-critic', 'method' => 'delete')) }}
              {{ Form::hidden('id', $data->getId()) }}
              <button type = "submit" title="{{ trans('dash.delete') }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> </button>
            {{ Form::close() }}

          @endif

        </p>

        <hr> 

      @endforeach
    @else
      <strong>{{ trans('main.no critic reviews') }}</strong>
    @endif
</section>
{{--critic review column ends--}}

{{--user reviews column--}}
<section class="col-sm-4">

  <div class="bordered-heading hidden-sm">
    <span class="text-border-top"> <i class="fa fa-thumbs-o-up"></i> {{ trans('main.user reviews') }}</span>

    {{--display modal button if user review found--}}
    @if ( $data->getUserReviews())

      <a href="#" type="button" data-toggle="modal" data-target="#review-modal" class="pull-right btn btn-info btn-xs"><i class="fa fa-pencil"></i> {{ trans('main.write one') }}</a>

      @include('Titles.Partials.FormModal')

    @endif
    
  </div>

  {{--display form if no user reviews found--}}
  @if ( ! $data->getUserReviews() )

   <div class="hidden-sm"> @include('Titles.Partials.ReviewForm') </div> 

  {{--if found review display them and pop up modal with form--}}  
  @else

      @foreach(array_slice($data->getUserReviews(), 0, 10) as $r)

         @if ($k == 4)
          @if($ad = $options->getTitleUserAd())
              <div class="row ads-row">{{ $ad }}</div>
              <hr>
          @endif
         @endif

        <div class="row review-info">
          <span class="review-score">{{{ $r['score'] . '0' }}}</span> {{ trans('main.by') }} <strong>{{{ $r['author'] }}}</strong> - <strong>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($r['created_at']))->diffForHumans() }}</strong>

          {{--delete review button--}}
          @if ( ! Helpers::hasAccess('reviews.delete'))

            {{ Form::open(array('url' => Request::url() . '/reviews/' . $r['id'], 'class' => 'trash-ico-user', 'method' => 'delete')) }}

              {{ Form::hidden('id', $data->getId()) }}

              <button type = "submit" title="{{ trans('dash.delete') }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> </button>

            {{ Form::close() }}

          @endif

        </div> 

        <p class="review-body">{{{ $r['body'] }}}</p>
      
        <hr> 

    @endforeach

  @endif

</section>

@section('scripts')

{{ HTML::script('assets/js/masonry.pkgd.min.js') }}
<script>
    var $container = $('.cast-grid');
    // initialize
    $container.masonry({
        //columnWidth: 200,
        itemSelector: '.title-actors-image'
    });
</script>

@stop