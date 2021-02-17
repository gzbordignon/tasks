<?php

return [
	'database' => [
		'driver' => $_ENV['DB_DRIVER'],
		'host' => $_ENV['DB_HOST'],
		'port' => $_ENV['DB_PORT'],
		'dbname' => $_ENV['DB_NAME'],
		'username' => $_ENV['DB_USERNAME'],
		'password' => $_ENV['DB_PASSWORD'],
		'options' => [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		]
	]	
];