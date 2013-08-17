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
class Team extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('football/team_model');
	}

	/* by declaring this _remap function, it forces all calls to the Home controller
	 * to first call this function.  This allows displaying the header page, the page called and the
	 * footer page once.
	 */

	public function _remap($method, $params = array()) {
		$data['title'] = 'Sportz - Football';

		//Check to see if user is already logged in.
		$data['is_logged_in'] = $this->user->is_logged_in();

		$this->load->view('main/templates/wrapper_top', $data);
		$this->load->view('main/templates/header', $data);
		$this->load->view('main/templates/navbar', $data);

		$this->load->view('football/templates/navbar', $data);
		$this->load->view('football/templates/header', $data);

		if(method_exists($this, $method)) {
			isset($params[0]) ? $this->$method($params[0]) : $this->$method();
		}else {
			$this->index();
		}

		$this->load->view('football/templates/footer', $data);

		$this->load->view('main/templates/footer', $data);
		$this->load->view('main/templates/wrapper_bottom', $data);
	}

	public function create($parms = null) {
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Sportz - Football';

		$this->form_validation->set_rules('name', 'Name', 'required');

		if($this->form_validation->run() === FALSE) {
			$this->load->view('football/team_create');
		}else {
			if($this->team_model->createTeam()) {
				$team_id = $this->db->insert_id();
				$data['team_data'] = $this->team_model->readTeam($team_id);
				$this->load->view('football/team_display', $data);
			}else {
				$data["team_data"]["name"] = 'Error';
				$this->load->view('football/team_display', $data);
			}
		}
	}

	public function display($team_id=null) {
		if(!$team_id) $team_id = '1';
		$data['team_data'] = $this->team_model->readTeam($team_id);
		$data['title'] = 'Sportz - Football';

		$this->load->view('football/team_display', $data);
	}

	public function update($team_id) {
		$data['title'] = 'Sportz - Football';

		//TODO Update team record
		//Read updated record and display
		$data['team_data'] = $this->team_model->readTeam($team_id);
		$this->load->view('football/team_display', $data);
	}

	public function delete($team_id) {
		$data['title'] = 'Sportz - Football';

		//TODO make sure this works to delete team
		$this->team_model->deleteTeam($team_id);

		//TODO create team_delete view for successful deletion
		$this->load->view('football/team_deleted', $data);
	}

}
//end of class Team

/* End of file football/home.php */