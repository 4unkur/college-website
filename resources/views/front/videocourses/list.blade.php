@extends('front.layouts.master')

@section('content')
    <section class="recent-posts">
        <div class="container">
            <h2 class="text-center">{{ trans('p.videocourses') }}</h2>
            <span class="text-center separator"></span>
            <p class="small-paragraph text-center"></p>
            <div class="row no_padding">
                <div class="col-md-9">
                    @if (count($videocourses))
                        @foreach ($videocourses as $videocourse)
                            <article>
                                    <img src="http://img.youtube.com/vi/{{ $videocourse->video }}/hqdefault.jpg" alt="{{ $videocourse->title }}" class="pull-left img-responsive">
                                <div class="text">
                                    <h3><a href="{{ route('videocourse.show', [$videocourse->slug]) }}">{{ $videocourse->title }}</a></h3>
                                    <p class="small-paragraph">{{ $videocourse->created_at }}</p>
                                    <p>{{ str_limit(strip_tags($videocourse->description), 100) }}</p>
                                </div>
                                <div class="clearfix"></div>
                            </article>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

@stop