<?php
class Admins {
	private $db;

	public function __construct($database) {
		$this->db = $database;
	}

	public function login($username, $password)
	{
		$query = $this->db->query("SELECT password, id FROM admins WHERE username = ?");
		$query->bindValue(1, $username);

		try {
			$query->execute();
			$data 		     = $query->fetch();
			$stored_password = $data['password'];
			$id 			 = $data['id'];

			// now assuming we have gathered a password from a matching username in the db check against user input
			if ( $stored_password === sha1($password) ) {
				// return the id to use for storing the admin session
				return $id;
			} else {
				return false;
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
}