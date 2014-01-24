<?php
class General {
	/**
	 * Checks if the user is logged in
	 * @return boolean True if the user is logged in
	 */
	public function logged_in()
	{
		return (isset($_SESSION['id'])) ? true : false;
	}

	public function logged_out_protect()
	{
		if ( $this->logged_in() === false ) {
			header('Location: index.php');
			exit();
		}
	}


}