@extends('admin.master')

@section('header')
    {{ trans('p.import') }} :
@stop

@section('subheader')
    {{ trans('p.list') }}
@stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-5 col-sm-6 col-xs-12">
                <a href="{{ route('admin.import.examresult') }}" style="display: block">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-plus"></i></span>
                        <div class="info-box-content">
                            <h2>{{ trans('p.examresults') }}</h2>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5 col-sm-6 col-xs-12">
                <a href="{{ route('admin.import.user') }}" style="display: block">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-plus"></i></span>
                        <div class="info-box-content">
                            <h2>{{ trans('p.users') }}</h2>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </a>
            </div>
        </div>
    </section>
@stop