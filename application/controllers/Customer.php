<?php

require_once ("Secure_area.php");

class Customer extends Secure_area {
    
    function __construct() {
        parent::__construct();
        
        $this->load->helper('common');
        $this->load->library('form_validation');
        $this->load->model('Customers');

    }
    

    function get_persons(){

        $query = $this->input->post('query');
        $items = $this->Customers->get_persons($query);

        echo json_encode($items->result());
    }
    
    function get_companies(){

        $query = $this->input->post('query');
        $items = $this->Customers->get_companies($query);

        echo json_encode($items->result());
    }



    function save(){
        
        $customer_type = $this->input->post('customer');

        if($customer_type=="persona"){

            $dni  = $this->input->post('dni');
            $dni_old  = $this->input->post('dni_old');
            $firstname  = $this->input->post('firstname');
            $lastname   = $this->input->post('lastname');
            $phone      = $this->input->post('phone');
            $email      = $this->input->post('email');
            $country    = $this->input->post('country');
            $city       = $this->input->post('city');



            if($this->Customers->save_person($dni,$dni_old,$firstname,$lastname,$phone,$email,$country,$city)){   
                echo json_encode(array('ok' => true, 'message' => 'Se realizó el registro'));
            }else{
                echo json_encode(array('ok' => false, 'message' => 'Error al guardar. Consulte con el administrador'));
            } 

           
        } else if($customer_type=="empresa"){

            $company_document  = $this->input->post('company_document');
            $company_document_old  = $this->input->post('company_document_old');
            $company_name = $this->input->post('company_name'); 
            $address   = $this->input->post('address');
            $phone      = $this->input->post('phone');
            $email      = $this->input->post('email');

            if($this->Customers->save_company($company_document,$company_document_old,$company_name,$address,$phone,$email)){   
                echo json_encode(array('ok' => true, 'message' => 'Se realizó el registro'));
            }else{
                echo json_encode(array('ok' => false, 'message' => 'Error al guardar. Consulte con el administrador'));
            }  

        }

        

    }


}
         

