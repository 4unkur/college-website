@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row nothing">
        <section class="col-md-8 main-content">
            <h2>{{ $news->title }}</h2>
            <article>
                {!! $news->body !!}
            </article>
            <br />
            <br />
        </section>







        {{--TODO: separate this to block--}}
        <aside class="col-md-4">
            <h3><span>Subheading</span></h3>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros.</p>
            <img src="images/content__images/aside_r.jpg" alt="image">
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>
            <p><a href="#" role="button" class="btn btn-info btn-lg">Learn more</a></p>
            <h3><span>Subheading</span></h3>
            <ul>
                <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                <li><a href="#">Donec odio.</a></li>
                <li><a href="#">Quisque volutpat mattis eros.</a></li>
                <li><a href="#">Nullam malesuada erat ut turpis.</a></li>
                <li><a href="#">Suspendisse urna nibh, viverra non</a></li>
                <li><a href="#">Donec nec justo eget felis facilisis fermentum.</a></li>
                <li><a href="#">Aliquam porttitor mauris sit amet orci.</a></li>
                <li><a href="#">Aenean dignissim pellentesque felis.</a></li>
            </ul>
        </aside>





    </div>
</div>
@stop