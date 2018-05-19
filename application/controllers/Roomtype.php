<?php

require_once ("Secure_area.php");

class Roomtype extends Secure_area {
    
    function __construct() {
        parent::__construct();
        
        $this->load->helper('date');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->model('Rooms');
        $this->load->model('Rooms_type');

    }
    
    function index(){
        
        $this->list_roomtype();
        
        
    }
    
    function list_roomtype(){
        
        
        
    }
    

    
}
