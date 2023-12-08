<?php
include $_SERVER['DOCUMENT_ROOT'].'/wp-config.php';
if(isset($_POST)) {
    $comment_data = [
        'comment_post_ID'      => $_POST['id'],
        'comment_author'       => $_POST['name'],
        'comment_author_email' => $_POST['email'],
        'comment_content'      => $_POST['text'],
        'comment_approved'     => 0,
    ];
    wp_insert_comment( $comment_data );
    $response['status'] = '200';
    echo json_encode($response);
}