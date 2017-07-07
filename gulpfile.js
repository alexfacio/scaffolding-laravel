process.env.DISABLE_NOTIFIER = true;
const elixir = require('laravel-elixir');
require('laravel-elixir-imagemin');
//require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    elixir.config.sourcemaps = false;
    elixir.config.images = {
        folder: 'img',
        outputFolder: 'assets/img'
    };

    //Refresh
    mix
        .browserSync({
            open: 'external',
            host: 'friedman.dev',
            proxy: 'friedman.dev',
            notify: true,
            port: 3102
        });
    //Admin Friedman
    mix
        .imagemin({
            optimizationLevel: 3,
            progressive: true,
            interlaced: true
        })
        //Styles Vendor
        .sass([
                "vendor/bootstrap/scss/bootstrap.scss",
                "vendor/font-awesome-4.7.0/scss/font-awesome.scss",
                "vendor/jquery-validation-engine/sass/validationEngine.jquery.scss",
                "vendor/jquery-confirm2/css/jquery-confirm.scss",
                "vendor/pace/themes/red/pace-theme-flash.scss",
                "vendor/datatables-dt/css/dataTables.bootstrap4.scss",
                "vendor/datatables-dt/css/dataTables.searchHighlight.scss",
                "vendor/bootstrap-datepicker/css/bootstrap-datepicker3.scss",
                "vendor/highcharts/highcharts.scss",
                "vendor/multiple-select/multiple-select.scss"
            ],
            "public/assets/css/vendor-admin.min.css")
        //Styles Admin
        .sass([
                "admin/app.scss"
            ],
            "public/assets/css/admin.min.css")
        //Scripts Vendor
        .scripts([
                "vendor/html5shiv/dist/html5shiv.js"
            ],
            "public/assets/js/html5shiv.min.js")
        .scripts([
                "vendor/jquery/dist/jquery.js",
                "vendor/tether/dist/js/tether.js",
                "vendor/bootstrap/dist/js/bootstrap.js",
                "vendor/jquery-ajax-retry/dist/jquery.ajax-retry.js",
                "vendor/csrf-token/csrf-token.js",
                "vendor/jquery-validation-engine/js/jquery.validationEngine.js",
                "vendor/jquery-validation-engine/js/languages/jquery.validationEngine-es.js",
                "vendor/jquery-confirm2/js/jquery-confirm.js",
                "vendor/customd-jquery-number/jquery.number.min.js",
                "vendor/alphanum/jquery.alphanum.js",
                "vendor/fastclick/lib/fastclick.js",
                "vendor/pace/pace.js",
                "vendor/teamdf/jquery-number/jquery.number.js",
                "vendor/jquery-slimscroll/jquery.slimscroll.js"
            ],
            "public/assets/js/vendor-admin.min.js")
        //Scripts Admin
        .scripts([
                "admin/admin.js"
            ],
            "public/assets/js/admin.min.js")
        //Scripts Admin Login
        .scripts([
                "admin/login.js"
            ],
            "public/assets/js/login.min.js")
        //Scripts Admin of corps
        .scripts([
                "vendor/datatables/js/jquery.dataTables.js",
                "vendor/datatables-plugins/features/searchHighlight/dataTables.searchHighlight.js",
                "vendor/datatables-plugins/features/searchHighlight/jquery.highlight.js",
                "vendor/datatables/js/dataTables.bootstrap4.js",
                "vendor/datatables-responsive/js/dataTables.responsive.js",
                "vendor/datatables-responsive/js/responsive.bootstrap4.js",
                "vendor/tocasetext/toCaseText.js",
                "admin/admin-corps.js"
            ],
            "public/assets/js/admin-corps.min.js")
        //Scripts Admin Industries
        .scripts([
                "vendor/datatables/js/jquery.dataTables.js",
                "vendor/datatables/js/dataTables.bootstrap4.js",
                "vendor/datatables-responsive/js/dataTables.responsive.js",
                "vendor/datatables-responsive/js/responsive.bootstrap4.js",
                "admin/admin-industries.js"
            ],
            "public/assets/js/admin-industries.min.js")
        //Scripts Reset Password
        .scripts([
                "admin/admin-resetpass.js"
            ],
            "public/assets/js/admin-resetpass.min.js")
        //Scripts Admin Setup
        .scripts([
                "admin/admin-setup.js"
            ],
            "public/assets/js/admin-setup.min.js")
        //Scripts Admin Roles
        .scripts([
                "vendor/datatables/js/jquery.dataTables.js",
                "vendor/datatables/js/dataTables.bootstrap4.js",
                "vendor/datatables-plugins/features/searchHighlight/dataTables.searchHighlight.js",
                "vendor/datatables-plugins/features/searchHighlight/jquery.highlight.js",
                "vendor/datatables-responsive/js/dataTables.responsive.js",
                "vendor/datatables-responsive/js/responsive.bootstrap4.js",
                "vendor/datatables-rowsgroup/dataTables.rowsGroup.js",
                "vendor/multiple-select/multiple-select.js",
                "admin/admin-roles.js"
            ],
            "public/assets/js/admin-roles.min.js")
        //Scripts Admin Massive RDS
        .scripts([
                "admin/admin-massiverds.js"
            ],
            "public/assets/js/admin-massiverds.min.js")
        //Scripts Admin RDS
        .scripts([
                "vendor/datatables/js/jquery.dataTables.js",
                "vendor/datatables/js/dataTables.bootstrap4.js",
                "vendor/datatables-plugins/features/searchHighlight/dataTables.searchHighlight.js",
                "vendor/datatables-plugins/features/searchHighlight/jquery.highlight.js",
                "vendor/datatables-responsive/js/dataTables.responsive.js",
                "vendor/datatables-responsive/js/responsive.bootstrap4.js",
                "vendor/datatables-rowsgroup/dataTables.rowsGroup.js",
                "vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.js",
                "vendor/bootstrap-datepicker/js/locales/bootstrap-datepicker.es.js",
                "vendor/moment/moment.js",
                "vendor/moment/locale/es.js",
                //"vendor/moment-range/lib/moment-range.js",
                "admin/admin-rds.js"
            ],
            "public/assets/js/admin-rds.min.js")
        //Scripts Admin Reporte por Industrias
        .scripts([
                "vendor/highcharts/highcharts.js",
                "vendor/highcharts/highcharts-3d.js",
                "vendor/highcharts/modules/exporting.js",
                "vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.js",
                "vendor/bootstrap-datepicker/js/locales/bootstrap-datepicker.es.js",
                "admin/admin-repoindustria.js"
            ],
            "public/assets/js/admin-repoindustria.min.js")
        .version([
            "public/assets/css/vendor-admin.min.css",
            "public/assets/css/admin.min.css",
            "public/assets/js/vendor-admin.min.js",
            "public/assets/js/login.min.js",
            "public/assets/js/admin.min.js",
            "public/assets/js/admin-industries.min.js",
            "public/assets/js/admin-setup.min.js",
            "public/assets/js/admin-resetpass.min.js",
            "public/assets/js/admin-roles.min.js",
            "public/assets/js/admin-massiverds.min.js",
            "public/assets/js/admin-rds.min.js",
            "public/assets/js/admin-repoindustria.min.js"
        ]);
});