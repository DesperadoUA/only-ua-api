<?php
if($_POST['url'] === '/') {
    $id = get_option( 'page_on_front' );
    $response['body'] = get_page_data($id);
    if(empty($response['body'])) $response['status'] = '404';
    else {
        $response['status'] = '200';
        $arr_casino_id = get_public_post_id('casino');
        $response['body']['casino'] = get_casino_card_data($arr_casino_id);
        $relative_blog = carbon_get_theme_option( 'relative_blog' );
        $response['body']['blog'] = get_blog_card_data($relative_blog);
        $response['body']['meta'] = DEFAULT_META_SETTINGS;
    }
    echo json_encode($response);
}
elseif ($_POST['url'] === 'igrovue-avtomatu') {
    $id = url_to_post_id($_POST['url'], $_POST['type']);
    $response['body'] = get_page_data($id);
    if(empty($response['body'])) $response['status'] = '404';
    else {
        $response['status'] = '200';
        $arr_casino_id = get_public_post_id('casino');
        $response['body']['casino'] = get_casino_card_data($arr_casino_id);
        $relative_blog = carbon_get_theme_option( 'relative_blog' );
        $response['body']['blog'] = get_blog_card_data($relative_blog);
        $response['body']['meta'] = DEFAULT_META_SETTINGS;
    }
    echo json_encode($response);
}
elseif ($_POST['url'] === 'bonuses') {
    $id = url_to_post_id($_POST['url'], $_POST['type']);
    $response['body'] = get_page_data($id);
    if(empty($response['body'])) $response['status'] = '404';
    else {
        $response['status'] = '200';
        $arr_casino_id = get_public_post_id('casino');
        $response['body']['casino'] = get_casino_card_data($arr_casino_id);
        $relative_blog = carbon_get_theme_option( 'relative_blog' );
        $response['body']['blog'] = get_blog_card_data($relative_blog);
        $response['body']['meta'] = DEFAULT_META_SETTINGS;
    }
    echo json_encode($response);
}
elseif ($_POST['url'] === 'blog') {
    $id = url_to_post_id($_POST['url'], $_POST['type']);
    $response['body'] = get_page_data($id);
    if(empty($response['body'])) $response['status'] = '404';
    else {
        $response['status'] = '200';
        $arr_blog_id = get_public_blog_id();
        $response['body']['ids'] = $arr_blog_id;
        $response['body']['blog'] = get_blog_card_data($arr_blog_id);
        $response['body']['meta'] = DEFAULT_META_SETTINGS;
    }
    echo json_encode($response);
}
