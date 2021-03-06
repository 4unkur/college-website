<!-- Main Header -->
<header class="main-header">
<?php $activeUser = Auth::user() ?>
    <input type="hidden" value="{{ Lang::getLocale() }}" id="locale">
    <!-- Logo -->
    <a href="{{ route('admin.dashboard') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">{{ Setting::get('site_name') }}</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->
                <li>
                    <!-- Menu toggle button -->
                    <a href="{{ route('index') }}" alt="{{ trans('p.frontend') }}" title="{{ trans('p.frontend') }}" target="_blank"><i class="fa fa-desktop"></i></a>
                </li><!-- /.messages-menu -->
                <!-- Notifications Menu -->
                <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ LaravelLocalization::getCurrentLocaleNative() }}</a>
                    <ul class="dropdown-menu">
                        <li>
                            <ul class="menu">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <li>
                                        <a rel="alternate" hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
                                            {{ $properties['native'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </li>
                {{--

<!-- Tasks Menu -->
<li class="dropdown tasks-menu">
    <!-- Menu Toggle Button -->
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-flag-o"></i>
        <span class="label label-danger">9</span>
    </a>
    <ul class="dropdown-menu">
        <li class="header">You have 9 tasks</li>
        <li>
            <!-- Inner menu: contains the tasks -->
            <ul class="menu">
                <li><!-- Task item -->
                    <a href="#">
                        <!-- Task title and progress text -->
                        <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                        </h3>
                        <!-- The progress bar -->
                        <div class="progress xs">
                            <!-- Change the css width attribute to simulate progress -->
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                <span class="sr-only">20% Complete</span>
                            </div>
                        </div>
                    </a>
                </li><!-- end task item -->
            </ul>
        </li>
        <li class="footer">
            <a href="#">View all tasks</a>
        </li>
    </ul>
</li>

--}}
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="{{ url('uploads/images/avatars/square') . '/' . Auth::user()->avatar }}" class="user-image" alt="User Image">
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{ $activeUser->first_name . ' ' . $activeUser->last_name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="{{ url('uploads/images/avatars/square') . '/' . Auth::user()->avatar }}" class="img-circle" alt="User Image">
                            <p>
                                {{ $activeUser->first_name . ' ' . $activeUser->last_name . ' - ' . $activeUser->job }}
                                <small>{{ trans('p.registered_at') . ' ' . \Carbon\Carbon::parse($activeUser->created_at)->format('d/m/Y') }}</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('admin.user.show', [$activeUser->id]) }}" class="btn btn-default btn-flat">{{ trans('p.profile') }}</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('auth/logout') }}" class="btn btn-default btn-flat">{{ trans('p.logout') }}</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="{{ route('admin.settings.index') }}"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>