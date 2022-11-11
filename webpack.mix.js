const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js','asset/dachboard/assets/js','asset/dachboard/assets/css',
     'asset/web/asset/js', 'asset/web/asset/css')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);

    if(mix.inProduction()){
        mix.version();
    }
