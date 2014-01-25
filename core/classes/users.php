<?php
/**
 * Author: Wayne Huang
 * Description: The Users class allows the addition of user input information into the db. 
 */
class Users {
	private $db;

	public function __construct($database)
	{
		$this->db = $database;
	}

	/**
	 * Add the user information into the users table
	 * @param string $name  First Name
	 * @param string $last  Last Name
	 * @param string $email Email
	 */
	public function add($name, $last, $email, $code, $subscribe)
	{
		$query = $this->db->prepare("INSERT INTO users(name, last, email, code, subscribe) VALUES(?, ?, ?, ?, ?)");
		$query->bindValue(1, $name);
		$query->bindValue(2, $last);
		$query->bindValue(3, $email);
		$query->bindValue(4, $code);
		$query->bindValue(5, $subscribe);

		try {
			$query->execute();
		} catch(PDOException $e) {
			die($e->getMessage());
		}

	}
	
}
