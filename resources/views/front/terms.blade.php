@extends('front.layouts.master')

@section('content')
    <div class="container">
        <div class="row nothing">
            <section class="col-md-9 main-content">
                <h2>{{ trans('p.terms_of_use') }}</h2>
                <p>
                    {{ Setting::get('terms') }}
                </p>
            </section>
            @include('front.news.block-random')
        </div>
    </div>
@stop