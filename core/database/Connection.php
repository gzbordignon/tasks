
<?php 

class Connection
{
	public static function make($config)
	{
	    try {
	    	if ($_ENV['APP_ENV'] === 'development') {
				return new PDO(
					$config['driver'].':host='.$config['host'].';port='.$config['port'].';dbname='.$config['dbname'], $config['username'], $config['password'], $config['options']
				);
	    	} else {
				return new PDO(
					$config['driver'].':host='.$config['host'].';port='.$config['port'].';dbname='.$config['dbname'].';user='.$config['username'].';password='.$config['password']
				);
	    	}

		} catch (PDOException $e) {
			// $e->getMessage();
			die('Could not connect');
		}
	}
}