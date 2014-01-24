<?php
class Users {
	private $db;

	public function __construct($database)
	{
		$this->db = $database;
	}

	public function add($name, $last, $email)
	{
		$query = $this->db->prepare("INSERT INTO users(name, last, email) VALUES(?, ?, ?)");
		$query->bindValue(1, $name);
		$query->bindValue(2, $last);
		$query->bindValue(3, $email);

		try {
			$query->execute();
		} catch(PDOException $e) {
			die($e->getMessage());
		}

	}
	
}
