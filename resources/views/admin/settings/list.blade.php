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
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ trans('p.site_info') }}</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    {!! Form::label('site_name', trans('p.site_name')) !!}
                                    {!! Form::text('site_name', null, ['class' => 'form-control', 'id' => 'site_name']) !!}
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('site_phone', trans('p.site_phone')) !!}
                                    {!! Form::text('site_phone', null, ['class' => 'form-control', 'id' => 'site_phone']) !!}
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
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('p.social') }}</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                {!! Form::label('fb', 'Facebook') !!}
                                {!! Form::text('fb', null, ['class' => 'form-control', 'id' => 'fb']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('twitter', 'Twitter') !!}
                                {!! Form::text('twitter', null, ['class' => 'form-control', 'id' => 'twitter']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                {!! Form::label('gplus', 'Google+') !!}
                                {!! Form::text('gplus', null, ['class' => 'form-control', 'id' => 'gplus']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('instagram', 'Instagram') !!}
                                {!! Form::text('instagram', null, ['class' => 'form-control', 'id' => 'instagram']) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('p.slider') }}</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                {!! Form::label('slider_text_top', trans('p.slider_text_top')) !!}
                                {!! Form::text('slider_text_top', null, ['class' => 'form-control', 'id' => 'slider_text_top']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('slider_text_center', trans('p.slider_text_center')) !!}
                                {!! Form::text('slider_text_center', null, ['class' => 'form-control', 'id' => 'slider_text_center']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                {!! Form::label('slider_text_bottom', trans('p.slider_text_bottom')) !!}
                                {!! Form::text('slider_text_bottom', null, ['class' => 'form-control', 'id' => 'slider_text_bottom']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('slider_text_button', trans('p.slider_text_button')) !!}
                                {!! Form::text('slider_text_button', null, ['class' => 'form-control', 'id' => 'slider_text_button']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                {!! Form::label('slider_button_url', trans('p.slider_button_url')) !!}
                                {!! Form::text('slider_button_url', null, ['class' => 'form-control', 'id' => 'slider_button_url']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('p.terms_of_use') }}</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                {!! Form::label('terms', 'Текст') !!}
                                {!! Form::textarea('terms', null, ['class' => 'form-control', 'id' => 'terms']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pull-right">
                    <button class="btn btn-success">{{ trans('p.save') }}</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop
