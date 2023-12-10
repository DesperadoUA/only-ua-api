<?php
include $_SERVER['DOCUMENT_ROOT'].'/wp-config.php';
include 'functions.php';
if($_POST['type'] === 'page') include 'pages/index.php';
elseif ($_POST['type'] === 'casino') include 'casino/index.php';
elseif ($_POST['type'] === 'game') include 'game/index.php';
elseif ($_POST['type'] === 'sitemap') include 'sitemap/index.php';