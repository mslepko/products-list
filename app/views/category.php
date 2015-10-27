<?php 
$categoryObj = new \App\Category();

$status = array('disabled', 'active');

if($_GET['category']) {
    include __DIR__ . '/category/show.php';
} else {
    include __DIR__ . '/category/list.php';
}