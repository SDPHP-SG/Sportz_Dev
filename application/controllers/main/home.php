<?php

class Home extends CI_Controller {

	//if using the constructor, be sure to call the parent constructor as well
	/*
	  public function __construct() {
	  parent::__construct();
	  }
	 */

	public function index() {
		$data['title'] = 'Sportz - Main';


		//Header display depends on whether user is logged in.  Add logic here.
		//if(USERS_CANLOGIN and $thispage != "login" and !($user->isLoggedIn()) ) {

		$this->load->view('main/templates/wrapper_top', $data);
		$this->load->view('main/templates/header', $data);
		$this->load->view('main/templates/navbar', $data);
		$this->load->view('main/templates/body_top', $data);

		//load correct content pages here .. either main or basketball for now.
		$this->load->view('basketball/templates/header', $data);
		$this->load->view('basketball/templates/navbar', $data);
		$this->load->view('basketball/home', $data);
		$this->load->view('basketball/templates/footer', $data);

		$this->load->view('main/templates/body_bottom', $data);
		$this->load->view('main/templates/footer', $data);
		$this->load->view('main/templates/wrapper_bottom', $data);
	}

	public function signup() {
		$data['title'] = 'Sportz - Signup';


		$this->load->view('main/signup', $data);
	}

}//end of class Home