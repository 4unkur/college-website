@extends('admin.master')

@section('header')
    {{ trans('p.settings') }}
@stop

@section('content')
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title"></h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
                <button class="btn btn-success btn-sm" data-widget="collapse" data-toggle="tooltip" title="{{ trans('p.collapse') }}"><i class="fa fa-minus"></i></button>
            </div><!-- /. tools -->
        </div><!-- /.box-header -->

        @include ('admin.errors.list')

        <div class="box-body pad">
            {!! Form::model($settings, ['route' => 'admin.settings.store', 'class' => 'form']) !!}
                <div class="row">
                    <div class="form-group col-md-6">
                        {!! Form::label('site_name', trans('p.site_name')) !!}
                        {!! Form::text('site_name', null, ['class' => 'form-control', 'id' => 'site_name']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('site_url', trans('p.site_url')) !!}
                        {!! Form::text('site_url', null, ['class' => 'form-control', 'id' => 'site_url']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        {!! Form::label('site_email', trans('p.site_email')) !!}
                        {!! Form::text('site_email', null, ['class' => 'form-control', 'id' => 'site_email']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('location', trans('p.location')) !!}
                        {!! Form::text('location', null, ['class' => 'form-control', 'id' => 'location']) !!}
                    </div>
                </div>

                <div class="pull-right">
                    <button class="btn btn-success">{{ trans('p.save') }}</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop
