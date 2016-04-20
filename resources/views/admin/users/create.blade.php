@extends('admin.master')

@section('header')
    {{ trans('p.users') }} :
@stop

@section('subheader')
    {{ trans('p.add') }}
@stop

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
        {!! Form::open(['route' => 'admin.user.store', 'files' => true]) !!}
            @include('admin.users.form')
            <div class="col-lg-8">
                <div class="form-group">
                    <label for="avatar">{{ trans('p.avatar') }}</label>
                    <div>
                        {!! Form::file('avatar', ['id' => 'avatar']) !!}
                    </div>
                </div>
                <?php $locales = config('laravellocalization.supportedLocales') ?>
                <ul class="nav nav-tabs" role="tablist" id="user-tab">
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
                                    {!! Form::label('job', trans('p.job', [], null, $langCode)) !!}
                                    {!! Form::text("job[$langCode]", null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('education', trans('p.education', [], null, $langCode)) !!}
                                    {!! Form::textarea("education[$langCode]", null, ['class' => 'form-control', 'rows' => 3]) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label("bio[$langCode]", trans('p.bio', [], null, $langCode)) !!}
                                </div>
                                {!! Form::textarea("bio[$langCode]", null, ['rows' => 10, 'cols' => 80, 'id' => "bio[$langCode]"]) !!}
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="form-group" style="margin-top: 20px">
                    {!! Form::submit(trans('p.add'), ['class' => 'btn btn-success pull-right', 'style' => 'margin-left: 20px;']) !!}
                    {!! link_to_route('admin.user.index', trans('p.cancel'), [], ['class' => 'btn btn-default pull-right']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div><!-- /.box -->
@stop

