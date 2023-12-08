<?php
include $_SERVER['DOCUMENT_ROOT'].'/wp-config.php';
include 'functions.php';
$posts = get_posts( ['numberposts' => -1, 'post_type'   => 'vendor'] );
$response['vendors'] = get_sitemap_by_arr_posts($posts);
echo "<pre>";
var_dump($response['vendors']);
echo "</pre>";