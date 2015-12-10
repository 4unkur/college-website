@extends('admin.master')

@section('content')
    @if($errors->any())
        @foreach($errors as $error)
            <p>{{ $error }}</p>
            @endforeach
        @endif
<div class="box box-success">
    <div class="box-header">
        <h3 class="box-title">Create User</h3>
        <!-- tools box -->
        <div class="pull-right box-tools">
            <button class="btn btn-success btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /. tools -->
    </div><!-- /.box-header -->
    <div class="box-body pad">
        {!! Form::open(['route' => 'admin.user.store']) !!}
            @include('admin.users.form', ['buttonText' => 'Add'])
        {!! Form::close() !!}
    </div>
</div><!-- /.box -->
@stop

