<?php

class Sims_model extends CI_Model {
    

    public function __construct() {
        
        $this->load->database();
    }
    
    
    public function get_sims( $slug = FALSE ) {
        
	if ( $slug === FALSE ) {
            
            $query = $this->db->get( 'sims' );
            
            return $query->result_array();
	}
	
	$query = $this->db->get_where( 'sims', array( 'sim_num' => $slug ) );
        
	return $query->row_array();
    }
    
    
    public function set_sims() {

        //$this->load->helper( 'url' );

        $data = array(
            
            'sim_num' => $this->input->post( 'sim_num' ),
            'value' => $this->input->post( 'value' ),
            'act_date' => $this->input->post( 'act_date' ),
            'mob_num' => $this->input->post( 'mob_num' )
        );

        return $this->db->insert( 'sims', $data );
    }
   
}