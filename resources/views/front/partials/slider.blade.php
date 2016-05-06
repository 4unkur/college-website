<section class="slider">
    <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            @foreach (range(1, 3) as $i)
                <div class="item @if (1 == $i) active @endif"> <img data-src="front/images/slider/slider{{ $i }}.jpg" alt="First slide" src="front/images/slider/slider{{ $i }}.jpg">
                    <div class="container">
                        <div class="carousel-caption">
                            <p class="little"><span>{{ Setting::get('slider_text_top') }}</span></p>
                            <h1>{{ Setting::get('slider_text_center') }}</h1>
                            <p>{{ Setting::get('slider_text_bottom') }}</p>
                            <p><a class="btn btn-default btn-lg" href="{{ Setting::get('slider_button_url') }}" role="button">{{ Setting::get('slider_text_button') }}</a></p>
                            @if (Auth::check() && Auth::user()->type == 'student' && Auth::user()->result()->first())@endif {{-- TODO exam result text--}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon carousel-control-left"></span></a> <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon carousel-control-right"></span></a> </div>
</section>

@section('footer')
    <script>
        $('.carousel').carousel({
            interval: {{ Setting::get('slider_speed') * 1000 }},
            pause: 'true'
        });
    </script>
@stop