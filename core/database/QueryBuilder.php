<?php

class QueryBuilder
{
	protected $pdo;

	public function __construct($pdo)
	{
	    $this->pdo = $pdo;
	}

	public function allPending($table)
	{
	    $statement = $this->pdo->prepare("select * from {$table} where completed=0");

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS);
	}

	public function allDone($table)
	{
	    $statement = $this->pdo->prepare("select * from {$table} where completed=1");

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS);
	}

	public function all($table)
	{
	    $statement = $this->pdo->prepare("select * from {$table}");

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS);
	}

	public function find($table, $id)
	{
	    $statement = $this->pdo->prepare("select * from {$table} where id={$id}");

		$statement->execute();

		return $statement->fetch();
	}

	public function insert($table, $parameters)
	{
	    $sql = sprintf(
	    	'insert into %s (%s) values (%s)',
	    	$table,
	    	implode(', ', array_keys($parameters)),
	    	':' . implode(', :', array_keys($parameters))
	    );

	    try {
	    	$statement = $this->pdo->prepare($sql);
	    
	    	$statement->execute($parameters);
	    } catch (Exception $e) {
	    	die('Something went wrong.');
	    }
	}
	public function completeTask($id)
	{
		$statement = $this->pdo->prepare("update tasks set completed=1 where id={$id}");

		$statement->execute();
	}
	public function delete($table, $id)
	{
		$statement = $this->pdo->prepare("delete from tasks where id={$id}");

		$statement->execute();
	}
}