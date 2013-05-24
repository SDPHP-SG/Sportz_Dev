<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User {

	public function is_logged_in() {
		//check if session cookies are set with username/password
		$CI =& get_instance();
		$username = $CI->session->userdata('username');
		if (!$username)
			return FALSE;
		$password = $CI->session->userdata('password');
		if ($username and $password) {
			if ($this->validate_user_cookies($username, $password)) {
				return TRUE;
			}
		} else {
			return FALSE;
		}
	}

	private function validate_user_cookies($username = NULL, $password = NULL) {
		$CI =& get_instance();
		//check if user name/password exists in database
		//if password is already encrypted, no need to re-encrypt it
		$query = $CI->db->get_where('users', array('username' => $username, 'password' => $password), 1);
		if ($query->num_rows == 1) {
			return(TRUE);
		} else {
			return FALSE;
		}
	}

}

/* End of class User */
/* End of file User.php */