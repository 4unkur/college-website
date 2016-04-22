@extends('admin.master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-list"></i></span>
                    <div class="info-box-content">
                        <h3>{{ trans('p.examresult') }} {!! link_to_route('admin.import.examresult', '', [], ['class' => 'fa fa-plus-circle']) !!}</h3>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
        </div>
    </section>
@stop