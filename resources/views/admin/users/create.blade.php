@extends('admin.master')

@section('content')

@include ('admin.errors.list')

<div class="box box-success">
    <div class="box-header">
        <h3 class="box-title">{{ trans('p.user_add') }}</h3>
        <!-- tools box -->
        <div class="pull-right box-tools">
            <button class="btn btn-success btn-sm" data-widget="collapse" data-toggle="tooltip" title="{{ trans('h.collapse') }}"><i class="fa fa-minus"></i></button>
        </div><!-- /. tools -->
    </div><!-- /.box-header -->
    <div class="box-body pad">
        {!! Form::open(['route' => 'admin.user.store']) !!}
            @include('admin.users.form', ['buttonText' => trans('p.add')])
        {!! Form::close() !!}
    </div>
</div><!-- /.box -->
@stop

