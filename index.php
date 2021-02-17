<?php
require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
 
 die($_ENV['APP_ENV']);


// require 'core/bootstrap.php';





// Router::load('routes.php')->direct(Request::uri(), Request::method());