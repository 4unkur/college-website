@extends('layouts.master')

@section('content')
<section class="recent-posts">
    <div class="container">
        <h2 class="text-center">our blog</h2>
        <span class="text-center separator"></span>
        <p class="small-paragraph text-center">Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.</p>
        <div class="row no_padding">
            <div class="col-md-9">
                @if (count($news))
                    @foreach ($news as $entry)
                    <article>
                        <img src="images/content__images/post1.jpg" alt="pic1" class="pull-left img-responsive">
                        <div class="text">
                            <h3><a href="#">{{ $entry->title }}</a></h3>
                            <p class="small-paragraph">{{ $entry->created_at->diffForHumans() }}</p>
                            <p>{!! str_limit($entry->body, 100, '...') !!}</p>
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








        </div>
    </div>
</section>
@stop