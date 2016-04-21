@extends('front.layouts.master')

@section('content')
<section class="recent-posts">
    <div class="container">
        <h2 class="text-center">{{ trans('p.news') }}</h2>
        <span class="text-center separator"></span>
        <div class="row no_padding">
            <div class="col-md-9">
                @if (count($news))
                    @foreach ($news as $entry)
                    <article>
                        @if ($entry)
                            {!! Html::image(url() . '/uploads/images/news/square/' . $entry->image, $entry->title, ['class' => 'pull-left img-responsive']) !!}
                        @endif
                        <div class="text">
                            <h3>{!! link_to_route('news.show', $entry->title, $entry->slug) !!}</h3>
                            <p class="small-paragraph">{{ $entry->created_at->diffForHumans() }}</p>
                            <p>{!! str_limit($entry->text, 100, '...') !!}</p>
                        </div>
                        <div class="clearfix"></div>
                    </article>
                    @endforeach
                @endif

                {!! $news->render() !!}
            </div>
            @include('front.news.block-recent')
        </div>
    </div>
</section>
@stop