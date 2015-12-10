<div class="form-group">
    {!! Form::label('first_name', 'Firts name') !!}
    {!! Form::text('first_name', null, ['required', 'class' => 'form-control', 'placeholder' => 'John']) !!}
</div>
<div class="form-group">
    {!! Form::label('last_name', 'Last name') !!}
    {!! Form::text('last_name', null, ['required', 'class' => 'form-control', 'placeholder' => 'Doe']) !!}
</div>
<div class="form-group">
    {!! Form::label('email', 'Email') !!}
    {!! Form::email('email', null, ['required', 'class' => 'form-control', 'placeholder' => 'example@com']) !!}
</div>
<div class="form-group">
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', ['required', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('password_confirmation', 'Password confirmation') !!}
    {!! Form::password('password_confirmation', ['required', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('type', 'Type') !!}
    {!! Form::select('type', config('college.user_types'), null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('status', 'Status') !!}
    {!! Form::select('status', config('college.user_statuses'), null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit($buttonText, ['class' => 'btn btn-success pull-right', 'style' => 'margin-top: 20px;']) !!}
</div>