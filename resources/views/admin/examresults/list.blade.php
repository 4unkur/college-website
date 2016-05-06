@extends('admin.master')

@section('header')
    {{ trans('p.examresults') }} :
@stop

@section('subheader')
    {{ trans('p.list') }}
@stop

@section('content')

    @if (isset($examresults) && count($examresults))
        <div class="box">
            <div class="box-header">
                <h4>
                    <a href="{{ route('admin.import.examresult') }}" >
                        <i class="fa fa-plus-square"></i> <span>{{ trans('p.import_examresults') }}</span>
                    </a>
                </h4>
                </div>
            <div class="box-body">
                <table id="entries-table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{ trans('p.name') }}</th>
                        <th>{{ trans('p.email') }}</th>
                        <th>{{ trans('p.points') }}</th>
                        <th>{{ trans('p.passed') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($examresults as $entry)
                        <tr>
                            <?php $student = $entry->student()->first() ?>
                            <td width="60px">{{ $student->id }}</td>
                            <td width="200px">{{ $student->first_name . ' ' . $student->last_name }}</td>
                            <td width="200px">{{ $student->email }}</td>
                            <td width="40px">{{ $entry->points }}</td>
                            <td width="40px"><span class=" fa fa-{{ $entry->points >= 60 ? 'check text-green' : 'close text-red' }}"></span></td>
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