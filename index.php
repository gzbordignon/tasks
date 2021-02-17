<?php
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require 'core/bootstrap.php';




Router::load('routes.php')->direct(Request::uri(), Request::method());