<?php
if($_POST['url'] === '/') {
    $id = get_option( 'page_on_front' );
    $response['body'] = get_page_data($id);
    if(empty($response['body'])) $response['status'] = '404';
    else {
        $response['status'] = '200';
        $arr_casino_id = get_public_post_id('casino');
        $response['body']['casino'] = get_casino_card_data($arr_casino_id);
    }
    echo json_encode($response);
}
elseif ($_POST['url'] === 'bonuses') {
    $id = url_to_post_id($_POST['url'], $_POST['type']);
    $response['body'] = get_page_data($id);
    if(empty($response['body'])) $response['status'] = '404';
    else {
        $response['status'] = '200';
    }
    echo json_encode($response);
}
elseif ($_POST['url'] === 'games') {
    $id = url_to_post_id($_POST['url'], $_POST['type']);
    $response['body'] = get_page_data($id);
    if(empty($response['body'])) $response['status'] = '404';
    else {
        $response['status'] = '200';
    }
    echo json_encode($response);
}
