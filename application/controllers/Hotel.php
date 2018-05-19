<?php

require_once ("Secure_area.php");

class Hotel extends Secure_area {
    
    function __construct() {
        parent::__construct();
        
        $this->load->helper('date');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->model('Hotels');
 
    }
    
    function index(){
        
        $this->view();
        
    }
    
    
    function get_data(){
        
        $data =  array(
            'name' => $this->input->post('name'),
            'address' => $this->input->post('address')?$this->input->post('address'):'',
            'phone' => $this->input->post('phone')?$this->input->post('phone'):'',
            'email' => $this->input->post('email')?$this->input->post('email'):'',
            'num_floors' => $this->input->post('num_floors')?$this->input->post('num_floors'):1,
            'ruc' => $this->input->post('ruc')?$this->input->post('ruc'):'',
        );
        
        return $data;
        
    }
    
    function save(){
        
        $idhotel = $this->input->post('idhotel');
        
        $this->form_validation->set_rules('name', 'Nombre', 'required');
        $this->form_validation->set_rules('address', 'Dirección', 'required');
        $this->form_validation->set_rules('phone', 'Teléfono', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('num_floors', '# Pisos', 'required|numeric');
        $this->form_validation->set_rules('ruc', 'RUC', 'required|numeric');
        
        $this->form_validation->set_message('required', 'El campo {field} es obligatorio');
        $this->form_validation->set_message('numeric', 'El campo {field} debe ser numérico');
        $this->form_validation->set_message('valid_email', 'El campo {field} no es válido');

        if ($this->form_validation->run() == FALSE){
            echo json_encode(array('ok' => false, 'message' => validation_errors()));                
        }else{
            
            $data_hotel = $this->get_data();
            
            if($this->Hotels->save($data_hotel,$idhotel)){
                
                echo json_encode(array('ok' => true, 'message' => 'Se actualizó el hotel'));
            }else{
                echo json_encode(array('ok' => false, 'message' => 'Error al guardar. Consulte con el administrador'));
            } 
        }
        
        
    }
    
    function view(){
        
        $data= array('titulo'=>'Hotel Sudamérica | Sistema de Gestión Hoteles ','dashboard'=>0);
        $this->load->view("partial/header",$data);
        
        $hotel = $this->Hotels->get_hotel(1);
        
        $module = 'Hotel';
        $action = 'Ver información';
        
        $data = array('hotel' => $hotel,
                      'module' => $module, 'action' => $action);
   
        $this->load->view("hotel/view",$data);
        
        $this->load->view("partial/footer",$data);
        
    }
    

}