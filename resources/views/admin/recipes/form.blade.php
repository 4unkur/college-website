<div class="form-group">
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null, ['required', 'class' => 'form-control', 'placeholder' => 'Input title']) !!}
</div>
{!! Form::textarea('body', null, ['required', 'rows' => 10, 'cols' => 80, 'id' => 'editor1']) !!}
<div class="form-group">
    {!! Form::label('status', 'Status') !!}
    {!! Form::select('status', config('college.recipe_statuses'), null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit($buttonText, ['class' => 'btn btn-success pull-right', 'style' => 'margin-top: 20px;']) !!}
</div>

@section('footer')
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor1');
    </script>
@stop