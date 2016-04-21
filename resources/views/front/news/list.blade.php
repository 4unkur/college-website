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

            {{-- TODO: separate this to block, show popular news --}}
            <div class="col-md-3">
                <div class="icon-item"> <img src="images/content__images/small_post1.jpg" alt="small-post-img" class="img-responsive">
                    <h4><a href="#">Donec odio. Quisque volutpat mattis eros.</a></h4>
                </div>
                <div class="icon-item"> <img src="images/content__images/small_post2.jpg" alt="small-post-img" class="img-responsive">
                    <h4><a href="#">Lorem ipsum dolor sit consectetuer adipiscing elit. Donec odio.</a></h4>
                </div>
                <div class="icon-item"> <img src="images/content__images/small_post3.jpg" alt="small-post-img" class="img-responsive">
                    <h4><a href="#">Quisque volutpat mattis eros. Aliquam erat volutpat. Nam dui mi.</a></h4>
                </div>
                <div class="icon-item"> <img src="images/content__images/small_post4.jpg" alt="small-post-img" class="img-responsive">
                    <h4><a href="#">Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus.</a></h4>
                </div>
            </div>
            {{-- END TODO: separate this to block, show popular news --}}

        </div>
    </div>
</section>
@stop