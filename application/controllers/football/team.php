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

        $data['title'] = 'Sportz - Football';

        //Check to see if user is already logged in.
        $data['is_logged_in'] = $this->user->is_logged_in();

        // Load View class and set variables that will be reflected in layout
        $this->load->library('View');
        $this->view->set_layout_vars($data);
    }

    public function create($parms = null) {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Sportz - Football';

        $this->form_validation->set_rules('name', 'Name', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('football/team_create');
        } else {
            if ($this->team_model->createTeam()) {
                $team_id = $this->db->insert_id();
                $data['team_data'] = $this->team_model->readTeam($team_id);
                $this->load->view('football/team_display', $data);
            } else {
                $data["team_data"]["name"] = 'Error';
                $this->load->view('football/team_display', $data);
            }
        }
    }

    /**
     * In this method usage of layouts and View class is demonstrated
     * @param string $team_id
     */
    public function display($team_id = null) {
        if (!$team_id)
            $team_id = '1';
        $data['team_data'] = $this->team_model->readTeam($team_id);
        $data['title'] = 'Sportz - Football';
        
        // Load section specific layout - local layout
        $this->view->set_local_layout('football/layout');
        
        // Uncoment following line to see hoe layout works
        //$this->view->enable_layout(false);
        
        $this->view->render('football/team_display', $data);
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