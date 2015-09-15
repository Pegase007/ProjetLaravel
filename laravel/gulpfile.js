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
    //mix.styles(['app.css','main.css']).stylesIn ("public/css");

    //mix.sass(['main.sass']).stylesIn ("public/css");
    //mix.scripts(['table.js']).scriptsIn ("public/js");
    mix.scripts(['main.js','ajax.js','app.js'],'public/js/main.js');
    mix.scripts(['gmap.js'],'public/js/gmap.js');
    mix.scripts(['realtime.js'],'public/js/realtime.js');

    //mix.scripts(['app.js'],'public/js/app.js');
    mix.sass(['main.sass'],'public/main.css');







});
