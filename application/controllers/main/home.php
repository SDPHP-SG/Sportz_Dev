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
 * Sportz Home Class
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
class Home extends CI_Controller {
// --------------------------------------------------------------------

	/**
	 * Check user login status and generate site content
	 *
	 * @access	public
	 * @param	none
	 * @return	void
	 */
	public function index() {
		$data['title'] = 'Sportz - Main';

		//Check to see if user is already logged in.
		$data['is_logged_in'] = $this->_is_logged_in();

		$this->load->view('main/templates/wrapper_top', $data);
		$this->load->view('main/templates/header', $data);
		$this->load->view('main/templates/navbar', $data);
		$this->load->view('main/templates/body_top', $data);

		$this->load->view('basketball/templates/header', $data);
		$this->load->view('basketball/templates/navbar', $data);
		$this->load->view('basketball/home', $data);
		$this->load->view('basketball/templates/footer', $data);

		$this->load->view('main/templates/body_bottom', $data);
		$this->load->view('main/templates/footer', $data);
		$this->load->view('main/templates/wrapper_bottom', $data);
	}

// --------------------------------------------------------------------

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

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run()) {
			$sess_data = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'is_logged_in' => TRUE
			);
			$this->session->set_userdata($sess_data);
			redirect('main/home/index');
		} else {
			$data['is_logged_in'] = FALSE;
			$data['title'] = 'Sportz - Login';

			$this->load->view('main/templates/wrapper_top', $data);
			$this->load->view('main/templates/header', $data);
			$this->load->view('main/templates/navbar', $data);
			$this->load->view('main/templates/body_top', $data);

			$this->load->view('main/login_form');

			$this->load->view('main/templates/body_bottom', $data);
			$this->load->view('main/templates/footer', $data);
			$this->load->view('main/templates/wrapper_bottom', $data);
		}
	}

	/**
	 *
	 */
	public function logout() {
		$this->session->sess_destroy();
		redirect('main/home/index');
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
			$this->user_model->add_user();
			//set cookies
			$sess_data = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
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
			$this->load->view('main/templates/body_top', $data);

			$this->load->view('main/signup_form');

			$this->load->view('main/templates/body_bottom', $data);
			$this->load->view('main/templates/footer', $data);
			$this->load->view('main/templates/wrapper_bottom', $data);
		}
	}

	private function _is_logged_in() {
		//check if session cookies are set with username/password
		$username = $this->session->userdata('username');
		if (!$username)
			return FALSE;
		$password = $this->session->userdata('password');
		if ($username and $password) {
			if ($this->_validate_user_cookies($username, $password)) {
				return TRUE;
			}
		} else {
			return FALSE;
		}
	}

	public function _validate_user_cookies($username = NULL, $password = NULL) {
		//check if user name/password exists in database
		//if password is already encrypted, no need to re-encrypt it
		$query = $this->db->get_where('users', array('username' => $username, 'password' => $password), 1);
		if ($query->num_rows == 1) {
			return(TRUE);
		} else {
			return FALSE;
		}
	}

	public function _validate_user_login($username, $password) {
		//encrypt password
		$enc_password = md5($password);
		//check if user name/password exists in database
		if ($this->user_model->exists_username_password($username, $enc_password)) {
			return(TRUE);
		} else {
			$this->form_validation->set_message('_validate_user_login', 'That is not a valid username/password');
			return FALSE;
		}
	}

	public function _validate_user_signup($username, $password) {
		$enc_password = md5($password);
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

	function _set_user_cookies($username, $password) {
		$persist = TRUE;
		$persist ? $expire_days = time() + 60 * 60 * 24 * 365 : $expire_days = 0;
		set_cookie("sportz_a", $username, $expire_days);
		set_cookie("sportz_b", $password, $expire_days);
	}

	function _delete_user_cookies() {
		delete_cookie("sportz_a");
		delete_cookie("sportz_b");
	}

}

//end of class Home

/* End of file home.php */