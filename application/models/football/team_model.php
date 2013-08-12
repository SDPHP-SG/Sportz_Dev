<?php

class Team_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	function createTeam() {
		$data = array(
			'name' => $_POST["name"],
			'city' => $_POST["city"],
			'state' => $_POST["state"],
			'date_start' => $_POST["date_start"],
			'date_end' => $_POST["date_end"],
		);

		return $this->db->insert('ftbl_teams', $data);
	}

	function readTeam($id) {
		$query = $this->db->get_where('ftbl_teams', array('id' => $id));
		return $query->row_array();
	}

	function updateTeam() {
		$this->team_id = 'data';
		$this->name = 'data';
		$this->city = 'data';
		$this->state = 'data';
		$this->date_start = 'data';
		$this->date_end = 'data';

		$this->db->update('ftbl_teams', $this, array('id' => $_POST['id']));
	}

	function deleteTeam() {
		$this->db->delete('ftbl_teams', $this, array('id' => $_POST['id']));
	}

}
/*end of class Football_model*/

/* end of file football_model.php */