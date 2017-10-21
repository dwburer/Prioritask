<?php
/**
 * Session control
 *
 * @category   Class
 * @package    com.Prioritask.classes.Session
 * @author     Mitchell M. <mm11096@georgiasouthern.edu>
 * @version    Release: 1.0.0
 * @since      Class available since Release 1.0.0
 */

require_once  __DIR__ . '/../config/global.php'; 

class Session {
	
	private static $self_instance;
	private $mysqli;

	/**
	* Constructs the class, setting the mysqli variable to the active connection
	* @author Mitchell M. 
	* @version 1.1.0
	*/
	public function __construct($dbc) {
		$this->mysqli = $dbc;
		$this->sid = isset($_SESSION['sid']) ? $_SESSION['sid'] : null;
	}

	/**
	* Destructs the class
	* @author Mitchell M. 
	* @version 0.7
	*/
	public function __destruct() {
		
	}

	public static function getInstance($dbc) {
		if(!self::$self_instance){
			self::$self_instance = new Session($dbc);
		}
		return self::$self_instance;
	}

	/**
	* Registers the user into the database
	* @author Mitchell M. 
	* @version 1.0
	*/
	public function register($username, $password, $email) {	}

	/**
	* Sets a users session in the database and sets their client side session
	* @author Mitchell M. 
	* @version 1.0
	*/
	public function login($username, $password) {	}

	/**
	* Validates an active session
	* @author Mitchell M. 
	* @version 1.0
	*/
	public function isLoggedIn() {	return true;	}

	/**
	* Destroys a session and logs a user out;
	* @author Mitchell M. 
	* @version 1.0
	*/
	public function logout() {} 
}

?>