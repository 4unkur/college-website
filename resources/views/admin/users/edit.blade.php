@extends('admin.master')

@section('content')
<div class="box box-success">
    <div class="box-header">
        <h3 class="box-title">Edit User: {{ $user->first_name }}</h3>
        <!-- tools box -->
        <div class="pull-right box-tools">
            <button class="btn btn-success btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /. tools -->
    </div><!-- /.box-header -->
    <div class="box-body pad">
        {!! Form::model($user, ['route' => ['admin.user.update', $user->id], 'method' => 'put']) !!}
            @include('admin.users.form', ['buttonText' => 'Update'])
        {!! Form::close() !!}
    </div>
</div><!-- /.box -->
@stop