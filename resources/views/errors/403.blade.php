@extends('front.layouts.master')

@section('content')
<style>
    .error-template {padding: 40px 15px;text-align: center;}
    .error-actions {margin-top:15px;margin-bottom:15px;}
    .error-actions .btn { margin-right:10px; }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>
                    403</h1>
                <h2>
                    {{ trans('p.oops') }}</h2>
                <div class="error-details">
                    {{ trans('p.forbidden') }}
                </div>
                <div class="error-actions">
                    <a href="{{ route('index') }}" class="btn btn-default"><span class="fa fa-home"></span> {{ trans('p.go_home') }}</a>
                    <a href="mailto:{{ \Setting::get('site_email') }}" class="btn btn-default"><span class="fa fa-envelope"></span> {{ trans('p.contact_support') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop