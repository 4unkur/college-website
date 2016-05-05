@extends('front.layouts.master')

@section('content')
    <div class="container">
        <div class="row nothing">
            <section class="col-md-10 main-content">
                @if (isset($videocourse) && $videocourse)
                <h2>{{ $videocourse->title }}</h2>
                <p class="small-paragraph">
                    {{ $videocourse->created_at }}
                </p>
                <hr>
                <figure>
                    <iframe width="850" height="500" src="http://www.youtube.com/embed/{{ $videocourse->video }}"></iframe>
                </figure>
                <br>
                <article>
                    {!! $videocourse->description !!}
                </article>
                <div>
                    @if ($files = unserialize($videocourse->files))
                        <h4>{{ trans('p.attached_files') }}</h4>
                        @foreach($files as $file)
                            <p>
                                <span class="fa fa-file"></span> <a href="{{ url() . '/uploads/' . $file }}" download>{{ $file }}</a>
                            </p>
                        @endforeach
                    @endif
                </div>
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
                @endif
            </section>
        </div>
    </div>
@stop