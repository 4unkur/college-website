@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row nothing">
            <section class="col-md-8 main-content">
                <h2>{{ $recipe->title }}</h2>
                <article>
                    {!! $recipe->body !!}
                </article>
                <br />
                <br />
            </section>
        </div>
    </div>
@stop