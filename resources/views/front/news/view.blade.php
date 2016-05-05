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
            <div id="disqus_thread"></div>
            <script>
                (function() {
                    var d = document, s = d.createElement('script');

                    s.src = '//diploma-daiyrbek.disqus.com/embed.js';

                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
        </section>
        @include('front.news.block-random')
    </div>
</div>
@stop