<?php

require_once ("Secure_area.php");

class Cleaning extends Secure_area {
    
    function __construct() {
        parent::__construct();
        
        $this->load->helper('date');
        $this->load->helper('common');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->model('Items');
        $this->load->model('Rooms');

    }
    
    function index(){
        
        $this->list_rooms_to_cleaning();
        
    }
    
    
    function clean($idcleaning){
        
        $data= array('titulo'=>'Hotel Sudamérica | Sistema de Gestión Hoteles ','dashboard'=>0);
        $this->load->view("partial/header",$data);
        
        $user_id = $this->session->idUser;
        $user_rol = $this->session->rol;
        
        $cleaning_room = $this->Rooms->get_cleaning_info($idcleaning);
        $items_cleaning =  $this->Items->get_items_cleaning();
        
        $module = 'Limpieza';
        $action = 'Lista habitaciones para limpiar';
        
        $data = array(
            'cleaning_room' =>   $cleaning_room,
            'items_cleaning' => $items_cleaning,
            'module'=>   $module,
            'action'=>   $action,
            'user_rol'=> $user_rol,
        );
        
        
        $this->load->view("rooms/cleaning_room",$data);
        $this->load->view("partial/footer");
        
    }
    
    function list_rooms_to_cleaning(){
        
        $data= array('titulo'=>'Hotel Sudamérica | Sistema de Gestión Hoteles ','dashboard'=>0);
        $this->load->view("partial/header",$data);
        
        $user_id = $this->session->idUser;
        $user_rol = $this->session->rol;
        
        $rooms = $this->Rooms->get_rooms_to_clean(1);
        
        $module = 'Limpieza';
        $action = 'Lista habitaciones para limpiar';
        
        $data = array(
            'rooms' =>   $rooms,
            'module'=>   $module,
            'action'=>   $action,
            'user_rol'=> $user_rol,
        );
        
        
        $this->load->view("rooms/list_rooms_to_clean",$data);
        $this->load->view("partial/footer");
        
    }
    
}    

