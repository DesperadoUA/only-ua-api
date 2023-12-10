<?php
$current_post = [];
$post_id = url_to_post_id($_POST['url'], $_POST['type']);
if($post_id === 0) $response['status'] = '404';
else{
    $response['status'] = '200';
    $response['body'] = get_single_game_data($post_id);
}
echo json_encode($response);