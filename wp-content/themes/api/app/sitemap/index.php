<?php
$response = [];
$response['status'] = '200';
$posts = get_posts( ['numberposts' => -1, 'post_type'   => 'casino'] );
$response['casino'] = get_sitemap_by_arr_posts($posts, 0.9);
$posts = get_posts( ['numberposts' => -1, 'post_type'   => 'game'] );
$response['game'] = get_sitemap_by_arr_posts($posts, 0.9);
$response['static_page'] = get_sitemap_by_arr_posts(get_pages(), 0.9);
echo json_encode($response);