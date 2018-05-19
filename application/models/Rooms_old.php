<?php

class Rooms extends CI_Model {
    
    
    function get_cleaning_info($idcleaning){
        
        $this->db->select('c.*,r.number, r.status as status_room');
        $this->db->from('cleaning c');
        $this->db->join('room r', 'r.idroom = c.idroom');
        $this->db->where('c.idcleaning',$idcleaning);        
        
        $query = $this->db->get();

        return $query->row();
        
    }
    
    function get_full_info($idroom){
        
        if (!is_numeric($idroom)) {

            $item_obj = new stdClass();
            $fields = $this->db->list_fields('room');

            foreach ($fields as $field) {
                $item_obj->$field = '';
            }
            
            $fields = $this->db->list_fields('roomtype');

            foreach ($fields as $field) {
                $item_obj->$field = '';
            }
            
            $fields = $this->db->list_fields('tariff_roomtype');

            foreach ($fields as $field) {
                $item_obj->$field = '';
            }

            return $item_obj;
        }
        
        
        $this->db->from('room r');
        $this->db->join('roomtype rt', 'r.idroomtype = rt.idroomtype');
        $this->db->join('tariff_roomtype trt', 'trt.idroomtype = rt.idroomtype');
        $this->db->where('r.idroom',$idroom);
        
        $query = $this->db->get();
                
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            
            $item_obj = new stdClass();
            $fields = $this->db->list_fields('room');

            foreach ($fields as $field) {
                $item_obj->$field = '';
            }
            
            $fields = $this->db->list_fields('roomtype');

            foreach ($fields as $field) {
                $item_obj->$field = '';
            }
            
            $fields = $this->db->list_fields('tariff_roomtype');

            foreach ($fields as $field) {
                $item_obj->$field = '';
            }

            return $item_obj;
        }
        
    }
    
    function get_active_rooms_checked(){
        

        $this->db->select('s.idsale,concat(p.first_name," ",p.last_name) as person,co.company_name,s.date_created,s.amount,s.amount_paid,s.status');  
        $this->db->from('sale s');
        $this->db->join('customer c', 'c.idcustomer = s.idcustomer','left');
        $this->db->join('person p', 'p.idcustomer = c.idcustomer','left');
        $this->db->join('company co', 'co.idcustomer = c.idcustomer','left');
        $this->db->order_by("s.idsale", "asc");


        $query = $this->db->get();
        
        return $query->result();
        
    }
    
    
    function get_rooms_to_clean($status = 0){
        
        
        $this->db->select('c.*,r.number, r.status as status_room');
        $this->db->from('cleaning c');
        $this->db->join('room r', 'r.idroom = c.idroom');
 
        if($status) $this->db->where('c.status',$status);
        
        $this->db->order_by('c.date_creation','asc');
        
        $query = $this->db->get();
        
        return $query->result();
        
    }
    
    function get_rooms($status = 0){
        
        $this->db->select('r.*,rt.abreviation,rt.name as roomtype_name');
        $this->db->from('room r');
        $this->db->join('roomtype rt', 'r.idroomtype = rt.idroomtype');
 
        if($status) $this->db->where('r.status',1);
        
        $this->db->order_by('r.order','asc');
        
        $query = $this->db->get();
        
        return $query->result();
        
        
    }
    
    function get_not_available_rooms($min_date,$max_date,$room_type){
        
        $this->db->select('r.idroom');
        $this->db->from('room r');
        $this->db->join('rent rr','r.idroom = rr.idroom');
        $this->db->where('rr.start_date < ',$max_date);
        $this->db->where('rr.finish_date > ',$min_date);

        
        if($room_type){
            $this->db->where('r.idroomtype',$room_type);
        }
                
        $query = $this->db->get();
        
        return $query->result();
        
    }

    function getIdRoom($reg_room){

        $this->db->select('idroom');
        $this->db->from('room');
        $this->db->where('number',$reg_room);

        $query = $this->db->get();
        return $query->result();

    }
    
    
}