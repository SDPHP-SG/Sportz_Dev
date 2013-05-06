<?php

class Sims extends CI_Controller {

    public function __construct() {
        
        parent::__construct();

        $this->load->model( 'sims_model' );
    }

    public function index() {

        $data['sims'] = $this->sims_model->get_sims();
        
        //$data['title'] = 'SIMs Archive';

        $this->load->view( 'templates/header', $data );
        
        $this->load->view( 'sims/index', $data );
        
        $this->load->view( 'templates/footer' );
    }

    public function view( $slug ) {
        
        $data['sims_item'] = $this->sims_model->get_sims( $slug );

        if ( empty( $data['sims_item'] ) ) {
            
            show_404();
        }

        //$data['title'] = $data['sims_item']['title'];

        $this->load->view( 'templates/header', $data );

        $this->load->view( 'sims/view', $data );

        $this->load->view( 'templates/footer' );
    }
    
    

    public function create() {
        
        $this->load->helper( 'form' );
        
        $this->load->library( 'form_validation' );

        $data['title'] = 'Create a news item';

        $this->form_validation->set_rules( 'sim_num', 'Sim Number', 'required' );
        
        $this->form_validation->set_rules( 'value', 'Value', 'required' );

        if ( $this->form_validation->run() === FALSE ) {
            
            $this->load->view('templates/header', $data);
            
            $this->load->view('sims/create');
            
            $this->load->view('templates/footer');
        }
        
        else {
            
            $this->sims_model->set_sims();

            $this->load->view('sims/success');
        }
    }
    
    
//    public function success() {
//        
//        $this->load->view( 'templates/header' );
//        
//        $this->load->view( 'news/success' );
//        
//        $this->load->view( 'templates/footer' );
//    }
    
    
}

// EOF