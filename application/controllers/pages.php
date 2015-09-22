<?php
class Pages extends CI_Controller {
        
        public function __construct()
        {
                parent::__construct();
                
                $this->load->model('IEEE_model');
                $this->load->helper('url_helper');
        }
  
        public function view($page = 'list')
        {
                
                        if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
                        {
                                // Whoops, we don't have a page for that!
                                show_404();
                                echo 'yaha';
                        }
                        $this->load->helper('url');
                        
                        $data['title'] = ucfirst($page); // Capitalize the first letter
                        $data['text'] = "This is test text";
                        $data['uploads'] = $this->IEEE_model->get_uploads();
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
 
         public function form($slug = NULL)
        {
                        $this->load->helper('form');
                        $this->load->library('form_validation');


                        if (is_null($slug))
                        $data['headtitle'] = 'Upload item';
                        else{
                        $data['headtitle'] = 'Edit item';
                        $data['uploads'] = $this->IEEE_model->get_uploads($slug);
                       
                        }
                        $this->form_validation->set_rules('description', 'Discription', 'required');
                        $this->form_validation->set_rules('filename', 'File Name', 'required');
                        $this->form_validation->set_rules('title', 'Title', 'required');
                
                        if ($this->form_validation->run() === FALSE)
                        {
                                $this->load->view('templates/header', $data);
                                $this->load->view('pages/form');
                                $this->load->view('templates/footer');
                        
                        }
                        else
                        {
                                if (!isset($data['uploads'])){
                                      $this->IEEE_model->set_uploads();}
                                else {
                                      $this->IEEE_model->edit_uploads();}
                                $this->view('listadmin');
                                
                        }
                                        

             }
        
        
}