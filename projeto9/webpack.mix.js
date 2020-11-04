const mix = require('laravel-mix');

/*mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
*/

mix

/* Mix referentes ao site */
.styles([
    'resources/views/site/css/reset.css',
    'resources/views/site/css/style.css'
],'public/site/css/style.css') //Caminho origem do arquivo(s), Caminho destino do arquivo
.scripts([
    'resources/views/site/js/script.js'
],'public/site/js/script.js')

/* Mix referentes ao admin */
.styles([
    'resources/views/admin/css/style.css'
],'public/admin/css/style.css')
.scripts([
    'resources/views/admin/js/script.js'
],'public/admin/js/script.js')

.version();