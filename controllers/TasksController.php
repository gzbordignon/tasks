<?php

class TasksController
{

	public function search()
	{
	    if ($_GET['q'] === 'pending') {
	    	$tasks = App::get('database')->allPending('tasks');
	    } elseif ($_GET['q'] === 'done') {
	    	$tasks = App::get('database')->allDone('tasks');
	    } else {
	    	$tasks = App::get('database')->all('tasks');
	    }
	    require 'views/index.view.php';
	}
	public function index()
	{
	    $tasks = App::get('database')->allPending('tasks');

		require 'views/index.view.php';
	}
	public function show()
	{
	    $id = preg_replace('/\/[a-z]+\//', '', $_SERVER['REQUEST_URI']);

		$task = App::get('database')->find('tasks', $id);

		require 'views/tasks/show.view.php';
	}

	public function store()
	{
		if (! empty($_POST['description'])) {
		    App::get('database')->insert('tasks', [
				'description' => $_POST['description']
			]);
		}
		header('Location: /');
	}

	public function complete_task()
	{
	    App::get('database')->completeTask($_POST['id']);
	    header('Location: /');
	}
	public function destroy()
	{
	    App::get('database')->delete('tasks', $_POST['id']);
	    header('Location: /');
	}
}