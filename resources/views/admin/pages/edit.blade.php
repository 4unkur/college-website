@extends('admin.master')

@section('header')
    {{ trans('p.pages') }} :
@stop

@section('subheader')
    {{ trans('p.edit') }}
@stop

@section('content')
<div class="box box-success">
    <div class="box-header">
        <h3 class="box-title">{{ trans('p.edit') }}: {{ $page->title }}</h3>
        <!-- tools box -->
        <div class="pull-right box-tools">
            <button class="btn btn-success btn-sm" data-widget="collapse" data-toggle="tooltip" title="{{ trans('p.collapse') }}"><i class="fa fa-minus"></i></button>
        </div><!-- /. tools -->
    </div><!-- /.box-header -->
    @include ('admin.errors.list')
    <div class="box-body pad">
        {!! Form::model($page, ['route' => ['admin.page.update', $page->id], 'method' => 'put', 'files' => true]) !!}
        <div>
            <?php $locales = config('laravellocalization.supportedLocales') ?>
            <ul class="nav nav-tabs" role="tablist" id="page-tab">
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
                                <input type="text" name="title[{{ $langCode }}]" class="form-control" placeholder="Input title" value="{{ $page->{"title:$langCode"} }}">
                            </div>
                            <textarea name="content[{{ $langCode }}]" id="content[{{ $langCode }}]" cols="80" rows="10">
                                {{ $page->{"content:$langCode"} }}
                            </textarea>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <div class="content bordered">

            <div class="form-group">
                <label for="status">{{ trans('p.status') }}</label>
                <select name="status" id="status" class="form-control">
                    @foreach (config('college.statuses') as $status)
                        <option value="{{ $status }}" @if ($status == $page['status']) selected @endif>{{ trans('p.' . $status) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            {!! Form::submit('Update', ['class' => 'btn btn-success pull-right', 'style' => 'margin-top: 20px;']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div><!-- /.box -->
@stop

@section('footer')
    @parent
    {!! Html::script('ckeditor/ckeditor.js') !!}
    <script>
        $('#page-tab a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
        $('a[data-toggle="tab"]', '#page-tab').on('shown.bs.tab', function()
        {
            var langCode = $(this).data('language');
            CKEDITOR.instances['content[' + langCode + ']'] || CKEDITOR.replace('content[' + langCode + ']');

            $('#js-active-language').val(langCode);
        });
        $('a[data-toggle="tab"]:first', '#page-tab').trigger('shown.bs.tab');
    </script>
@stop