<?php
class Login extends CI_Controller  
{
	
    function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User');
        //$this->lang->load('login');
    }

    function index(){

        if($this->User->is_logged_in() ){  
            redirect('/rent');  
        }else{

            $this->form_validation->set_rules('username', 'username', 'required|callback_login_check');
            $this->form_validation->set_message('required', 'Usuario y Password obligatorios');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            
            if($this->form_validation->run() == FALSE){
                $this->load->view('login/login');
            }else{                  
                redirect('rent');  
            }
        }
    }   

    public function logout(){

        $this->session->sess_destroy();
        redirect('/');
    }

    function login_check($username){

        $password = $this->input->post("password");
 
        if(!$this->User->login($username,$password)){
                $this->form_validation->set_message('login_check', 'Usuario y Password no válidos');
                return false;
        }

        return true;		
    }
    

          
             
        
}

