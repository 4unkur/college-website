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
            <p class="little"></p>
            <h2 class="page_title"><span>{!! trans('p.welcome') !!}</span></h2>
        </div>
    </div>
    <div class="row  three__blocks text-center no_padding no-margin">
        <div class="container">
            <h2>{{ trans('p.latest_videocourses') }}</h2>
            <span class="separator"></span>
            @if ($latestVideocourses)
                @foreach ($latestVideocourses as $videocourse)
                <div class="col-md-4 img-rounded"> <img src="http://img.youtube.com/vi/{{ $videocourse->video }}/hqdefault.jpg" alt="{{ $videocourse->title }}" class="img-responsive img-rounded">
                    <h3><a href="#">{{ $videocourse->title }}</a></h3>
                    <p class="smaller">{{ $videocourse->created_at }}</p>
                    <p>{{ str_limit(strip_tags($videocourse->description), 100) }}</p>
                    <p><a class="btn btn-info btn-lg" href="{{ route('videocourse.show', [$videocourse->slug]) }}" role="button">{{ trans('p.view_full') }}</a>
                </div>
                @endforeach
            @endif
        </div>
    </div>
    <div style="position: relative;">
        <div id="googleMap" style="width: 100%; height: 400px;pointer-events:none"></div>
        <div class="text-map text-center" style="position: absolute; z-index: 9000;margin-left: auto;margin-right: auto;left: 0;right: 0;top:220px">
            <div style="border: none; border-radius: 10px;background: #ccc; display: inline-block;padding: 20px;">
                <h4>{{ Setting::get('location') }}</h4>
                <br>
                <p><a class="btn btn-info btn-lg" href="{{ route('contacts') }}">{{ trans('p.view_on_map') }}</a></p>
            </div>
        </div>
    </div>
    @if ($latestNews)
    <div class="row  three__blocks text-center no_padding no-margin">
        <div class="container">
            <h2>{{ trans('p.news_latest') }}</h2>
            <span class="separator"></span>
            <p class="small-paragraph"></p>
            @foreach ($latestNews as $news)
            <div class="col-md-6 img-rounded"> {!! Html::image('uploads/images/news/rect/' . $news->image, null, ['class' => 'img-rounded img-responsive', 'alt' => $news->title]) !!}
                <h3>{{ $news->title }}</h3>
                <p class="smaller">{{ \Carbon\Carbon::parse($news->created_at)->format('d/m/Y') }}</p>
                <p>
                    {!! str_limit(strip_tags($news->text), 300) !!}
                </p>
                <p><a href="{{ route('news.show', [$news->slug]) }}" class="btn btn-info btn-lg">{{ trans('p.read_more') }}</a></p>
            </div>
            @endforeach
        </div>
    </div>
    @endif
@stop

@section('footer')
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script>
        function initialize() {
            var myLatLng = {lat: 42.8406508, lng: 74.5594599};

            var mapProp = {
                center: myLatLng,
                zoom:15,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            };

            var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'Бул жерде!'
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@stop