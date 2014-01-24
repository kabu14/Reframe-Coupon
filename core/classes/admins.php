<?php
class Admins {
	private $db;

	public function __construct($database) {
		$this->db = $database;
	}

	/**
	 * Validates if the admin exists in the db
	 * @param  string $username Username of admin
	 * @return boolean          True if admin exists
	 */
	public function admin_exists($username)
	{
		$query = $this->db->prepare("SELECT 'COUNT(id)' FROM admins WHERE username = ?");
		$query->bindValue(1,$username);

		try {
			$query->execute();
			$result = $query->fetchColumn();

			if ( $result ) {
				return true;
			}
			else {
				return false;
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	/**
	 * Logs the admin into the admin panel
	 * @param  string $username Username of admin
	 * @param  string $password Password
	 * @return string           The id of the admin is returned for storing a session
	 */
	public function login($username, $password)
	{
		$query = $this->db->prepare("SELECT password, id FROM admins WHERE username = ?");
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

	/**
	 * Gathers all rows and orders by name from a selected table
	 * @param  string $tablename Table name of interest
	 * @return array             The entire rows and columns of the table
	 */
	public function gather($tablename)
	{
		try {
			$result = $this->db->query("SELECT * FROM $tablename ORDER BY name");
			return ( $result->rowCount() > 0 )
				? $result
				: false;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
}