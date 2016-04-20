@extends('admin.master')

@section('header')
    {{ trans('p.pages') }} :
@stop

@section('subheader')
    {{ trans('p.add') }}
@stop

@section('content')
<div class="box box-success">
    <div class="box-header">
        <h3 class="box-title">{{ trans('p.page_add') }}</h3>
        <!-- tools box -->
        <div class="pull-right box-tools">
            <button class="btn btn-success btn-sm" data-widget="collapse" data-toggle="tooltip" title="{{ trans('p.collapse') }}"><i class="fa fa-minus"></i></button>
        </div><!-- /. tools -->
    </div><!-- /.box-header -->

    @include ('admin.errors.list')

    <div class="box-body pad">
        {!! Form::open(['route' => 'admin.page.store', 'class' => 'test']) !!}
            @include('admin.pages.form', ['buttonText' => 'Add'])
        {!! Form::close() !!}
    </div>
</div><!-- /.box -->
@stop