@extends('front.layouts.master')

@section('content')
    <div class="row blue__line">
        <div class="container text-center">
            <h1>{{ $student->first_name . ' ' . $student->last_name }}</h1>
            <p class="big-paragraph">{{ trans('p.your_points', ['points' => $result->points]) }}</p>
        </div>
    </div>
    <div class="row">
        <div class="container text-center">
            <h2>{{ trans('p.' . ($result->points >= 60 ? 'success' : 'fail')) }}</h2>
        </div>
    </div>
@stop