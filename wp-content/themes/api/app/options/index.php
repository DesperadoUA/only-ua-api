<?php
include $_SERVER['DOCUMENT_ROOT'].'/wp-config.php';
include  APP_DIR.'functions.php';
$response['footer_text'] = carbon_get_theme_option( 'footer_text' );
$response['main_page_text'] = carbon_get_theme_option( 'main_page_text' );
$response['security_logo'] = carbon_get_theme_option( 'security_logo' );
$response['logo'] = carbon_get_theme_option( 'logo' );
$response['social'] = carbon_get_theme_option( 'social' );
$response['partners'] = carbon_get_theme_option( 'partners' );
$response['footer_menu'] = get_menu('footer_menu');
echo json_encode($response);