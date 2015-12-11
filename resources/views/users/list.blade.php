@extends('layouts.master')

@section('content')
    @if (count($users))
    <ul>
        @foreach ($users as $user)
        <li>{{ $user->first_name }}</li>
        @endforeach
    </ul>
    @endif
@stop