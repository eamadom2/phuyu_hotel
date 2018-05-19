<?php

class Rooms_type extends CI_Model {
    
    function get_all(){
        
        $this->db->from('roomtype');
        
        $query = $this->db->get();
        
        return $query->result();
        
    }
    
        function get_roomtype($idroomtype) {

        if (!is_numeric($idroomtype)) {

            $item_obj = new stdClass();
            $fields = $this->db->list_fields('roomtype');

            foreach ($fields as $field) {
                $item_obj->$field = '';
            }

            return $item_obj;
        }

        $this->db->from('roomtype');
        $this->db->where('idroomtype', $idroomtype);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {

            $item_obj = new stdClass();
            $fields = $this->db->list_fields('roomtype');
            
            foreach ($fields as $field) {
                $item_obj->$field = '';
            }

            return $item_obj;
        }
    }
    
    
    
}