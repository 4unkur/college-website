@extends('front.layouts.master')

@section('content')
<div class="container">
    <div class="row nothing">
        <section class="col-md-9 main-content">
            <h2>{{ $news->title }}</h2>
            <figure>
                @if ($news->image)
                    {!! Html::image(url() . '/uploads/images/news/rect/' . $news->image, $news->title) !!}
                @endif
            </figure>
            <br>
            <article class="text">
                {!! $news->text !!}
            </article>
        </section>
        @include('front.news.block-recent')
    </div>
</div>
@stop