<?php
class Pages extends CI_Controller {

        public function view($page = 'home')
        {

        if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
        $this->load->helper('url');    
        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['text'] = "This is test text";
       $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);   
        //$this->load->view('templates/footer', $data);
        }
        
                 
        public function index(){
          $this->load->helper('url');       
         $this->load->helper('form');
        $this->load->library('form_validation');
        
        
 

        $data['title'] = 'Create a news item';

        $this->form_validation->set_rules('email', 'Email', 'required',
         array('required' => 'You must provide a email.')
        );
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_error_delimiters('<h3>', '</h3>');
        if ($this->form_validation->run() === FALSE)
        {
         $data['error']='nhi chala';
        $this->load->view('templates/header', $data);
        $this->load->view('pages/index');
        
        }
        else
        {
        $this->load->view('templates/header', $data);
        $this->load->view('pages/list', $data); 
        }     
       }
        
}