@extends('admin.master')

@section('header')
    {{ trans('p.pages') }} :
@stop

@section('subheader')
    {{ trans('p.list') }}
@stop

@section('content')
    @if (isset($pages) && count($pages))
    <div class="box">
        <div class="box-header">
        </div><!-- /.box-header -->
        <div class="box-body">
            <table id="entries-table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>№</th>
                    <th>{{ trans('p.title') }}</th>
                    <th>{{ trans('p.page_view') }}</th>
                    <th>{{ trans('p.date') }}</th>
                    <th>{{ trans('p.status') }}</th>
                    <th>{{ trans('p.edit') }}</th>
                    <th>{{ trans('p.remove') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($pages as $entry)
                    <tr>
                        <td width="40px">{{ $entry->id }}</td>
                        <td>{{ $entry->title }}</td>
                        <td width="40px"><a href="{{ route('page.show', $entry->slug) }}" target="_blank"><span class="fa fa-eye"></span></a></td>
                        <td width="200px">{{ \Carbon\Carbon::parse($entry->created_at)->format('d/m/Y') }}</td>
                        <td width="200px"><span class="badge status-{{ $entry->status }}">{{ $entry->status }}</span></td>
                        <td width="40px"><a href="{{ route('admin.page.edit', $entry->id) }}"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td width="40px"><a href="{{ route('admin.page.destroy', $entry->id) }}" class="delete-entry" data-token="{{ csrf_token() }}"><i class="fa fa-trash-o"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else
        {{ trans('p.empty_list') }}
    @endif
@stop