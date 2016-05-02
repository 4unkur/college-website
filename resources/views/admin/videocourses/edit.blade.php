@extends('admin.master')

@section('header')
    {{ trans('p.videocourses') }} :
@stop

@section('subheader')
    {{ trans('p.edit') }}
@stop

@section('content')
<div class="box box-success">
    <div class="box-header">
        <h3 class="box-title">{{ $videocourse->title }}</h3>
        <!-- tools box -->
        <div class="pull-right box-tools">
            <button class="btn btn-success btn-sm" data-widget="collapse" data-toggle="tooltip" title="{{ trans('p.collapse') }}"><i class="fa fa-minus"></i></button>
        </div><!-- /. tools -->
    </div><!-- /.box-header -->
    @include ('admin.errors.list')
    <div class="box-body pad">
        {!! Form::model($videocourse, ['route' => ['admin.videocourse.update', $videocourse->id], 'method' => 'put', 'files' => true]) !!}
        <div>
            <?php $locales = config('laravellocalization.supportedLocales') ?>
            <ul class="nav nav-tabs" role="tablist" id="videocourses-tab">
                @foreach ($locales as $langCode => $language)
                    <li role="presentation" @if ($language == reset($locales)) class="active" @endif >
                        <a href="#tab-content-{{ $langCode }}" role="tab" data-toggle="tab" data-language="{{ $langCode }}">
                            {{ $language['native'] }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <div class="tab-content">
                @foreach ($locales as $langCode => $language)
                    <div role="tabpanel" class="tab-pane tab-pane-bordered @if ($language == reset($locales)) active @endif" id="tab-content-{{ $langCode }}">
                        <div class="content">
                            <div class="form-group">
                                {!! Form::label('title', trans('p.title')) !!}
                                <input type="text" name="title[{{ $langCode }}]" class="form-control" placeholder="Input title" value="{{ $videocourse->{"title:$langCode"} }}">
                            </div>
                            <textarea name="description[{{ $langCode }}]" id="description[{{ $langCode }}]" cols="80" rows="10">
                                {{ $videocourse->{"description:$langCode"} }}
                            </textarea>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        @include('admin.videocourses.form', ['buttonText' => trans('p.add')])
        {!! Form::close() !!}
    </div>
</div><!-- /.box -->
@stop