<?php

class Router
{

	protected $routes = [
		'GET' => [],
		'POST' => []
	];

	public function get($uri, $controller)
	{
	    $this->routes['GET'][$uri] = $controller;
	}

	public function post($uri, $controller)
	{
	    $this->routes['POST'][$uri] = $controller;
	}

	public static function load($file)
	{
		$router = new static;

	    require $file;
	    
	    return $router;
	}


	public function direct($uri, $requestType)
	{
		if (preg_match('/^[a-z]+\/\d+$/', $uri) === 1) {
			$uri = preg_replace('/\d+/', ':id', $uri);
			if (array_key_exists($uri, $this->routes[$requestType])) {
				return $this->callToAction(
					...explode('@', $this->routes[$requestType][$uri])
				);
			}	
		} elseif (preg_match('/search\?q=[a-z]+/', $uri) === 1) {
			$uri = 'search';
			if (array_key_exists($uri, $this->routes[$requestType])) {
				return $this->callToAction(
					...explode('@', $this->routes[$requestType][$uri])
				);
			}	
		} else {
			if (array_key_exists($uri, $this->routes[$requestType])) {
				return $this->callToAction(
					...explode('@', $this->routes[$requestType][$uri])
				);
			}
		}

		throw new Exception('blu');
 	}

 	protected function callToAction($controller, $action)
 	{
 		$controller = new $controller;

 		if (! method_exists($controller, $action)) {
 			throw new Exception(
 				"blabla"
 			);
 		}

 		return $controller->$action();
 	}
}