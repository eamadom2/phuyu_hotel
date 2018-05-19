<?php

class Hotels extends CI_Model {

    function get_hotel($idhotel) {

        if (!is_numeric($idhotel)) {

            $item_obj = new stdClass();
            $fields = $this->db->list_fields('hotel');

            foreach ($fields as $field) {
                $item_obj->$field = '';
            }

            return $item_obj;
        }

        $this->db->from('hotel');
        $this->db->where('idhotel', $idhotel);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {

            $item_obj = new stdClass();
            $fields = $this->db->list_fields('hotel');
            
            foreach ($fields as $field) {
                $item_obj->$field = '';
            }

            return $item_obj;
        }
    }
    
    function save($data_hotel,$idhotel){
        
        $this->db->where('idhotel', $idhotel);
        $this->db->update('hotel',$data_hotel); 
        
        if($this->db->affected_rows()) return true;
        
        return false;
        
    }

}