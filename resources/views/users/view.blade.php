@extends('layouts.master')

@section('content')
    @if (isset($user) && $user)
    <h1>{{ $user->first_name }}</h1>
    @endif
@stop