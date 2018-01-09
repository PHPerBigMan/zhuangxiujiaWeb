let mix = require('laravel-mix')
let proxy = require('http-proxy-middleware')

let uploads = proxy('/uploads', {
    target: 'http://zxzj.wf.sunday.so',
    changeOrigin: true,
    logLevel: 'debug'
})

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.webpackConfig({
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/assets/')
        }
    }
})

mix.js('resources/assets/js/pc.js', 'public/js')
    .sass('resources/assets/sass/pc.scss', 'public/css')
    .browserSync({
        proxy: 'localhost:10003',
        notify: false,
        middleware: [uploads],
    })

if (mix.config.inProduction) {
    mix.version();
}
