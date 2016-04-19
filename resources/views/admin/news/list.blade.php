@extends('admin.master')

@section('head')
    {!! Html::style('datatables/dataTables.min.css') !!}
@stop

@section('header')
    {{ trans('p.news') }} :
@stop

@section('subheader')
    {{ trans('p.list') }}
@stop

@section('content')
    @if (isset($news) && count($news))
    <div class="box">
        <div class="box-header">
        </div><!-- /.box-header -->
        <div class="box-body">
            <table id="entries-table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Created</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($news as $entry)
                    <tr>
                        <td width="40px">{{ $entry->id }}</td>
                        <td><a href="{{ route('news.show', $entry->slug) }}" target="_blank">{{ $entry->title }}</a></td>
                        <td width="200px">{{ \Carbon\Carbon::parse($entry->created_at)->format('d M Y') }}</td>
                        <td width="200px">{{ $entry->status }}</td>
                        <td width="40px"><a href="{{ route('admin.news.edit', $entry->id) }}"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td width="40px"><a href="{{ route('admin.news.destroy', $entry->id) }}" class="delete-entry" data-token="{{ csrf_token() }}"><i class="fa fa-trash-o"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else
    there is now entries
    @endif
@stop

@section('footer')
    @parent
    {!! Html::script('datatables/dataTables.min.js') !!}
    {!! Html::script('js/grid.js') !!}
@stop