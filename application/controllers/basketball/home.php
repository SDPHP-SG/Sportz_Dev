<?php

class Home extends CI_Controller {

	//if using the constructor, be sure to call the parent constructor as well
	/*
	public function __construct() {
		parent::__construct();
	}
	*/

	public function index() {
		$data['title'] = 'Sportz Site';

		$this->load->view('basketball/templates/header', $data);
		$this->load->view('basketball/home', $data);
		$this->load->view('basketball/templates/footer');
	}
}//end of class Home

/* End of file home.php */