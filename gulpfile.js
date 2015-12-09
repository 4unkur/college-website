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

    //login page assets:
    mix.styles([
        'bootstrap.min.css',
        'login.css'
    ],
    'public/css/login.css');

    mix.scripts([
        'jquery.min.js',
        //'bootstrap.min.js',
        'login.js'
    ],
    'public/js/login.js');

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
