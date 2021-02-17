
<?php 

class Connection
{
	public static function make($config)
	{
	    try {
			return new PDO(
				$config['driver'].':host='.$config['host'].';port='.$config['port'].';dbname='.$config['dbname'], $config['username'], $config['password'], $config['options']
			);
		} catch (PDOException $e) {
			// $e->getMessage();
			die('Could not connect');
		}
	}
}