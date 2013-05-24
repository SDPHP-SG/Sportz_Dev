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

	/* by declaring this _remap function, it forces all calls to the Home controller
	 * to first call this function.  This allows displaying the header page and the
	 * footer page once.
	 */
	public function _remap($method, $params = array()) {
		$data['title'] = 'Sportz - Main';

		//Check to see if user is already logged in.
		$data['is_logged_in'] = $this->user->is_logged_in();

		$this->load->view('main/templates/wrapper_top', $data);
		$this->load->view('main/templates/header', $data);
		$this->load->view('main/templates/navbar', $data);
		$this->load->view('main/templates/body_top', $data);

		if (method_exists($this, $method)) {
			$this->$method();
		} else {
			$this->index();
		}

		$this->load->view('main/templates/body_bottom', $data);
		$this->load->view('main/templates/footer', $data);
		$this->load->view('main/templates/wrapper_bottom', $data);
	}

	public function index() {
		$data['title'] = 'Sportz - Main';

		$this->load->view('main/home', $data);
	}

	public function about() {
		$data['title'] = 'Sportz - About';

		$this->load->view('main/about', $data);
	}

	public function contact() {
		$data['title'] = 'Sportz - Contact';

		$this->load->view('main/contact', $data);
	}

}

//end of class Home

/* End of file home.php */