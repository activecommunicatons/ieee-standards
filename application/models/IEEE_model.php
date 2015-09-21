<?php
class IEEE_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        
        public function get_uploads()
	{
       
        $query = $this->db->get('uploads');
        return $query->result_array();
		
	}
       
}



