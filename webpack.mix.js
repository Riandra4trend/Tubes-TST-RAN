let mix = require('laravel-mix');

mix.js('laravel-mix/js/app.js', 'public/js').postCss('laravel-mix/css/app.css', 'public/css', [
    require('tailwindcss'),
]);