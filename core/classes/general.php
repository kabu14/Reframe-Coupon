<?php
/**
 * Author: Wayne Huang
 * Description: General class provides methods for restrictive access to certain pages and for creating a random
 * string for coupon usage
 */
class General {
	/**
	 * Checks if the user is logged in
	 * @return boolean True if the user is logged in
	 */
	public function logged_in()
	{
		return (isset($_SESSION['id'])) ? true : false;
	}

	/**
	 * Redirects a user to index.php if they aren't logged in
	 * 
	 */
	public function logged_out_protect()
	{
		if ( $this->logged_in() === false ) {
			header('Location: index.php');
			exit();
		}
	}

	public function generateRandomString($length = 10)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, strlen($characters) - 1)];
	    }
	    return $randomString;	
	}


}