@extends('auth.master')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ route('index') }}">{{ Setting::get('site_name') }}</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">

        @include ('admin.errors.list')

        <p class="login-box-msg">{{ trans('p.login_please') }}</p>
        {!! Form::open(['url' => '/auth/login']) !!}
        <div class="form-group has-feedback">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="{{ trans('p.password') }}">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox"> {{ trans('p.remember_me') }}
                    </label>
                </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('p.sign_in') }}</button>
            </div><!-- /.col -->
        </div>
        {!! Form::close() !!}

        {{--<div class="social-auth-links text-center">--}}
            {{--<p>- OR -</p>--}}
            {{--<a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>--}}
            {{--<a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>--}}
        {{--</div><!-- /.social-auth-links -->--}}

        <a href="#">{{ trans('p.forgot_password') }}</a><br>
        {!! link_to('/auth/register', trans('p.registration'), ['class' => 'text-center']) !!}

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
@stop