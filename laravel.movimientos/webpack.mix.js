const mix = require('laravel-mix');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .version()
    .sourceMaps();

mix.webpackConfig({
    plugins: [
        new BrowserSyncPlugin({
            host: 'localhost',
            port: 3000,
            proxy: 'http://your-app.test', // Cambia esto por la URL de tu aplicación
            files: [
                'app/**/*.php',
                'resources/views/**/*.blade.php',
                'public/js/**/*.js',
                'public/css/**/*.css'
            ],
            reloadDelay: 500, // Añade un pequeño retraso para evitar recargas continuas
        }, {
            reload: true
        })
    ]
});
