<?php
class Pages extends CI_Controller {
        
        public function __construct()
        {
                parent::__construct();
                
                $this->load->model('IEEE_model');
                $this->load->helper('url_helper');
                $this->load->library('form_validation');
        }
  
        public function view($page = 'list',$query=NULL)
        {               $this->load->library('session');
                         $this->load->helper('form');
                        if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
                        {
                                // Whoops, we don't have a page for that!
                                show_404();
                                echo 'yaha';
                        }
                        $this->load->helper('url');
                        
                        $data['title'] = ucfirst($page); // Capitalize the first letter
                        $data['text'] = "This is test text";
                        $data['uploads'] = $this->IEEE_model->get_uploads($query);
                           $this->load->view('templates/header', $data);
                           $this->load->view('templates/navigation',$data);
                        $this->load->view('pages/'.$page, $data);
                        $this->load->view('templates/footer', $data);   
                        //$this->load->view('templates/footer', $data);
        }
        
                 
        public function index(){
                         $this->load->library('session');
                        $this->load->helper('url');       
                        $this->load->helper('form');
                       
                        
                        
                
                         $data['loggedin']= NULL;
                        $data['title'] = 'Create a news item';
                
                        $this->form_validation->set_rules('member_num', 'Membership Number', 'required',
                        array('required' => 'You must provide a Membership Number.')
                        );
                        $this->form_validation->set_rules('password', 'password', 'required');
                        $this->form_validation->set_error_delimiters('<h3>', '</h3>');
                        if ($this->form_validation->run() === FALSE)
                        {
                                $data['error']='nhi chala';
                                $this->load->view('templates/header', $data);
                                $this->load->view('templates/navigation',$data); 
                                $this->load->view('pages/index');
                        
                        }
                        else
                        {       $data['member_num'] = $this->input->post('member_num');
                                $data['password']=$this->input->post('password');
                                 $data['user']=$this->IEEE_model->get_user($data);
                               $data['loggedin']=    $this->loggedin($data);
                                $this->load->view('templates/header', $data);
                                $this->load->view('templates/navigation',$data);
                                $this->load->view('pages/index', $data); 
                        }     
       }
        
        public function formsubmit(){
                $this->form_validation->set_rules('description', 'Discription', 'required');
                $this->form_validation->set_rules('filename', 'File Name', 'required');
                $this->form_validation->set_rules('title', 'Title', 'required');
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png|pdf';
                $config['max_size']             = 10000;
                $config['file_name']             = $this->input->post('filename');
                $this->load->library('upload', $config);
                
                 if ( !($this->upload->do_upload('userfile')) || ($this->form_validation->run() === FALSE))
                {
                        $error = array('error' => $this->upload->display_errors());
                        
                        $this->form($this->input->post('slug'),$error);
                       // $this->form('form', $error);
                }
                else
                {    
                        if (is_null($this->input->post('slug'))){
                                   $this->IEEE_model->set_uploads(); 
                                   $data = array('upload_data' => $this->upload->data());    
                         }else{
                                    $this->IEEE_model->edit_uploads();  
                                    $data = array('upload_data' => $this->upload->data());      
                              }
                
                       $this->view('listadmin');   
                  }
                
                //$this->form($this->input->post('slug'));
        }
        public function form($slug = NULL,$error=NULL)
        {       
                   $this->load->library('session');
                $this->load->helper('form');                        
                $this->load->library('CI_input');
            
                if (is_null($slug)){
                        $data['headtitle'] = 'Upload item';
                        $data['error'] =$error;
                }else{
                        $data['headtitle'] = 'Edit item';
                        $data['error'] =$error;
                        $data['uploads'] = $this->IEEE_model->get($slug);
                       
                }

                $this->load->view('templates/header', $data);
                $this->load->view('templates/navigation',$data);
                $this->load->view('pages/form',$data);
                $this->load->view('templates/footer');   
        }
        
       public function delete($id)
       {   
              
                $this->IEEE_model->del_uploads($id);
              $this->view('listadmin');    
       }
       
     public function query()
       {   
                $this->load->library('CI_input');
                $query=$this->input->post('query');
                $page = $this->input->post('page');
                $this->view($page,$query);
                  
       }
       
       public function loggedin($data){
               
              $this->load->library('session'); 
             $this->session->set_userdata($data['user']);
             return true;
              
       }
       public function confirm_logged_in(){
		  if(!$this->logged_in()){
 	       $this->index();
                                        }
                                }
         public function logout(){
          $this->load->library('session');                          
       $this->session->sess_destroy(); 
         redirect('/pages/index','refresh');
         }
}