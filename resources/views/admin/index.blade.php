@extends('admin.master')

@section('header')
    {{ trans('p.' . $header) }}
@stop

@section('subheader')
    {{ trans('p.' . $subheader) }}
@stop
