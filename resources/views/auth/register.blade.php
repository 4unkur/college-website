@extends('auth.master')

@section('content')
<div class="register-box">
    <div class="register-logo">
        <a href="{{ route('index') }}">{{ Setting::get('site_name') }}</a>
    </div>

    <div class="register-box-body">
        @include ('admin.errors.list')
        <p class="login-box-msg">{{ trans('p.register_new') }}</p>
        {!! Form::open(['url' => 'auth/register', 'method' => 'post']) !!}
            <div class="form-group has-feedback">
                <input type="text" name="first_name" class="form-control" placeholder="{{ trans('p.first_name') }}">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="last_name" class="form-control" placeholder="{{ trans('p.last_name') }}">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="{{ trans('p.password') }}">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password_confirmation" class="form-control" placeholder="{{ trans('p.repeat_password') }}">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <p><input type="checkbox"> {!! trans('p.terms_agreement', ['url' => route('terms')]) !!}</p>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('p.register') }}</button>
                </div><!-- /.col -->
            </div>
        {!! Form::close() !!}
        {!! link_to('auth/login', trans('p.sign_in'), ['class' => 'text-center']) !!}
    </div><!-- /.form-box -->
</div><!-- /.register-box -->
@stop