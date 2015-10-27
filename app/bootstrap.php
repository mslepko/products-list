<?php

$baseDir = dirname(__FILE__);
require $baseDir . '/Autoload.php';
new Autoloader();

$credentails = require $baseDir . '/config/db.php';


$app = new \App\App();

$app->start($credentails);