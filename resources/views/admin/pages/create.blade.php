@extends('admin.master')

@section('content')
<div class="box box-success">
    <div class="box-header">
        <h3 class="box-title">Create Page</h3>
        <!-- tools box -->
        <div class="pull-right box-tools">
            <button class="btn btn-success btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
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