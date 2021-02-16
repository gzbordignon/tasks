<?php 

$router->get('about', 'PagesController@about');
$router->get('search', 'TasksController@search');
$router->get('', 'TasksController@index');
$router->get('tasks/:id', 'TasksController@show');
$router->post('complete_task', 'TasksController@complete_task');
$router->post('tasks', 'TasksController@store');
$router->post('delete_task', 'TasksController@destroy');