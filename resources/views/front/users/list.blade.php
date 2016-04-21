@extends('front.layouts.master')

@section('content')
    <section class="recent-posts">
        <div class="container">
            <h2 class="text-center">{{ trans('p.users') }}</h2>
            <span class="text-center separator"></span>
            <p class="small-paragraph text-center"></p>
            <div class="row no_padding">
                <div class="col-md-9">
                    @if (count($users))
                        @foreach ($users as $user)
                            <article>
                                    <img src="{{ url('uploads/images/avatars/square') . '/' . $user->avatar }}" alt="{{ $user->first_name . ' ' . $user->last_name }}" class="pull-left img-responsive">
                                <div class="text">
                                    <h3><a href="{{ route('user.show', [$user->slug]) }}">{{ $user->first_name . ' ' . $user->last_name }}</a></h3>
                                    <p class="small-paragraph">{{ $user->job }}</p>
                                    <p>{{ str_limit(strip_tags($user->bio), 100) }}</p>
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