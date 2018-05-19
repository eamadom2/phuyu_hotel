<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Secure_area extends CI_Controller {

    var $module_id;
    var $module_list = array();

    /*
    Controllers that are considered secure extend Secure_area, optionally a $module_id can
    be set to also check if a user can access a particular module in the system.
    */
    function __construct($module_id=null)
    {
        
        parent::__construct();
        
        $this->module_id = $module_id;	
        $this->load->model('User');
        
        if(!$this->User->is_logged_in()) {
            redirect('login');
        }
        
        
        $user_info = $this->User->get_logged_in_user_info(); 
        
        $data['user_info_logged_in']=$user_info;
        
        if($user_info->idrol == 1){
            
            $this->module_list = $this->User->get_all_modules();
        
            /*
            foreach ($this->listaModulos as  &$modulo) {
                $modulo->submodulo= $this->get_modulos_secundarios($user_info->ID,$modulo->idmodulo);
            }
            */

            $data['enable_modules']=$this->module_list;
            
        }else{
            
            $this->module_list = $this->User->get_enable_main_modules($user_info->iduser);
        
            /*
            foreach ($this->listaModulos as  &$modulo) {
                $modulo->submodulo= $this->get_modulos_secundarios($user_info->ID,$modulo->idmodulo);
            }
            */

            
            $data['enable_modules']=$this->module_list;
            
        }

        $this->load->vars($data);
        
        
    }
    

	
}
?>