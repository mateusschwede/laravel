const mix = require('laravel-mix');

mix
    /* Sincronização com Bootstrap css(Não padrão, css customizado) */
    /* Vincular somente css comum do Bootstrap: node_modules/bootstrap/dist/css...*/
    .sass('resources/views/scss/style.scss','public/site/style.css')

    /* Sincronização com jQuery */
    .scripts('node_modules/jquery/dist/jquery.js','public/site/jquery.js')

    /* Sincronização com Bootstrap js */
    .scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.js','public/site/bootstrap.js');