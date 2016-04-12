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
                        {!! Form::text("title[$langCode]", null, ['class' => 'form-control', 'placeholder' => 'Input title']) !!}
                    </div>
                    {!! Form::textarea("text[$langCode]", null, ['rows' => 10, 'cols' => 80, 'id' => "text[$langCode]"]) !!}
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="content bordered">
    <div class="form-group">
        <label for="">Image</label>
        <div>
            {!! Form::file('image') !!}
        </div>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control">
            @foreach (config('college.statuses') as $status)
                <option value="{{ $status }}">{{ $status }}</option>
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
@stop