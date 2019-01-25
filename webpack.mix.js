let mix = require('laravel-mix');

mix.sass('src/scss/app.scss', 'dist')
   .js('src/js/app.js', 'dist');