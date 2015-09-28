<?php
class IEEE_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        
        public function get_uploads($like = NULL)
	{
               if(is_null($like))
                  {       
                $query = $this->db->get('uploads');
               
               
                    }
                else{    
                        $this->db->like('title',$like);
		$query = $this->db->get('uploads');
               
                }
                 return $query->result_array();
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
                        'id' => $this->input->post('id'),
                        'description' => $this->input->post('description'),
                        'slug' => $slug,
                        'title'=>$this->input->post('title'),
                        'filename' => $this->input->post('filename')
                );
                
                return $this->db->replace('uploads', $data);
                    }
          
         public function del_uploads($id){
                                     
                return $this->db->delete('uploads', array('id' => $id));
                    }           
                    
                    
        public function get($slug)
	                       {
                
                $query = $this->db->get_where('uploads',array('slug'=> $slug));
                return $query->row_array();
               
                    }


            public function get_user($data = NULL)
	{
               if(is_null($data))
                  {       
                $query = $this->db->get('admin');
                return $query->result_array();
               
                    }
                else{    
                       
		$query = $this->db->get_where('admin',array('member_num'=>$data['member_num'],'hashed_password'=>$data['password']));
                 return $query->row_array();
                }
                
	}
}



