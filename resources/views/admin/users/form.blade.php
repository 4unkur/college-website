@section('head')
@parent

{!! Html::style('datepicker/datepicker3.css') !!}
@stop

<div class="col-lg-8">
    <div class="form-group">
        {!! Form::label('first_name', trans('p.first_name')) !!}
        {!! Form::text('first_name', null, ['required', 'class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('last_name', trans('p.last_name')) !!}
        {!! Form::text('last_name', null, ['required', 'class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', trans('p.email')) !!}
        {!! Form::email('email', null, ['required', 'class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password', trans('p.password')) !!}
        {!! Form::password('password', ['required', 'class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password_confirmation', trans('p.repeat_password')) !!}
        {!! Form::password('password_confirmation', ['required', 'class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('birth_date', trans('p.birth_date')) !!}
        <span class="fa fa-info-circle" data-toggle="tooltip" title="{{ trans('h.tooltip_dateformat') }}"></span>
        {!! Form::text('birth_date', null, ['class' => 'form-control', 'id' => 'birth_date']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('phone', trans('p.phone')) !!}
        <span class="fa fa-info-circle" data-toggle="tooltip" title="{{ trans('h.tooltip_only_num') }}"></span>
        {!! Form::tel('phone', null, ['class' => 'form-control']) !!}
    </div>

    <div class="input-group form-group">
        <span class="input-group-addon"><i class="fa fa-facebook-official"></i></span>
        {!! Form::text('fb', null, ['class' => 'form-control', 'placeholder' => 'Facebook']) !!}
    </div>
    <div class="input-group form-group">
        <span class="input-group-addon"><i class="fa fa-twitter-square"></i></span>
        {!! Form::text('twitter', null, ['class' => 'form-control', 'placeholder' => 'Twitter']) !!}
    </div>
    <div class="input-group form-group">
        <span class="input-group-addon"><i class="fa fa-google-plus-square"></i></span>
        {!! Form::text('gplus', null, ['class' => 'form-control', 'placeholder' => 'Google Plus']) !!}
    </div>
    <div class="input-group form-group">
        <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
        {!! Form::text('instagram', null, ['class' => 'form-control', 'placeholder' => 'Instagram']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('type', trans('p.type')) !!}
        {!! Form::select('type', array_map(function($status) {
                return trans('p.' . $status);
            }, config('college.user_types')), null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('status', trans('p.status')) !!}
        {!! Form::select('status', array_map(function($status) {
                return trans('p.' . $status);
            }, config('college.user_statuses')), null, ['class' => 'form-control']) !!}
    </div>

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

    <div class="form-group">
        {!! Form::submit($buttonText, ['class' => 'btn btn-success pull-right', 'style' => 'margin-top: 20px;']) !!}
    </div>
</div>


@section('footer')
    @parent
    {!! Html::script('ckeditor/ckeditor.js') !!}
    {!! Html::script('datepicker/bootstrap-datepicker.js') !!}
    {!! Html::script('datepicker/locales/bootstrap-datepicker.' . Lang::getLocale() . '.js') !!}
    <script>
        $('#birth_date').datepicker({
            language: '{{ Lang::getLocale() }}',
            format: 'yyyy-mm-dd'
        });
        $('#user-tab a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
        $('a[data-toggle="tab"]', '#user-tab').on('shown.bs.tab', function()
        {
            var langCode = $(this).data('language');
            CKEDITOR.instances['bio[' + langCode + ']'] || CKEDITOR.replace('bio[' + langCode + ']');

            $('#js-active-language').val(langCode);
        });
        $('a[data-toggle="tab"]:first', '#user-tab').trigger('shown.bs.tab');
    </script>
@stop