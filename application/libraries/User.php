<?php
/**
 * Sportz
 *
 * A web application for sports enthusiasts
 *
 * @package		Sportz
 * @author		The San Diego PHP Study group (SDPHP-SG) team.
 * @copyright	Copyright (c) SDPHP-SG.
 * @license
 * @link
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Sportz User Class
 *
 * This class provides user management including creating and logging in.
 *
 *
 * @package		Sportz
 * @subpackage	Libraries
 * @category	Libraries
 * @author		The SDPHP-SG team
 * @author		Matt Gass
 * @link
 */
class User {

	public $errors = array();

	public $id;
	public $donor_id;
	public $username;
	public $fullname;
	public $password_hint;
	public $email;
	public $validated;
	public $is_admin;
	public $last_session_id;

	private $user_welcome_msg;
	private $admin_validate_msg;
	private $enc_password;
	private $persist;

	function __construct() {
		$this->username = NULL;
		$this->password = NULL;

	}//end function __construct

	// --------------------------------------------------------------------

	/**
	 * Check if user is logged in
	 *
	 * @return	boolean
	 */
	public function isLoggedIn() {
		//check if cookies are set with username/password
		$username = Cookie::getCookie("sportz_a");
		$password = Cookie::getCookie("sportz_b");
		if( $username and $password ) {
			if($this->validateExistingUser($username, $password, $enc=TRUE)) {
				return TRUE;
			}
		}else {
			return FALSE;
		}

		//check if session exists

	}// end function checkLoggedIn

	public function validateNewUser($username, $password, $repassword=NULL, $hint=NULL, $email=NULL, $fullname=NULL) {
		$valid_username =	$this->validateUserName($username);
		$valid_password =	$this->validatePassword($password, $repassword);
		$valid_hint =		$this->validateHint($hint);
		$valid_fullname =	$this->validateFullName($fullname);
		$valid_email =		$this->validateEmail($email);

		if($valid_username and $valid_password and $valid_hint and $valid_fullname and $valid_email) {
			return true;
		}else {
			return false;
		}
	}//end function validateNewUser

	public function validateExistingUser($username=NULL, $password=NULL, $enc=FALSE) {
		global $sportz_db;

		if($username == null) {
			$this->errors["username"] = ("*** User name cannot be blank ***");
			return false;
		}

		if($password == null) {
			$this->errors["password"] = ("*** Password cannot be blank ***");
			return false;
		}

		//check if user name/password exists in database
		//if password is already encoded, no need to re-encode it
		$enc?$enc_password=$password:$enc_password = crypt($password, $username);
		$username = strtolower($username);
		$sql  =	"SELECT *";
		$sql .=	" FROM users";
		$sql .=	" WHERE username = " . '"' . $username . '"';
		$sql .= " and password = " . '"' . $enc_password . '"';
		$sql .=	" LIMIT 1";
		$sportz_db->select($sql);
		$row_found = $sportz_db->result->num_rows;

		//if row was found user/password is valid so retrieve user info
		if($row_found) {
			$row = $sportz_db->fetchRecordAssoc();
			//make sure user is validated and associated with a donor id
			if($row["validated"] and $row["donor_id"]) {
				$this->id = $row["id"];
				$this->donor_id = $row["donor_id"];
				$this->username = $row["username"];
				$this->fullname = $row["fullname"];
				$this->password_hint = $row["password_hint"];
				$this->email = $row["email"];
				$this->validated = $row["validated"];
				$this->is_admin = $row["is_admin"];
				$this->last_session_id = $row["last_session_id"];
				$this->enc_password = $row["password"];
				return TRUE;
			}else {
				$this->errors["username"] = ("*** New user is being processed. Please try again later ***");
				return FALSE;
			}
		}else {
			$this->errors["username"] = ("*** Username/Password is incorrect. Try again. ***");
			return false;
		}
	}//end function validateExistingUser

	private function validateUserName($username) {
		//only called for new user
		global $sportzdb;

		if($username == null) {
			$this->errors["username"] = ("*** User name cannot be blank ***");
			return false;
		}

		//check if user name already exists in database
		$sql  =	"SELECT *";
		$sql .=	" FROM users";
		$sql .=	" WHERE username = " . '"' . $username . '"';
		$sql .=	" LIMIT 1";
		$sportzdb->select($sql);
		$row_found = $sportzdb->result->num_rows;

		if($row_found) {
			$this->errors["username"] = ("*** User already exists ***");
			return false;
		}

		//no errors so return true
		return true;
	} #end function validateUserName

	private function validatePassword($password, $repassword) {
		if(!($password)) {
			$this->errors["password"] = ("*** Password cannot be blank ***");
			return false;
		}elseif(strlen($password) < PASSWORD_MIN_LEN) {
			$this->errors["password"] = ("*** Password must be at least " . PASSWORD_MIN_LEN . " characters long ***");
			return false;
		}elseif($repassword !== $password) {
			$this->errors["repassword"] = ("*** The passwords you typed do not match ***");
			return false;
		}else {
			return true;
		}
	} #end function validatePassword

	private function validateHint($hint) {
		//currently this routine does no checking. Just here for future use.
		if($hint == NULL) {
			return true; //for now don't need to validate hint so just return true
			$this->errors["hint"] = ("*** Hint cannot be blank ***");
			return false;
		}else {
			return true;
		}
	} #end function validateFullName

	private function validateFullName($fullname) {
		if($fullname == NULL) {
			$this->errors["fullname"] = ("*** Name cannot be blank ***");
			return false;
		}else {
			return true;
		}
	} #end function validateFullName

	private function validateEmail($email) {
		//only called for new user
		global $sportzdb;

		if($email == NULL) {
			$this->errors["email"] = ("*** Email cannot be blank ***");
			return false;
		}

		//check if email already exists in database. Can only have one user per email
		$sql  =	"SELECT *";
		$sql .=	" FROM users";
		$sql .=	" WHERE email = " . '"' . $email . '"';
		$sql .=	" LIMIT 1";
		$sportzdb->select($sql);
		$row_found = $sportzdb->result->num_rows;

		if($row_found) {
			$this->errors["email"] = ("*** A user with that email already exists ***");
			return true;
		}

		if(!(Mail::validateEmailAddress($email))) {
			$this->errors["email"] = ("*** Email does not appear to be valid ***");
			return false;
		}
		return true;
	} #end function validateEmail

	public function add($donor_id=0, $username, $password, $repassword=NULL, $hint=NULL, $email=NULL, $fullname=NULL, $validated=FALSE) {
		global $sportzdb;
		//encrypt the password using the username as the salt
		$enc_password = crypt($password, $username);
		$table = "users";
		$col_arr = ARRAY("donor_id", "username", "fullname", "password", "password_hint", "email", "validated");
		$val_arr = ARRAY($donor_id, $username, $fullname, $enc_password, $hint, $email, $validated);
		$result = $sportzdb->insert($table,$col_arr, $val_arr);
		return ($result);
	} #end function add

	public function sendMessageWelcomeUser($username, $password, $email) {
		$this->setUserWelcomeMsg($username, $password);
		Mail::send(INFO_EMAIL_FROM, $email, "Your Yousee.in Account", $this->user_welcome_msg);
	}

	public function setCookies($persist) {
		Cookie::setCookie("sportz_a", $this->username, $persist);
		Cookie::setCookie("sportz_b", $this->enc_password, $persist);
	}

	public function deleteCookies() {
		Cookie::deleteCookie("sportz_a");
		Cookie::deleteCookie("sportz_b");
	}

	public function sendMessageValidateUser($username) {
		$this->setAdminValidateMsg($username);
		Mail::send(INFO_EMAIL_FROM, ADMIN_EMAIL_TO, "New User Validation", $this->admin_validate_msg);
	}

	private function setUserWelcomeMsg($username, $password) {
		$msg  = "Thank you for signing up for an account with Sportz.com . \n\r";
		$msg .= "Your new account is being processed. \n\r";
		$msg .= "We will send you an email when your new user has been added. \n\r";
		$msg .= "Here is your account information. Please keep it for future reference: \n\r";
		$msg .= "Username: " . $username . "\n\r";
		$msg .= "Password: " . $password . "\n\r";
		$msg .= "Thanks again for your support. \n\r";
		$msg .= "The team at Sportz.com .";
		$this->user_welcome_msg = $msg;
	}//end function setUserWelcomeMsg

	private function setAdminValidateMsg($username) {
		$msg  = "A new user has been added to the database: \n\r";
		$msg .= "Username: " . $username . "\n\r";
		$msg .= "Please add this users donor id and change their validation. \n\r";
		$msg .= "The team at Sportz.com .";
		$this->admin_validate_msg = $msg;
	}//end function setAdminValidateMsg

} #end class User

?>