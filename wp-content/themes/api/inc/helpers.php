<?php 
function mapConfigForRelative($data) {
    $result = [];
    foreach($data as $key => $val) $result[$key] = $val['title'];
    return $result;
}