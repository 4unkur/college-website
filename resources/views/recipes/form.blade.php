<div class="form-group">
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null, ['class'=> 'form-control', 'placeholder' => 'Input title']) !!}
</div>
<div class="form-group">
    {!! Form::label('body', 'Body') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Description', 'id' => 'body']) !!}
</div>
<div class="form-group">
    {!! Form::submit($buttonText, ['class' => 'btn btn-info pull-right']) !!}
</div>