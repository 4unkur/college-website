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
                    <th>№</th>
                    <th>{{ trans('p.title') }}</th>
                    <th>{{ trans('p.date') }}</th>
                    <th>{{ trans('p.status') }}</th>
                    <th>{{ trans('p.edit') }}</th>
                    <th>{{ trans('p.remove') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($news as $entry)
                    <tr>
                        <td width="40px">{{ $entry->id }}</td>
                        <td><a href="{{ route('news.show', $entry->slug) }}" target="_blank">{{ $entry->title }}</a></td>
                        <td width="200px">{{ \Carbon\Carbon::parse($entry->created_at)->format('d/m/Y') }}</td>
                        <td width="200px"><span class="badge status-{{ $entry->status }}">{{ $entry->status }}</span></td>
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
        {!! Html::script('js/dataTables.bootstrap.min.js') !!}
@stop