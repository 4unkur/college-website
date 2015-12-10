@extends('admin.master')

@section('content')
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Bordered Table</h3>
        <div class="box-tools">
            <div class="input-group" style="width: 150px;">
                <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                <div class="input-group-btn">
                    <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </div><!-- /.box-header -->

    <div class="box-body">
        <table class="table table-bordered">
            <tr>
                <th style="width: 10px">#</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Email address</th>
                <th style="width: 40px">Status</th>
                <th>edit</th>
                <th>delete</th>
            </tr>
            @if (count($users))
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><span class="badge status-{{ $user->status }}">{{ $user->status }}</span></td>
                    <td><a href="{!! route('admin.user.edit', [$user]) !!}"><i class="fa fa-pencil-square-o"></i></a></td>
                    <td><i class="fa fa-trash-o"></i></td>
                </tr>
                @endforeach
            @endif
        </table>
    </div><!-- /.box-body -->
    <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
            <li><a href="#">&laquo;</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">&raquo;</a></li>
        </ul>
    </div>
</div><!-- /.box -->
@stop