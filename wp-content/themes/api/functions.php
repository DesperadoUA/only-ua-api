<?php
define('ROOT_DIR', __DIR__);
include 'inc/helpers.php';
include 'inc/headers.php';
include 'inc/post_types/casino.php';
include 'inc/post_types/bonus.php';
include 'inc/post_types/game.php';
include 'components/index.php';
add_theme_support( 'post-thumbnails' );
add_theme_support('menus');
add_filter('wp_insert_post_data', function ($data, $postarr) { $data['post_content'] = wpautop($data['post_content']); return $data; }, 10, 2);
define('APP_DIR', __DIR__.'/app/');
define('DEFAULT_META_SETTINGS', [
    'classification' => 'онлайн казино',
    'distribution'   => 'Ukraine',
    'author'         => 'onlinecasino.in.ua',
    'creator'        => 'onlinecasino.in.ua',
    'copyright'      => 'onlinecasino.in.ua',
    'publisher'      => 'onlinecasino.in.ua',
    'placename'      => 'вулиця Жилянська, 30-32, Київ, Украина, 02000',
    'position'       => '30.5108240;50.4345170',
    'region'         => 'UA-город Киев',
    'ICBM'           => '30.5108240, 50.4345170',
    'robots'         => 'index, follow'
]);