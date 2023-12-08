<?php
$response['status'] = '200';
$post_id = url_to_post_id($_POST['postUrl'], $_POST['postType']);
$reviews = carbon_get_post_meta($post_id, 'reviews_casino');
$response['body']['posts'] = $reviews;
echo json_encode($response);