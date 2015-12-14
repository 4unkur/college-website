@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            {!! Form::model($recipe, ['route' => ['recipe.update', $recipe->id], 'method' => 'patch', 'class' => 'form']) !!}
            @include('recipes.form', ['buttonText' => 'Update'])
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('footer')
    {!! Html::script('https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js') !!}
    <script>
        CKEDITOR.replace('body');
    </script>
@stop