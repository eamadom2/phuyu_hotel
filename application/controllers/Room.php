<?php

require_once ("Secure_area.php");

class Room extends Secure_area {
    
    function __construct() {
        parent::__construct();
        
        $this->load->helper('date');
        $this->load->helper('common');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->model('Rooms');
        $this->load->model('Rooms_type');

    }
    
    function index(){
        
        $this->list_rooms();
        
    }
    

    public function test(){

        $res = $this->Rooms->validate_room_available('2018-05-23 11:00' ,'2018-05-25 11:00' ,61);

        if($res==null){
            echo 'no hay resultados';
        }else{
            var_dump($res);    
        }
        

    }


    function validate_room_available(){

        $idroom = $this->input->post('idroom');
        $min_date = $this->input->post('mindate');
        $max_date = $this->input->post('maxdate');

        $res = $this->Rooms->validate_room_available($min_date,$max_date,$idroom);

        if($res == null){
            echo json_encode(array('ok'=>true,'message'=>'ok'));
        } else{
            echo json_encode(array('ok'=>false,'message'=>'No se encuentra información. Consulte con sistemas'));
        }

    }
    
    
    function list_rooms(){
        
        $data= array('titulo'=>'Hotel Sudamérica | Sistema de Gestión Hoteles ','dashboard'=>0);
        $this->load->view("partial/header",$data);
        
        $user_id = $this->session->idUser;
        $user_rol = $this->session->rol;
        
        $rooms = $this->Rooms->get_rooms(1);
        
        $module = 'Habitaciones';
        $action = 'Lista habitaciones';
        
        $data = array(
            'rooms' =>   $rooms,
            'module'=>   $module,
            'action'=>   $action,
            'user_rol'=> $user_rol,
        );
        
        
        $this->load->view("rooms/list",$data);
        $this->load->view("partial/footer");
        
    }
    
    function get_price_days(){
        
        $idroom = $this->input->post('idroom');
        $num_days = $this->input->post('diffDays');
        
        $room = $this->Rooms->get_full_info($idroom);
        
        if($room){
            $total = $num_days * $room->price;

            echo json_encode(array('ok'=>true,'total'=>$total,'precio'=>$room->price,'dias'=>$num_days));
        }else{
            echo json_encode(array('ok'=>false,'message'=>'No se encuentra información. Consulte con sistemas'));
        }
        
    }
    
}    
