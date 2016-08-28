var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

    mix.styles([
        'libs/bootstrap-paper.css',
        'app.css'
    ], './public/css/main.css');

    mix.scripts([
        'libs/jquery-3.1.0.min.js',
        'libs/bootstrap.js',
        'libs/vue.js',
        'app.js'
    ], 'public/js/main.js');

});
