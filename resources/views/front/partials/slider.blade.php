<section class="slider">
    <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            @foreach (range(1, 3) as $i)
                <div class="item @if (1 == $i) active @endif"> <img data-src="front/images/slider/slider{{ $i }}.jpg" alt="First slide" src="front/images/slider/slider{{ $i }}.jpg">
                    <div class="container">
                        <div class="carousel-caption">
                            <p class="little"><span>Quisque et tellus lorem</span></p>
                            <h1>Nullam at nulla consequat purus feugiat vehicula</h1>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat.</p>
                            <p><a class="btn btn-default btn-lg" href="#" role="button">learn more</a></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon carousel-control-left"></span></a> <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon carousel-control-right"></span></a> </div>
</section>