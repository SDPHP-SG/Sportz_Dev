<?php

/**
 * Sportz
 *
 * A web application for sports enthusiasts
 *
 * @package		Sportz
 * @author		The San Diego PHP Study group (SDPHP-SG) team
 * @copyright	Copyright (c) SDPHP-SG
 * @license
 * @link
 * @since		Version 1.0
 * @filesource
 */

/**
 * Sportz User Class
 *
 * This class is the entry point controller for the Sportz web site.  It
 * checks whether the user is logged in and allows them to log in or
 * subscribe to the site
 *
 *
 * @package		Sportz
 * @subpackage	Libraries
 * @category	Libraries
 * @author		The SDPHP-SG team.
 * @author		Matt Gass
 * @link
 */
class Users extends CI_Controller {
// --------------------------------------------------------------------

       /**
        * Perform some initialisations here
        */

        public function __construct() {
            parent::__construct();
            $this->load->library('Passwordhash', array(
                                                       $this->config->item('phpass_hash_cost_log2'),
                                                       $this->config->item('phpass_portable_hashes')
                                                 )
            );

        }

	/**
	 * Validate username and password entered in the login form
	 *
	 * @access	public
	 * @param	none
	 * @return	void
	 */
	public function login() {
		//set validation rules for the username and password
		$rules = array(
			array(
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'trim|strtolower|required|min_length[4]|callback__validate_user_login[' . $this->input->post('password') . ']'
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required'
			)
		);

		$this->form_validation->set_error_delimiters('<p class="help-block">', '</p>');
		$this->form_validation->set_rules($rules);
                $this->form_validation->set_message('_validate_user_login', 'That is not a valid username/password');
		if ($this->form_validation->run()) {
			$sess_data = array(
				'username' => $this->input->post('username'),
				'password' => $this->user_model->get_user_hash($this->input->post('username')),
				'is_logged_in' => TRUE
			);
			$this->session->set_userdata($sess_data);
			redirect('/home');
		} else {
			$data['is_logged_in'] = FALSE;
			$data['title'] = 'Sportz - Login';

			$this->load->view('main/templates/wrapper_top', $data);
			$this->load->view('main/templates/header', $data);
			$this->load->view('main/templates/navbar', $data);

			$this->load->view('main/login_form');

			$this->load->view('main/templates/footer', $data);
			$this->load->view('main/templates/wrapper_bottom', $data);
		}
	}

	/**
	 *
	 */
	public function logout() {
		$this->session->sess_destroy();
		redirect('/home');
	}

	public function signup() {
		$rules = array(
			array(
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'trim|required|min_length[4]|callback__validate_user_signup[' . $this->input->post('password') . ']'
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|matches[repassword]'
			),
			array(
				'field' => 'repassword',
				'label' => 'Confirm Password',
				'rules' => 'required'
			),
			array(
				'field' => 'first_name',
				'label' => 'First Name',
				'rules' => 'required'
			),
			array(
				'field' => 'last_name',
				'label' => 'Last Name',
				'rules' => 'required'
			),
			array(
				'field' => 'email',
				'label' => 'Email Address',
				'rules' => 'required|valid_email|is_unique[users.email]'
			)
		);

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules($rules);
		$this->form_validation->set_message('is_unique', 'A user already exists with that email');
		$this->form_validation->set_message('matches', 'Passwords do not match');
		if ($this->form_validation->run()) {
			//add to database
			$password_hashed = $this->user_model->add_user();
			//set cookies
			$sess_data = array(
				'username' => $this->input->post('username'),
				'password' => $password_hashed,
				'is_logged_in' => TRUE
			);
			$this->session->set_userdata($sess_data);
			redirect('main/home/index');
		} else {
			$data['is_logged_in'] = FALSE;
			$data['title'] = 'Sportz - Sign Up';

			$this->load->view('main/templates/wrapper_top', $data);
			$this->load->view('main/templates/header', $data);
			$this->load->view('main/templates/navbar', $data);

			$this->load->view('main/signup_form');

			$this->load->view('main/templates/footer', $data);
			$this->load->view('main/templates/wrapper_bottom', $data);
		}
	}

	public function _validate_user_login($username, $password) {
                // If user validation was successful return encrypted hash for cookies
                return $this->user_model->exists_username_password($username, $password);
	}

	public function _validate_user_signup($username, $password) {
		$username = strtolower($username);
		$query = $this->db->get_where('users', array('username' => $username), 1);
		if ($query->num_rows == 1) {
			$this->form_validation->set_message('_validate_user_signup', 'That username already exists');
			//$this->_set_user_cookies($username, $enc_password);
			return(FALSE);
		} else {
			return TRUE;
		}
	}
}

//end of class Users

/* End of file main/users.php */