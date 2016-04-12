@extends('front.layouts.master')

@section('content')
    <section class="main__middle__container">
        <section class="recent-posts">
            <div class="container">
                <h2 class="text-center">{{ $page->title }}</h2>
                <span class="text-center separator"></span>
                <div class="row no_padding">
                    <div class="col-md-12">
                        <article>
                            <div class="text">
                                {!! $page->content  !!}
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>
    </section>
@stop