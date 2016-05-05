<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ Setting::get('site_name') }}</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' rel='stylesheet'>
    <style>
        body {
            font-family: 'Open Sans';
        }
        .container {
            padding-top: 50px;
        }
        footer {
            padding-top: 150px;
        }
    </style>
</head>
<body>
    <div class="container center text-center">
        {!! Html::image('css/503.jpg', null, ['class' => 'image-responsive']) !!}
        <h1>
            {{ trans('p.site_under_construction') }}
        </h1>
        <h2>
            {{ trans('p.available_soon') }}
        </h2>
    </div>
    <footer class="text-center">
        <small>&copy; {{ date('Y') . ' - ' . trans('p.copyright') }}. {!! link_to_route('index', Setting::get('site_name')) !!} </small>
    </footer>
</body>
</html>