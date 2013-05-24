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
 * Sportz Basketball Home Class
 *
 * This class is the entry point controller for the Basketball pages
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
	 * to first call this function.  This allows displaying the header page, the page called and the
	 * footer page once.
	 */
	public function _remap($method, $params = array()) {
		$data['title'] = 'Sportz - Basketball';

		/*Check to see if user is already logged in.
		 * You can redirect the user back to the main home page if you
		 * don't want them to be able to access this page without logging in
		 */
		$data['is_logged_in'] = $this->user->is_logged_in();
		if ($data['is_logged_in']) {
			$this->load->view('main/templates/wrapper_top', $data);
			$this->load->view('main/templates/header', $data);
			$this->load->view('main/templates/navbar', $data);
			$this->load->view('main/templates/body_top', $data);

			if(method_exists($this, $method)) {
				$this->$method();
			}else {
				$this->index();
			}

			$this->load->view('main/templates/body_bottom', $data);
			$this->load->view('main/templates/footer', $data);
			$this->load->view('main/templates/wrapper_bottom', $data);
		} else {
			redirect('login');
		}
	}

	public function index() {
		$data['title'] = 'Sportz - Basketball';

		$this->load->view('basketball/home', $data);
	}
}

//end of class Home

/* End of file basketball/home.php */