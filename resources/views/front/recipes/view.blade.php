@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row nothing">
            <section class="col-md-8 main-content">
                <h2>{{ $recipe->title }}</h2>
                {!! link_to_route('user.show', $recipe->user->first_name . ' ' . $recipe->user->last_name, $recipe->user->id, ['rel' => 'author']) !!}
                {!! link_to_route('user.recipes', 'view all recipes of this author', $recipe->user->id) !!}
                <article>
                    {!! $recipe->body !!}
                </article>
                <br />
                <br />
            </section>
        </div>
    </div>
@stop