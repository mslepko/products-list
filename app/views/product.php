<?php 
$productObj = new \App\Product();
$categoryObj = new \App\Category();

$status = array('disabled', 'active');

if($_GET['product']) {
    include __DIR__ . '/product/show.php';
} else {
    include __DIR__ . '/product/list.php';
}