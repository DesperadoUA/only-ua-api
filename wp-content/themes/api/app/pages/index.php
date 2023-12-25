<?php
if($_POST['url'] === '/') {
    $id = get_option( 'page_on_front' );
    $response['body'] = get_page_data($id);
    if(empty($response['body'])) $response['status'] = '404';
    else {
        $response['status'] = '200';
        $arr_casino_id = get_public_post_id('casino');
        $response['body']['casino'] = get_casino_card_data($arr_casino_id);
        $bonuses = get_main_bonus_card_data($arr_casino_id); 
        shuffle($bonuses);
        $response['body']['bonuses'] = array_slice($bonuses, 0, NUMBER_BONUSES_MAIN_SLIDER);
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
        $bonuses = get_main_bonus_card_data($arr_casino_id);
        shuffle($bonuses);
        $response['body']['bonuses'] = $bonuses;
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
elseif ($_POST['url'] === 'search') {
	$response['status'] = '200';
	$search_world=$_POST['search_world'];
	$post_args = array(
		'numberposts'=>'-1',
		'post_type'=>array('casino'),
		's'=>$search_world
	);
	$data = [];
	$posts = get_posts($post_args);
	foreach ($posts as $item) {
		$data[] = [
			'permalink' => get_short_link($item->ID),
			'title' => $item->post_title,
            'host' => HOST_URL
		];

	}
	$response['body']['posts'] = $data;
	echo json_encode($response);
}
