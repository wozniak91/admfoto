const mix = require('laravel-mix');
// require('laravel-mix-workbox');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.react('resources/js/admin.js', 'public/js')
    .sass('resources/sass/admin.scss', 'public/css');

mix.babelConfig({
    plugins: ['@babel/plugin-syntax-dynamic-import'],
});

