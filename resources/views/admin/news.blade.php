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
                <th>Task</th>
                <th>Progress</th>
                <th style="width: 40px">Label</th>
            </tr>
            <tr>
                <td>1.</td>
                <td>Update software</td>
                <td>
                    <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                    </div>
                </td>
                <td><span class="badge bg-red">55%</span></td>
            </tr>
            <tr>
                <td>2.</td>
                <td>Clean database</td>
                <td>
                    <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                    </div>
                </td>
                <td><span class="badge bg-yellow">70%</span></td>
            </tr>
            <tr>
                <td>3.</td>
                <td>Cron job running</td>
                <td>
                    <div class="progress progress-xs progress-striped active">
                        <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                    </div>
                </td>
                <td><span class="badge bg-light-blue">30%</span></td>
            </tr>
            <tr>
                <td>4.</td>
                <td>Fix and squish bugs</td>
                <td>
                    <div class="progress progress-xs progress-striped active">
                        <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                    </div>
                </td>
                <td><span class="badge bg-green">90%</span></td>
            </tr>
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