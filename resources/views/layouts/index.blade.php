<!doctype html>
<html>
<head>
    <title>Diploma</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>
    <link href="css/all.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<header class="main__header">
    <div class="container">
        <nav class="navbar navbar-default" role="navigation">
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

@include('partials.slider')

<section class="main__middle__container homepage13">
    <div class="row text-center no-margin nothing">
        <div class="container headings">
            <p class="little"><span>Lorem ipsum dolor site</span></p>
            <h2 class="page_title">PARALLAX ELEMENTS<br />
                <span>clean</span> and <span>high quality
                    </sapn>
                    website.</h2>
            <p class="small-paragraph">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
        </div>
    </div>
    <div class="row  three__blocks text-center no_padding no-margin">
        <div class="container">
            <h2>OUR CREATIVE SERVICES</h2>
            <span class="separator"></span>
            <p class="small-paragraph">Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.</p>
            <div class="col-md-4 img-rounded"> <img src="/front/images/content__images/img1.jpg" alt="image" class="img-responsive img-rounded">
                <h3><a href="#">Creative Design</a></h3>
                <p class="smaller">Vestibulum auctor dapibus neque.</p>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. </p>
                <p><a class="btn btn-info btn-lg" href="#" role="button">Learn more</a>
            </div>
            <div class="col-md-4 img-rounded middle"> <img src="/front/images/content__images/img2.jpg" alt="image" class="img-responsive img-rounded">
                <h3><a href="#">ONLINE MARKETING</a></h3>
                <p class="smaller">Vestibulum auctor dapibus neque.</p>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. </p>
                <p><a class="btn btn-info btn-lg" href="#" role="button">Learn more</a>
            </div>
            <div class="col-md-4 img-rounded"> <img src="/front/images/content__images/img3.jpg" alt="image" class="img-responsive img-rounded">
                <h3><a href="#">SOCIAL MEDIA</a></h3>
                <p class="smaller">Vestibulum auctor dapibus neque.</p>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. </p>
                <p><a class="btn btn-info btn-lg" href="#" role="button">Learn more</a>
            </div>
        </div>
    </div>
    <div class="text-center three-blocks">
        <div class="container">
            <div class="row white__heading">
                <h2>Morbi in sem quis dui placerat ornare. Pellentesque odio nisi Sed arcu. Cras consequat.</h2>
                <p class="little">Richard Johnson</p>
                <p><a class="btn btn-info btn-lg" href="#">read more</a></p>
            </div>
        </div>
    </div>
    <div class="row  three__blocks text-center no_padding no-margin">
        <div class="container">
            <h2>WHAT WE DO</h2>
            <span class="separator"></span>
            <p class="small-paragraph">Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.</p>
            <div class="col-md-6 img-rounded"> <img src="/front/images/content__images/pic1.jpg" alt="pic" class="img-rounded img-responsive">
                <h3>Commodo id natoque malesuada sollicitudin elit suscipit.</h3>
                <p class="smaller">Praesent semper mod quis eget mi. Etiam eu ante risus.</p>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>
                <p><a href="#" class="btn btn-info btn-lg">Learn more</a></p>
            </div>
            <div class="col-md-6 img-rounded"> <img src="/front/images/content__images/pic2.jpg" alt="pic" class="img-rounded img-responsive">
                <h3>Aliquam luctus et mattis lectus Nam nec turpis consequat.</h3>
                <p class="smaller">Praesent semper mod quis eget mi. Etiam eu ante risus.</p>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>
                <p><a href="#" class="btn btn-info btn-lg">Learn more</a></p>
            </div>
        </div>
    </div>
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

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script type="text/javascript" src="js/all.js"></script>
<script type="text/javascript">


</script>
</body>
</html>