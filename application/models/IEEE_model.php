<?php
class IEEE_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        
        public function get_user($username)
	{
       
        $query = $this->db->get_where('admin', array('username' => $username));
        return $query->row_array();
		
	}
        public function set_news()
        {
    $this->load->helper('url');

    $slug = url_title($this->input->post('title'), 'dash', TRUE);

    $data = array(
        'title' => $this->input->post('title'),
        'slug' => $slug,
        'text' => $this->input->post('text')
    );

    return $this->db->insert('news', $data);
        }

	public function set_news()
        {
    $this->load->helper('url');

    $slug = url_title($this->input->post('title'), 'dash', TRUE);

    $data = array(
        'title' => $this->input->post('title'),
        'slug' => $slug,
        'text' => $this->input->post('text')
    );

    return $this->db->insert('news', $data);
        }

}



