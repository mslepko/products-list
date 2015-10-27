<?php 
require __DIR__ . '/app/bootstrap.php';

if (isset($_GET['category'])) {
    $active = 'category';
} elseif(isset($_GET['product'])) {
    $active = 'product';
} else {
    $active = false;
}

?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>RLA - test</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="/css/normalize.css">
        <link rel="stylesheet" href="/css/main.css">
        <script src="/js/vendor/modernizr-2.8.3.min.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="container-fluid">
        <h1>Hello!</h1>

        <ul class="nav nav-tabs">
            <li role="presentation" <?=!$active ? 'class="active"' : '';?>>
                <a href="/">Home</a>
            </li>
            <li role="presentation" <?=$active == 'category' ? 'class="active"' : '';?>>
                <a href="/category">Categories</a>
            </li>
            <li role="presentation" <?=$active == 'product' ? 'class="active"' : '';?>>
                <a href="/product">Products</a>
            </li>
        </ul>

        <?php
        if (isset($_GET['category'])) {
            include __DIR__ . '/app/views/category.php';
        } elseif(isset($_GET['product'])) {
            include __DIR__ . '/app/views/product.php';
        } else {
            include __DIR__ . '/app/views/dashboard.php';
        }
        ?>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
        <script src="/js/plugins.js"></script>
        <script src="/js/main.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
    </body>
</html>
