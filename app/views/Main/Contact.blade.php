@extends('Main.Boilerplate')

@section('bodytag')
	<body id="contact">
@stop

@section('content')

    <div class="container push-footer-wrapper">

    	<div class="col-sm-3"></div>

		<div class="col-sm-6 contact-container">
			
			@include('Partials.Response')

			<h2>{{ trans('main.contact') }}</h2>

			<div class="help-block">{{ trans('main.To contact us use the form below') }}</div>

			{{ Form::open(array('route' => 'submit.contact')) }}

            <div class="form-group">
				{{ Form::label('name', trans('main.name')) }} <span class="req">*</span>
				{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
				{{ $errors->first('name', '<span class="help-block alert alert-danger">:message</span>') }}
                </div>

            <div class="form-group">
				{{ Form::label('email', trans('main.email')) }} <span class="req">*</span>
				{{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
				{{ $errors->first('email', '<span class="help-block alert alert-danger">:message</span>') }}
                </div>

            <div class="form-group">
				{{ Form::label('comment', trans('main.contact messages')) }} <span class="req">*</span>
				{{ Form::textarea('comment', Input::old('comment'), array('class' => 'form-control', 'rows' => 5)) }}
				{{ $errors->first('comment', '<span class="help-block alert alert-danger">:message</span>') }}
                </div>
            <div class="form-group">
				{{ Form::label('human', trans('main.are you human')) }} <span class="req">*</span>

				<div class="row">
					<div class="col-sm-3 human">
						{{{ $one }}} + {{{ $two }}}
					</div>
					<div class="col-sm-3">
						{{ Form::text('human', Input::old('human'), array('class' => 'form-control input-sm')) }}
					</div>
				</div>
				</div>


				{{ Form::submit(trans('main.Submit'), array('class' => 'btn btn-success')) }}

    		{{ Form::close() }}

		</div>

    	<div class="col-sm-3"></div>

    </div>

@stop


