<?php

class User_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	function exists_username_password($username, $password) {
//TODO add responses for "User not found"/"Username/password doesn't match"		
                if ($this->passwordhash->check_password($password, $this->get_user_hash($username))) {
                        return TRUE;
                } else {
                        return FALSE;
                }
	}

	function add_user() {
//TODO add password hint
                $password_hashed = $this->passwordhash->hash_password($this->input->post('password'));
		$user_data = array(
			'username' => $this->input->post('username'),
			'password' => $password_hashed,
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('email')
		);

		if ($this->db->insert('users', $user_data)) {
                    // Will use this hash for cookies setup
                    return $password_hashed;
                } else {
                    return FALSE;
                }
	}
        
        function get_user_hash($username) {
                $query = $this->db->get_where('users', array('username' => $username), 1);
		if ($query->num_rows == 1) {
                        $user_data = $query->row();
                        return $user_data->password;
		} else {
                    // No user found
                    return FALSE;
                }
                
        }
}

/*end of class User_model*/

/* end of file user_model.php */