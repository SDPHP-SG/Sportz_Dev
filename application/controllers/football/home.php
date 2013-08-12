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
 * Sportz Football Home Class
 *
 * This class is the Home controller for Football
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
		$data['title'] = 'Sportz - Football';

		/*Check to see if user is already logged in.
		 * You can redirect the user back to the main home page if you
		 * don't want them to be able to access this page without logging in
		 */
		$data['is_logged_in'] = $this->user->is_logged_in();
		//if ($data['is_logged_in']) {
			$this->load->view('main/templates/wrapper_top', $data);
			$this->load->view('main/templates/header', $data);
			$this->load->view('main/templates/navbar', $data);

			$this->load->view('football/templates/header', $data);
			$this->load->view('football/templates/navbar', $data);

			if(method_exists($this, $method)) {
				isset($params[0]) ? $this->$method($params[0]) : $this->$method();
			}else {
				$this->index();
			}

			$this->load->view('football/templates/footer', $data);

			$this->load->view('main/templates/footer', $data);
			$this->load->view('main/templates/wrapper_bottom', $data);
		//} else {
		//	redirect('login');
		//}
	}

	public function index() {
		$data['title'] = 'Sportz - Football';

		$this->load->view('football/home', $data);
	}
}

//end of class Team

/* End of file football/home.php */