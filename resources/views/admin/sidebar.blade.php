<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ url('uploads/images/avatars/square') . '/' . Auth::user()->avatar }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i>{{ trans('p.online') }}</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form name="cse" id="searchbox_demo" class="sidebar-form" action="https://www.google.com/cse">
            <div class="input-group">
                <!-- Use of this code assumes agreement with the Google Custom Search Terms of Service. -->
                <!-- The terms of service are available at http://www.google.com//cse/docs/tos.html -->
                <input type="hidden" name="cref" value="">
                <input type="hidden" name="ie" value="utf-8">
                <input type="hidden" name="hl" value="">
                <input name="q" type="text" class="form-control" size="40" placeholder="{{ trans('p.search') }}...">
                <script type="text/javascript" src="https%3A%2F%2Fcse.google.com%2Fcse/tools/onthefly?form=searchbox_demo&lang="></script>
                <div class="input-group-btn">
                    <button type="submit" name="sa" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('p.menu') }}</li>
            @include('admin.menu.left-sidebar')
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>