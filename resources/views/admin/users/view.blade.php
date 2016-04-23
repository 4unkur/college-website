@extends('admin.master')

@section('content')
<div class="col-md-6">

    <!-- Profile Image -->
    <div class="box box-primary">
        <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="{{ url('uploads/images/avatars/square') }}/{{ $user->avatar }}" alt="User profile picture">
            <h3 class="profile-username text-center">{{ $user->first_name }} {{ $user->last_name }}</h3>
            <p class="text-muted text-center">{{ $user->job }}</p>

            {{--<ul class="list-group list-group-unbordered">--}}
                {{--<li class="list-group-item">--}}
                    {{--<b>Followers</b> <a class="pull-right">1,322</a>--}}
                {{--</li>--}}
                {{--<li class="list-group-item">--}}
                    {{--<b>Following</b> <a class="pull-right">543</a>--}}
                {{--</li>--}}
                {{--<li class="list-group-item">--}}
                    {{--<b>Friends</b> <a class="pull-right">13,287</a>--}}
                {{--</li>--}}
            {{--</ul>--}}

            <a href="mailto:{{ $user->email }}" class="btn btn-primary btn-block"><b>{{ trans('p.send_email') }}</b></a>
        </div><!-- /.box-body -->
    </div><!-- /.box -->

    <!-- About Me Box -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">About Me</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <strong><i class="fa fa-book margin-r-5"></i> {{ trans('p.education') }}</strong>
            <p class="text-muted">{{ $user->education }}</p>
            <hr>

            <strong><i class="fa fa-map-marker margin-r-5"></i> {{ trans('p.location') }}</strong>
            <p class="text-muted">Бишкек, Кыргызстан</p>
            <hr>

            {{--<strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>--}}
            {{--<p>--}}
                {{--<span class="label label-danger">UI Design</span>--}}
                {{--<span class="label label-success">Coding</span>--}}
                {{--<span class="label label-info">Javascript</span>--}}
                {{--<span class="label label-warning">PHP</span>--}}
                {{--<span class="label label-primary">Node.js</span>--}}
            {{--</p>--}}
            {{--<hr>--}}

            <strong><i class="fa fa-calendar margin-r-5"></i> {{ trans('p.birth_date') }}</strong>
            <p class="text-muted">{{ $user->birth_date }}</p>
            <hr>

            <strong><i class="fa fa-file-text-o margin-r-5"></i> {{ trans('p.bio') }}</strong>
            <div>{!! $user->bio !!}</div>
            <hr>

            <strong><i class="fa fa-inbox margin-r-5"></i> {{ trans('p.contacts') }}</strong>
            <p><span class="fa fa-phone"> <a href="tel:{{ $user->phone }}">{{ $user->phone }}</a></span></p>
            <p><span class="fa fa-envelope"> <a href="mailto:{{ $user->email }}">{{ $user->email }}</a></span></p>
            <hr>

            <strong><i class="fa fa-share-alt margin-r-5"></i> {{ trans('p.social') }}</strong>
            <div>
                @if ($user->fb) <p><span class="fa fa-facebook-official"></span> <a href="https://facebook.com/{{ $user->fb }}">{{ $user->fb }}</a></p> @endif
                @if ($user->twitter) <p><span class="fa fa-twitter"></span> <a href="https://twitter.com/{{ $user->twitter }}">&commat;{{ $user->twitter }}</a></p> @endif
                @if ($user->gplus) <p><span class="fa fa-google-plus"></span> <a href="https://plus.google.com/{{ $user->gplus }}">{{ $user->gplus }}</a></p> @endif
                @if ($user->instagram) <p><span class="fa fa-instagram"></span> <a href="https://facebook.com/{{ $user->instagram }}">{{ $user->instagram }}</a></p> @endif
            </div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>
    <div class="col-md-6"></div>
@stop