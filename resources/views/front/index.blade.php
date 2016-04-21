@extends('front.layouts.master')

@section('main_container_class')
    homepage13
@stop

@section('main_header_class')
    main__header
@stop

@section('content')

    @include('front.partials.slider')
    <div class="row text-center no-margin nothing">
        <div class="container headings">
            <p class="little"><span>Lorem ipsum dolor site</span></p>
            <h2 class="page_title">PARALLAX ELEMENTS<br />
                <span>clean</span> and <span>high quality
                    </span>
                website.</h2>
            <p class="small-paragraph">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
        </div>
    </div>
    <div class="row  three__blocks text-center no_padding no-margin">
        <div class="container">
            <h2>OUR CREATIVE SERVICES</h2>
            <span class="separator"></span>
            <p class="small-paragraph">Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.</p>
            <div class="col-md-4 img-rounded"> <img src="/front/images/content__images/img1.jpg" alt="image" class="img-responsive img-rounded">
                <h3><a href="#">Creative Design</a></h3>
                <p class="smaller">Vestibulum auctor dapibus neque.</p>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. </p>
                <p><a class="btn btn-info btn-lg" href="#" role="button">Learn more</a>
            </div>
            <div class="col-md-4 img-rounded middle"> <img src="/front/images/content__images/img2.jpg" alt="image" class="img-responsive img-rounded">
                <h3><a href="#">ONLINE MARKETING</a></h3>
                <p class="smaller">Vestibulum auctor dapibus neque.</p>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. </p>
                <p><a class="btn btn-info btn-lg" href="#" role="button">Learn more</a>
            </div>
            <div class="col-md-4 img-rounded"> <img src="/front/images/content__images/img3.jpg" alt="image" class="img-responsive img-rounded">
                <h3><a href="#">SOCIAL MEDIA</a></h3>
                <p class="smaller">Vestibulum auctor dapibus neque.</p>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. </p>
                <p><a class="btn btn-info btn-lg" href="#" role="button">Learn more</a>
            </div>
        </div>
    </div>
    <div class="text-center three-blocks">
        <div class="container">
            <div class="row white__heading">
                <h2>Morbi in sem quis dui placerat ornare. Pellentesque odio nisi Sed arcu. Cras consequat.</h2>
                <p class="little">Richard Johnson</p>
                <p><a class="btn btn-info btn-lg" href="#">read more</a></p>
            </div>
        </div>
    </div>
    <div class="row  three__blocks text-center no_padding no-margin">
        <div class="container">
            <h2>WHAT WE DO</h2>
            <span class="separator"></span>
            <p class="small-paragraph">Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.</p>
            <div class="col-md-6 img-rounded"> <img src="/front/images/content__images/pic1.jpg" alt="pic" class="img-rounded img-responsive">
                <h3>Commodo id natoque malesuada sollicitudin elit suscipit.</h3>
                <p class="smaller">Praesent semper mod quis eget mi. Etiam eu ante risus.</p>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>
                <p><a href="#" class="btn btn-info btn-lg">Learn more</a></p>
            </div>
            <div class="col-md-6 img-rounded"> <img src="/front/images/content__images/pic2.jpg" alt="pic" class="img-rounded img-responsive">
                <h3>Aliquam luctus et mattis lectus Nam nec turpis consequat.</h3>
                <p class="smaller">Praesent semper mod quis eget mi. Etiam eu ante risus.</p>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>
                <p><a href="#" class="btn btn-info btn-lg">Learn more</a></p>
            </div>
        </div>
    </div>
@stop