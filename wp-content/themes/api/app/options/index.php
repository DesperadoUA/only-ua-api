<?php
include $_SERVER['DOCUMENT_ROOT'].'/wp-config.php';
include  APP_DIR.'functions.php';
$response['main_page_text'] = carbon_get_theme_option('main_page_text');
$response['footer_text'] = carbon_get_theme_option( 'footer_text' );
$response['footer_desc'] = carbon_get_theme_option( 'footer_desc' );
$response['logo'] = carbon_get_theme_option( 'logo' );
$response['partners'] = carbon_get_theme_option( 'partners' );
$response['footer_menu'] = get_menu('footer_menu');
$response['header_menu'] = carbon_get_theme_option('header_menu');
echo json_encode($response);