var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.sass(['app.scss', 'style.scss'], 'resources/assets/css');

    mix.styles([
        'bootstrap.min.css',
        'magnific-popup.css',
        'app.css'
    ]);

    mix.scripts([
        'jquery.min.js',
        'bootstrap.min.js',
        'jquery.magnific-popup.js',
        'jquery.mixitup.min.js',
        'slider.js'
    ]);

    //admin login/registration page assets:
    mix.styles([
        'bootstrap/css/bootstrap.min.css',
        'login.css',
        'dist/css/AdminLTE.min.css',
        'plugins/iCheck/square/blue.css'
    ],
    'public/css/login.css',
    'resources/assets/AdminLTE');

    mix.scripts([
        'plugins/jQuery/jQuery-2.1.4.min.js',
        'bootstrap/js/bootstrap.min.js',
        'plugins/iCheck/icheck.min.js',
        'login.js'
    ],
    'public/js/login.js',
    'resources/assets/AdminLTE');

    //admin panel's assets
    mix.styles([
        'bootstrap/css/bootstrap.min.css',
        'dist/css/AdminLTE.min.css',
        'dist/css/skins/skin-green.min.css'
    ],
    'public/AdminLTE',
    'resources/assets/AdminLTE');

    mix.scripts([
        'plugins/jQuery/jQuery-2.1.4.min.js',
        'bootstrap/js/bootstrap.min.js',
        'dist/js/app.min.js'
    ],
    'public/AdminLTE',
    'resources/assets/AdminLTE');
});
