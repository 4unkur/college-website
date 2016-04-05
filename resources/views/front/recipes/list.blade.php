@extends('layouts.master')

@section('content')
    <section class="recent-posts">
        <div class="container">
            <h2 class="text-center">our blog</h2>
            <span class="text-center separator"></span>
            <p class="small-paragraph text-center">Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.</p>
            <div class="row no_padding">
                <div class="col-md-9">
                    @if (count($recipes))
                        @foreach ($recipes as $recipe)
                            <article>
                                <img src="{{ url('uploads/images/recipes') }}/{{ $recipe->image }}" alt="pic1" class="pull-left img-responsive">
                                <div class="text">
                                    <h3>{!! link_to_route('recipe.show', $recipe->title, $recipe->slug) !!}</h3>
                                    <p class="small-paragraph">{{ $recipe->created_at->diffForHumans() }}</p>
                                    <p>{!! str_limit($recipe->body, 100, '...') !!}</p>
                                </div>
                                <div class="clearfix"></div>
                            </article>
                        @endforeach
                    @endif

                    {!! $recipes->render() !!}
                </div>
            </div>
        </div>
    </section>
@stop