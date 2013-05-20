<?php

class User_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	function exists_username_password($username, $password) {
		$query = $this->db->get_where('users', array('username' => $username, 'password' => $password), 1);
		if ($query->num_rows == 1) {
			return(TRUE);
		} else {
			return FALSE;
		}
	}

	function add_user() {
//TODO add password hint
		$user_data = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('email')
		);

		return($this->db->insert('users', $user_data));
	}
}

/*end of class User_model*/

/* end of file user_model.php */