/* jshint -W098,-W079 */
var require = {
    baseUrl: '../bower_components',
    paths: {
        main: '../scripts/main',
        app: '../scripts/app',
        component: '../scripts/component',
        library: '../scripts/library',
        jquery: 'jquery/dist/jquery',
        loglevel: 'loglevel/dist/loglevel.min',
        bootstrap: '../bower_components/bootstrap/dist/js/bootstrap'
    },
    shim: {
        bootstrap: {deps: ['jquery'], exports: 'jquery'}
    },
    packages: [
        {
            name: 'picturefill',
            main: 'dist/picturefill.js',
            location: 'picturefill'
        }
    ]
};