const mix = require("laravel-mix");
require("laravel-mix-purgecss");

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

mix.js("resources/js/app.js", "public/js")
    .copy("resources/img", "public/img")
    .sass("resources/sass/app.scss", "public/css")
    /** Admin */
    .scripts(["resources/js/company.js"], "public/js/company.js")
    .scripts(["resources/js/address.js"], "public/js/address.js")
    .scripts(["resources/js/phone.js"], "public/js/phone.js")
    /** LaunchPage */
    .copy("resources/launch_page/assets/fonts", "public/launch_page/fonts")
    .copy(
        "resources/launch_page/assets/vendors/bootstrap/grid.css",
        "public/launch_page/vendors/bootstrap/grid.css"
    )
    .copy(
        "resources/launch_page/assets/vendors/YTPlayer/css/jquery.mb.YTPlayer.min.css",
        "public/launch_page/vendors/bootstrap/YTPlayer/css/YTPlayer.css"
    )
    .copy(
        "resources/launch_page/assets/vendors/vegas/vegas.min.css",
        "public/launch_page/vendors/vegas/vegas.css"
    )
    .sass(
        "resources/launch_page/assets/sass/main.scss",
        "public/launch_page/main.css"
    )
    .scripts(
        "node_modules/jquery/dist/jquery.min.js",
        "public/launch_page/vendors/jquery/jquery.js"
    )
    .scripts(
        "resources/launch_page/assets/vendors/jquery.countdown/jquery.countdown.min.js",
        "public/launch_page/vendors/jquery.countdown/jquery.countdown.js"
    )
    .scripts(
        "resources/launch_page/assets/vendors/flat-surface-shader/fss.min.js",
        "public/launch_page/vendors/flat-surface-shader/fss.js"
    )
    .scripts(
        "resources/launch_page/assets/vendors/particles.js/particles.js",
        "public/launch_page/vendors/particles.js/particles.js"
    )
    .scripts(
        "resources/launch_page/assets/vendors/waterpipe/waterpipe.js",
        "public/launch_page/vendors/waterpipe/waterpipe.js"
    )
    .scripts(
        "resources/launch_page/assets/js/main.js",
        "public/launch_page/js/main.js"
    )
    .scripts(
        "resources/launch_page/assets/vendors/quietflow/quietflow.min.js",
        "public/launch_page/vendors/quietflow/quietflow.js"
    )
    .scripts(
        "resources/launch_page/assets/vendors/YTPlayer/jquery.mb.YTPlayer.min.js",
        "public/launch_page/vendors/YTPlayer/YTPlayer.js"
    )
    .scripts(
        "resources/launch_page/assets/vendors/vegas/vegas.min.js",
        "public/launch_page/vendors/vegas/vegas.js"
    )

    .options({
        processCssUrls: false,
    })
    .sourceMaps()
    .purgeCss();
