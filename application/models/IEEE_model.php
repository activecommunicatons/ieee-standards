<?php
class IEEE_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        
        public function get_uploads($slug = null)
	{
               if(is_null($slug))
                  {       
                $query = $this->db->get('uploads');
               
                return $query->result_array();
                    }
		$query = $this->db->get_where('uploads', array('slug' => $slug));
                return $query->row_array();
	}
         public function set_uploads()
        {
                $this->load->helper('url');
                
                $slug = url_title($this->input->post('title'), 'dash', TRUE);
                
                $data = array(
                        'description' => $this->input->post('description'),
                        'slug' => $slug,
                        'title'=>$this->input->post('title'),
                        'filename' => $this->input->post('filename')
                );
                
                return $this->db->insert('uploads', $data);
        }
        
        
         public function edit_uploads(){
                 $this->load->helper('url');
                
                $slug = url_title($this->input->post('title'), 'dash', TRUE);
                
                $data = array(
                        'description' => $this->input->post('description'),
                        'slug' => $slug,
                        'title'=>$this->input->post('title'),
                        'filename' => $this->input->post('filename')
                );
                
                return $this->db->replace('uploads', $data);
                    }
}



