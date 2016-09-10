<?php
ob_start();
define('ROOT', __DIR__ . "/../");
define('STATUS', "dev");

require_once ROOT . 'First/Boot/NamespaceAutoloader.php';

$autoloader = new \First\Boot\NamespaceAutoloader();
$autoloader->addNamespace('First', ROOT . 'First');
$autoloader->addNamespace('Application', ROOT . 'Application');
$autoloader->register();


$app = new Application\Bootstrap();
$app->init()->start();
ob_end_flush();
