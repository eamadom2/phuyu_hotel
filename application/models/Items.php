<?php

class Items extends CI_Model {
    
    
    function get_all_items($query=''){

        $this->db->from('item');
        $this->db->like('item_name', $query, 'both');
        $this->db->where('status',1);
        $this->db->where('is_for_sale',1);

        $q= $this->db->get(); 
        
        return $q;
    }
    
    function get_items_cleaning(){
        
        $this->db->from('item');
                
        $this->db->where('type_item',5);
        $this->db->order_by('item_name','asc');
        
        $query = $this->db->get(); 
        
        return $query->result();
        
    }
    
    function get_items($status = 0){
        
        $this->db->from('item');
                
        if($status) $this->db->where('status',1);
        $this->db->order_by('item_name','asc');
        
        $query = $this->db->get(); 
        
        return $query->result();
    }
    
    
    function get_inventory($iditem){
        
        $this->db->select('ii.*, u.name, u.lastname');
        $this->db->from('inventory_item ii');
        $this->db->join('user u','ii.iduser = u.iduser');
        $this->db->where('iditem',$iditem);
        $this->db->order_by('ii.transaction_date','desc');
        
        $query = $this->db->get();
        
        return $query->result();
        
        
    }
    
    function get_item($iditem) {

        if (!is_numeric($iditem)) {

            $item_obj = new stdClass();
            $fields = $this->db->list_fields('item');

            foreach ($fields as $field) {
                $item_obj->$field = '';
            }

            return $item_obj;
        }

        $this->db->from('item');
        $this->db->where('iditem', $iditem);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {

            $item_obj = new stdClass();
            $fields = $this->db->list_fields('item');
            
            foreach ($fields as $field) {
                $item_obj->$field = '';
            }

            return $item_obj;
        }
    }
    
    function save_inventory($data,$data_item){
        
        $this->db->trans_start();
        
        $this->db->insert('inventory_item',$data);
        
        $this->db->where('iditem',$data['iditem']);
        $this->db->update('item',$data_item);
        
        $this->db->trans_complete();
            
        if ($this->db->trans_status() === FALSE) return false;
        
        return true;
        
    }
    
    function save($data,$quantity,$iditem){
        
        $this->db->trans_start();
        
        if(!$iditem){
            
            if($this->db->insert('item',$data)){
                $iditem = $this->db->insert_id();
            }
            
            if($quantity > 0){
                
                $inventory_data = array(
                    'iduser' => $this->session->idUser,
                    'iditem' => $iditem,
                    'transaction_date' => date('Y-m-d h:i:s'),
                    'transaction_type' => 1,
                    'transaction_reason' => 1,
                    'transaction_description' => 'Stock inicial',
                    'transaction_inventory' => $quantity ,
                );
                
                $this->db->insert('inventory_item',$inventory_data);
                
            }
            
        }else{
            
            $this->db->where('idcustomer', $iditem);
            $this->db->update('item',$data); 
        }

        $this->db->trans_complete();
            
        if ($this->db->trans_status() === FALSE) return false;
        
        return true;
        
    }
    
}

