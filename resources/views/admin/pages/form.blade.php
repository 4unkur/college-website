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
                        {!! Form::text("title[$langCode]", null, ['class' => 'form-control', 'placeholder' => 'Input title']) !!}
                    </div>
                    {!! Form::textarea("content[$langCode]", null, ['rows' => 10, 'cols' => 80, 'id' => "content[$langCode]"]) !!}
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="content bordered">
    <div class="form-group">
        {!! Form::label('slug', 'URL') !!}
        <span class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('p.tooltip_url_format') }}"></span>
        {!! Form::text('slug', null, ['class' => 'form-control']) !!}
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