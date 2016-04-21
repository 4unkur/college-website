@extends('front.layouts.master')

@section('content')
    <div class="container">
        <div class="row nothing">
            <section class="col-md-10 main-content">
                @if (isset($user) && $user)
                <h2>{{ $user->first_name . ' ' . $user->last_name }}</h2>
                <p class="small-paragraph">
                    {{ $user->job }}
                </p>
                <hr>
                <figure>
                    {!! Html::image(url() . '/uploads/images/avatars/rect/' . $user->avatar, null, ['alt' => $user->fist_name . ' ' . $user->last_name]) !!}
                </figure>
                <br>
                <article>
                    {!! $user->bio !!}
                </article>
                @endif
            </section>
        </div>
    </div>
@stop