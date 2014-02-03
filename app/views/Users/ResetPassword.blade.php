@extends('Main.Boilerplate')

@section('htmltag')
  <html id="forgot-pass-page">
@stop

@section('title')
  <title>{{ trans('users.forgot pass title') }}</title>
@stop

@section('bodytag')
  <html>
@stop

@section('content')

  <div class="container push-footer-wrapper">
    <div class="col-sm-2"></div>

    <div class="col-sm-8 panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-envelope-o"></i></span> {{ trans( 'users.forgot password' ) }} </h3>
        </div>

        <div class="panel-body">
         
          @include('Partials.Response')

          {{ Form::open(array('url' => '/forgot-password')) }}

          <div class="form-group">
            {{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
            {{ $errors->first('email', "<span class='help-block alert alert-danger'>:message</span>") }}
          </div>

          <button type="submit" class="btn btn-danger pull-right">{{ trans('users.confirm') }}</button>

          {{ Form::close() }}

        </div>
    </div>
    <div class="col-sm-2"></div>
  </div>
@stop

@section('ads')
@stop