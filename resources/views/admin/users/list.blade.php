@extends('admin.master')

@section('head')
    {!! Html::style('datatables/dataTables.min.css') !!}
@stop

@section('header')
    {{ trans('p.users') }} :
@stop

@section('subheader')
    {{ trans('p.list') }}
@stop

@section('content')
<div class="box">
    <div class="box-header">
    </div><!-- /.box-header -->
    <div class="box-body">
        <table id="entries-table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th style="width: 10px">№</th>
                <th>{{ trans('p.first_name') }}</th>
                <th>{{ trans('p.last_name') }}</th>
                <th>{{ trans('p.email') }}</th>
                <th style="width: 80px">{{ trans('p.view_profile') }}</th>
                <th style="width: 40px">{{ trans('p.status') }}</th>
                <th>{{ trans('p.edit') }}</th>
                <th>{{ trans('p.remove') }}</th>
            </tr>
            </thead>
            @if (count($users))
                <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><a href="{!! route('admin.user.show', [$user]) !!}"><i class="fa fa-eye"></i></a></td>
                    <td><span class="badge status-{{ $user->status }}">{{ $user->status }}</span></td>
                    <td><a href="{!! route('admin.user.edit', [$user]) !!}"><i class="fa fa-pencil-square-o"></i></a></td>
                    <td><a class="delete-entry" data-token="{{ csrf_token() }}" href="{!! route('admin.user.destroy', [$user->id]) !!}"><i class="fa fa-trash-o"></i></a></td>
                </tr>
                @endforeach
                </tbody>
            @endif
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->
@stop

@section('footer')
    @parent
    {!! Html::script('datatables/dataTables.min.js') !!}
    {!! Html::script('js/grid.js') !!}
    {!! Html::script('js/dataTables.bootstrap.min.js') !!}
@stop