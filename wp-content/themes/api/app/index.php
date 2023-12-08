<?php
include $_SERVER['DOCUMENT_ROOT'].'/wp-config.php';
include 'functions.php';
if($_POST['type'] === 'page') include 'pages/index.php';
elseif ($_POST['type'] === 'casino') include 'casino/index.php';
elseif ($_POST['type'] === 'blog') include 'blog/index.php';
elseif ($_POST['type'] === 'payment') include 'payment/index.php';
elseif ($_POST['type'] === 'vendor') include 'vendor/index.php';
elseif ($_POST['type'] === 'sitemap') include 'sitemap/index.php';
elseif ($_POST['type'] === 'blog_ajax') include 'blog/ajax.php';
elseif ($_POST['type'] === 'casino_ajax') include 'casino/ajax.php';
elseif ($_POST['type'] === 'review_ajax') include 'reviews/ajax.php';