@extends('admin.master')

@section('content')
<div class="box box-success">
    <div class="box-header">
        <h3 class="box-title">Edit News: {{ $news->title }}</h3>
        <!-- tools box -->
        <div class="pull-right box-tools">
            <button class="btn btn-success btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
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
                                {!! Form::label('title', 'Title') !!}
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
                <label for="">Image</label>
                @if ($news->image)
                    <div class="form-group admin-image">
                        {!! Html::image(url() . '/uploads/images/news/square/' . $news->image) !!}
                        <button class="btn btn-danger admin-image-remove-button" data-image="{{ $news->image }}" data-token="{{ csrf_token() }}" data-url="{{ route('admin.delete.image', [$news->id]) }}">
                            <span class="fa fa-close"></span>
                        </button>
                    </div>
                @endif
                {!! Form::file('image') !!}
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    @foreach (config('college.statuses') as $status)
                        <option value="{{ $status }}" @if ($status == $news['status']) selected @endif>{{ $status }}</option>
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
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
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



        $('.admin-image-remove-button').click(function (e) {
            e.preventDefault();

            var $this = $(this);
            console.log($this.data('url'));

            swal({
                title: "Are you sure?",
                text: "Yes, delete this item",
                type: "info",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function(){
                $.ajax($this.data('url'), {
                    type: 'delete',
                    dataType: 'json',
                    data: {
                        path: $this.data('image'),
                        _token: $this.data('token'),
                        _method: 'delete'
                    },
                    success: function() {
                        swal({
                            title: "Item deleted",
                            type: "success",
                            timer: 1000,
                            showConfirmButton: true
                        }, function() {
                            window.location.reload(true)
                        });

                    },
                    error: function(request, status, error) {
                        sweetAlert("Oops...", "Something went wrong!", "error");
                        console.log('error!', status, error);
                    }
                });
            });
        })
    </script>
@stop