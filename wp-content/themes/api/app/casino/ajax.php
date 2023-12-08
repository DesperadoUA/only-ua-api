<?php
$response['status'] = '200';
if($_POST['postType'] === 'page') {
  $arr_casino_id = get_public_post_id('casino');
  $response['body']['posts'] = get_casino_card_data($arr_casino_id);   
}
elseif($_POST['postType'] === 'payment') {
  $post_id = url_to_post_id($_POST['postUrl'], $_POST['postType']);
  $query = new WP_Query( array(
            'posts_per_page' => -1,
            'post_type'    => 'casino',
            'post_status'  => 'publish',
            'meta_query' => array(
                'relative' => array(
                    'key'   => '_relative_payment',
                    'value' => $post_id,
                ),
                'rating' => array(
                    'key'  => '_rating',
                    'type' => 'NUMERIC'
                )
            ),
            'orderby' => ['rating'=>'DESC']
        ));
        if(!empty($query->posts)) {
            $arr_id = [];
            foreach ($query->posts as $item) $arr_id[] = $item->ID;
            $casino = get_casino_card_data($arr_id);
        }
  $response['body']['posts'] = $casino;
}
elseif($_POST['postType'] === 'vendor') {
  $post_id = url_to_post_id($_POST['postUrl'], $_POST['postType']);
  $query = new WP_Query( array(
            'posts_per_page' => -1,
            'post_type'    => 'casino',
            'post_status'  => 'publish',
            'meta_query' => array(
                'relative' => array(
                    'key'   => '_relative_vendor',
                    'value' => $post_id,
                ),
                'rating' => array(
                    'key'  => '_rating',
                    'type' => 'NUMERIC'
                )
            ),
            'orderby' => ['rating'=>'DESC']
        ));
        if(!empty($query->posts)) {
            $arr_id = [];
            foreach ($query->posts as $item) $arr_id[] = $item->ID;
            $casino = get_casino_card_data($arr_id);
        }
  $response['body']['posts'] = $casino;
}
echo json_encode($response);