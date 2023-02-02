const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [])
    .css('resources/css/post/list_post.css', 'public/css/post/list_post.css')
    .css('resources/css/admin/profile.css', 'public/css/admin/profile.css')
    .css('resources/css/category/category.css', 'public/css/category/category.css')
    .css('resources/css/user/home.css', 'public/css/user/home.css');
mix.js('resources/js/comment/comment.js', 'public/js/comment')
    .js('resources/js/comment/active_comment.js', 'public/js/comment');
