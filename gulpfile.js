var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.sass(['app.scss', 'style.scss'], 'resources/assets/css');

    mix.styles([
        'bootstrap.min.css',
        'magnific-popup.css',
        'app.css',
        'style.css'
    ]);

    mix.scripts([
        'jquery.min.js',
        'bootstrap.min.js',
        'jquery.magnific-popup.js',
        'jquery.mixitup.min.js'
    ]);

    //admin login/registration page assets:
    mix.styles([
        'bootstrap/css/bootstrap.min.css',
        'css/login.css',
        'dist/css/AdminLTE.min.css',
        'plugins/iCheck/square/blue.css'
    ],
    'public/css/login.css',
    'resources/assets/AdminLTE');

    mix.scripts([
        'plugins/jQuery/jQuery-2.1.4.min.js',
        'bootstrap/js/bootstrap.min.js',
        'plugins/iCheck/icheck.min.js',
        'js/login.js'
    ],
    'public/js/login.js',
    'resources/assets/AdminLTE');

    //admin panel's assets
    mix.styles([
        'bootstrap/css/bootstrap.min.css',
        'dist/css/AdminLTE.min.css',
        'dist/css/skins/skin-green.min.css',
        'css/sweetalert.css',
        'css/app.css',
        'css/dataTables.bootstrap.min.css',
    ],
    'public/AdminLTE',
    'resources/assets/AdminLTE');

    mix.scripts([
        'plugins/jQuery/jQuery-2.1.4.min.js',
        'bootstrap/js/bootstrap.min.js',
        'dist/js/app.min.js',
        'js/sweetalert.min.js',
        'js/delete-file.js',
        'js/delete-image.js',
        'js/grid.js',
        'js/jquery.dataTables.min.js',
        'js/dataTables.bootstrap.min.js',
        'js/app.js'
    ],
    'public/AdminLTE',
    'resources/assets/AdminLTE');
});
