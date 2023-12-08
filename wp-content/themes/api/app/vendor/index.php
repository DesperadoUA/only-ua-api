<?php
$current_post = [];
$post_id = url_to_post_id($_POST['url'], $_POST['type']);
if($post_id === 0) $response['status'] = '404';
else{
    $response['status'] = '200';
    $current_post = get_single_vendor_data($post_id);
    $response['body'] = $current_post;
    $response['body']['meta'] = DEFAULT_META_SETTINGS;
}
echo json_encode($response);