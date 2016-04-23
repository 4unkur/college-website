@extends('admin.master')

@section('header')
    {{ trans('p.import') }} :
@stop

@section('subheader')
    {{ trans('p.examresults') }}
@stop

@section('content')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('p.import_examresults') }}</h3>
                    </div>
                    <div class="box-body">
                        {!! Form::open(['route' => 'admin.examresult.store', 'files' => true]) !!}
                        <div class="form-group">
                            {!! Form::label('csv', trans('p.csv_file')) !!}

                            {!! Form::file('csv', ['id' => 'csv']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit(trans('p.import'), ['class' => 'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop