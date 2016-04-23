@extends('admin.master')

@section('header')
    {{ trans('p.news') }} :
@stop

@section('subheader')
    {{ trans('p.edit') }}
@stop

@section('content')
<div class="box box-success">
    <div class="box-header">
        <h3 class="box-title">{{ $news->title }}</h3>
        <!-- tools box -->
        <div class="pull-right box-tools">
            <button class="btn btn-success btn-sm" data-widget="collapse" data-toggle="tooltip" title="{{ trans('p.collapse') }}"><i class="fa fa-minus"></i></button>
        </div><!-- /. tools -->
    </div><!-- /.box-header -->
    @include ('admin.errors.list')
    <div class="box-body pad">
        {!! Form::model($news, ['route' => ['admin.news.update', $news->id], 'method' => 'put', 'files' => true]) !!}
        <div>
            <?php $locales = config('laravellocalization.supportedLocales') ?>
            <ul class="nav nav-tabs" role="tablist" id="news-tab">
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
                                <input type="text" name="title[{{ $langCode }}]" class="form-control" placeholder="Input title" value="{{ $news->{"title:$langCode"} }}">
                            </div>
                            <textarea name="text[{{ $langCode }}]" id="text[{{ $langCode }}]" cols="80" rows="10">
                                {{ $news->{"text:$langCode"} }}
                            </textarea>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <div class="content bordered">
            <div class="form-group">
                <label for="">{{ trans('p.image') }}</label>
                @if ($news->image)
                    <div class="form-group admin-image">
                        {!! Html::image(url() . '/uploads/images/news/square/' . $news->image) !!}
                        <button class="btn btn-danger admin-image-remove-button" data-image="{{ $news->image }}" data-token="{{ csrf_token() }}" data-url="{{ route('admin.news.delete.image', [$news->id]) }}">
                            <span class="fa fa-close"></span>
                        </button>
                    </div>
                @endif
                {!! Form::file('image') !!}
            </div>

            <div class="form-group">
                <label for="status">{{ trans('p.status') }}</label>
                <select name="status" id="status" class="form-control">
                    @foreach (config('college.statuses') as $status)
                        <option value="{{ $status }}" @if ($status == $news['status']) selected @endif>{{ trans('p.' . $status) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            {!! Form::submit(trans('p.save'), ['class' => 'btn btn-success pull-right', 'style' => 'margin-top: 20px;']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div><!-- /.box -->
@stop

@section('footer')
    {!! Html::script('ckeditor/ckeditor.js') !!}
    <script>
        $('#news-tab a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
        $('a[data-toggle="tab"]', '#news-tab').on('shown.bs.tab', function()
        {
            var langCode = $(this).data('language');
            CKEDITOR.instances['text[' + langCode + ']'] || CKEDITOR.replace('text[' + langCode + ']');

            $('#js-active-language').val(langCode);
        });
        $('a[data-toggle="tab"]:first', '#news-tab').trigger('shown.bs.tab');
    </script>
    {!! Html::script('js/delete-image.js') !!}
@stop