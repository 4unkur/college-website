<div class="content bordered">
    <div class="form-group">
        {!! Form::label('video', trans('p.full_youtube_video_url')) !!}
        {!! Form::text('video', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        <label for="">{{ trans('p.attach_files') }}</label>
        <div>
            <input type="file" name="files[]" multiple>
        </div>
        @if (isset($videocourse['files']) && $videocourse['files'])
            <?php $files = unserialize($videocourse['files']); ?>
            @if ($files)
                    <br>
                <label>{{ trans('p.attached_files') }}</label>
                @foreach($files as $file)
                    <div><span class="fa fa-file"></span> <a href="{{ url() . '/uploads/' . $file }}" download>{{ $file }}</a>
                        <a class="text-danger admin-file-remove-button" href="{{ route('admin.videocourse.delete.file', [$videocourse->id]) }}" data-file="{{ $file }}" data-token="{{ csrf_token() }}"><span class="fa fa-close"></span></a></div>
                @endforeach
            @endif
        @endif
    </div>
    <div class="form-group">
        <label for="status">{{ trans('p.status') }}</label>
        <select name="status" id="status" class="form-control">
            @foreach (config('college.statuses') as $status)
                <option value="{{ $status }}">{{ trans('p.' . $status) }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    {!! Form::submit($buttonText, ['class' => 'btn btn-success pull-right', 'style' => 'margin-top: 20px;']) !!}
</div>

@section('footer')
    @parent
    {!! Html::script('ckeditor/ckeditor.js') !!}
    <script>
        $('#videocourses-tab a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
        $('a[data-toggle="tab"]', '#videocourses-tab').on('shown.bs.tab', function()
        {
            var langCode = $(this).data('language');
            CKEDITOR.instances['description[' + langCode + ']'] || CKEDITOR.replace('description[' + langCode + ']');

            $('#js-active-language').val(langCode);
        });
        $('a[data-toggle="tab"]:first', '#videocourses-tab').trigger('shown.bs.tab');
    </script>
@stop