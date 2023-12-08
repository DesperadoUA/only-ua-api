<?php
$response['status'] = '200';
$arr_blog_id = get_public_blog_id();
$response['body']['ids'] = $arr_blog_id;
$response['body']['posts'] = get_blog_card_data($arr_blog_id);
echo json_encode($response);