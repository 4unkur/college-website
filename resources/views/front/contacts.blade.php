@extends('front.layouts.master')

@section('content')
    <div class="container">
        <div class="row nothing">
            <section class="col-md-9 main-content">
                <h2>{{ trans('p.contacts') }}</h2>
                <ul>
                    <li>{{ Setting::get('location') }}</li>
                    <li>{{ Setting::get('site_phone') }}</li>
                    <li>{{ Setting::get('site_email') }}</li>
                </ul>
            </section>
            @include('front.news.block-random')
        </div>
    </div>
@stop