<!doctype html>
<html>
<head>
    <title>Reponsive HTML Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>
    {!! Html::style('css/all.css') !!}
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    @yield('head')

</head>
<body>
<header class="sub__header">
    <div class="container">
        <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="navbar-header">
                <h1 class="navbar-brand"><a href="index.html">UNIVERSITY</a></h1>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1,#bs-example-navbar-collapse-2"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>
            <div class="navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.html">Home</a></li>
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages</a>
                        <ul class="dropdown-menu">
                            <li><a href="index_fixed.html">Home / Fixed</a></li>
                            <li><a href="index_with_blog.html">Home + Blog</a></li>
                            <li><a href="portfolio.html">Portfolio</a></li>
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="shortcodes.html">Shortcodes</a></li>
                            <li><a href="blog.html">Blog & News</a></li>
                            <li><a href="tables.html">Tables</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                        </ul>
                    </li>
                    <li><a href="left_sidebar.html">left sidebar</a></li>
                    <li><a href="right_sidebar.html">right sidebar</a></li>
                    <li><a href="full_width.html">full page</a></li>
                    <li><a href="contact.html">contact us</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    </div>
</header>
<!--end of slider section-->
<section class="main__middle__container">

    @yield('content')

</section>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h3>About</h3>
                <p>We strive to deliver a level of service that exceeds the expectations of our customers. <br />
                    <br />
                    If you have any questions about our products or services, please do not hesitate to contact us. We have friendly, knowledgeable representatives available seven days a week to assist you.</p>
            </div>
            <div class="col-md-3">
                <h3>Tweets</h3>
                <p><span>Tweet</span> <a href="#">@You</a><br />
                    Etiam egestas, ipsum posuere accumsan sollicitudin, nulla mauris volutpat sem, sit amet rutrum risus. </p>
                <p><span>Tweet</span> <a href="#">@You</a><br />
                    Quisque porta tellus vitae adipiscing molestie. Mauris et lacus blandit, malesuada.</p>
            </div>
            <div class="col-md-3">
                <h3>Mailing list</h3>
                <p>Subscribe to our mailing list for offers, news updates and more!</p>
                <br />
                <form action="#" method="post" class="form-inline" role="form">
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">your email:</label>
                        <input type="email" class="form-control form-control-lg" id="exampleInputEmail2" placeholder="your email:">
                    </div>
                    <button type="submit" class="btn btn-info btn-md">subscribe</button>
                </form>
            </div>
            <div class="col-md-3">
                <h3>Social</h3>
                <p>123 Business Way<br />
                    San Francisco, CA 94108<br />
                    USA<br />
                    <br />
                    Phone: (888) 123-4567<br />
                    Fax: (887) 123-4567<br />
                    <br />
                </p>
                <div class="social__icons"> <a href="#" class="socialicon socialicon-twitter"></a> <a href="#" class="socialicon socialicon-facebook"></a> <a href="#" class="socialicon socialicon-google"></a> <a href="#" class="socialicon socialicon-mail"></a> </div>
            </div>
        </div>
        <hr>
        <p class="text-center">&copy; Copyright ABC Company. All Rights Reserved.</p>
    </div>
</footer>

{!! Html::script('js/all.js') !!}

@yield('footer')

</body>
</html>