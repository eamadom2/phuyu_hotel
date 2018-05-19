<?php

class User extends CI_Model {
    
    
    function login($user, $password){
        
        $this->db->select('u.iduser as id, u.idrol as idrol, rol_name as rol');
        $this->db->from('user u');
        $this->db->join('rol r', ' u.idrol= r.idrol');
        
        $this->db->where('u.username', $user);
        $this->db->where('u.password', MD5($password));
        $this->db->where('u.status', 1);
 
        $this->db->limit(1);
 
        $query = $this->db->get();
 
        if($query->num_rows() == 1){
            
            $row = $query->row();
            $this->session->set_userdata('idUser', $row->id);
            $this->session->set_userdata('rol', $row->rol);
            $this->session->set_userdata('isLoggedIn', TRUE);
            //$this->session->set_userdata('language', $this->session->userdata('language')?$this->session->userdata('language'):'spanish');
            
            
            return true;
        }
        
        return false;
        
    }
    
    function is_logged_in(){      
        
        return $this->session->userdata('idUser')!=false;
        
    }
    
    function get_all_modules(){
        
        $this->db->from('module');
        $this->db->order_by('order','asc');
        
        $query = $this->db->get();
        
        return $query->result();
        
    }
    
    function get_logged_in_user_info() {

        if ($this->is_logged_in()) {
            return $this->get_info($this->session->userdata('idUser'));
        }

        return false;
    }
    
    function delete($idUser){
        
        $data = array( 'status' => 0);

        $this->db->where('iduser', $idUser);
        $this->db->update('user', $data); 

        return true;
    }
    
    function get_users(){
        
        $this->db->select('u.iduser, u.name, u.username as username, u.status, r.rol_name as rol, c.company_name');
        $this->db->from('user u');
        $this->db->join('rol r', ' u.idrol= r.idrol');
        $this->db->join('customer c', 'c.idcustomer = u.idcustomer','left');
        
        $this->db->order_by('u.username', 'asc');
        
        return $this->db->get()->result();
        
    }
    
    function get_user($iduser) {

        if (!is_numeric($iduser)) {

            $item_obj = new stdClass();
            $fields = $this->db->list_fields('user');

            foreach ($fields as $field) {
                $item_obj->$field = '';
            }

            return $item_obj;
        }

        $this->db->from('user');
        $this->db->where('iduser', $iduser);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {

            $item_obj = new stdClass();
            $fields = $this->db->list_fields('user');
            
            foreach ($fields as $field) {
                $item_obj->$field = '';
            }

            return $item_obj;
        }
    }
    
    function get_info($idUser, $can_cache = TRUE){
        
        if ($can_cache){

            static $cache = array();

            if (isset($cache[$idUser])) return $cache[$idUser];

        }else{

            $cache = array();
        }

        $this->db->from('user');
        $this->db->where('iduser',$idUser);
        $query = $this->db->get();

        if($query->num_rows()==1){
            $cache[$idUser] = $query->row();
            return $cache[$idUser];
        }
            
    }
    
    function get_enable_main_modules($idUsuario){
        
        $this->db->from('module m');
        $this->db->join('module_permissions as mp',' mp.idmodule = m.idmodule');
        $this->db->join('user as u',' u.iduser = mp.iduser');
        $this->db->where('u.iduser',$idUsuario);
        //$this->db->where(array('idmodulo_padre' => NULL));

        $this->db->order_by("m.sort", "asc");
        
        return $this->db->get()->result();		
            
    }
    
    function get_modulos_secundarios($idUsuario,$idModuloPadre){
        
        $this->db->from('administ_modulos am');
        $this->db->join('administ_modulo_permitidos as amp',' amp.idmodulo=am.idmodulo');
        $this->db->join('administ_rol_sistema as ars',' ars.id_administ_rol_sistema=amp.id_administ_rol_sistema');
        $this->db->where('am.idmodulo_padre',$idModuloPadre);
        $this->db->where('ars.administ_id',$idUsuario);
        $this->db->order_by("am.idmodulo", "asc");
        
        return $this->db->get()->result();		
    }
    
    
    function save($user_data, $modules, $customers, $idUser = false){
        
        if ($idUser==-1) $idUser = false;
        
        $this->db->trans_start();
        
        if (!$idUser){
            
            if($this->db->insert('user',$user_data)){
                $idUser=$this->db->insert_id();
            }

        }else{
            
            $this->db->where('iduser', $idUser);
            $this->db->update('user',$user_data); 
            
            $this->db->where('iduser', $idUser);
            $this->db->delete('module_permissions');
            
            $this->db->where('iduser', $idUser);
            $this->db->delete('user_access');
        }

        $data = array();
        
        if($modules){
            
            foreach ($modules as $module){
                $data[] = array('iduser' => $idUser , 'idmodule' => $module );
            }
        
            $this->db->insert_batch('module_permissions', $data); 
        }

        $data = array();
        
        if($customers){
            
            foreach ($customers as $customer){
                $data[] = array('iduser' => $idUser , 'idcustomer' => $customer );
            }
        
            $this->db->insert_batch('user_access', $data); 
        }
        
        $this->db->trans_complete();
            
        if ($this->db->trans_status() === FALSE)return false;
        else return true;
        
    }
    
}

