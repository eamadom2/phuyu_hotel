<?php

class Customers extends CI_Model {

 function get_persons($query){

    $this->db->from('person');
    $this->db->like('document_number', $query, 'both');

    $q= $this->db->get(); 
    
    return $q;

}


function get_companies($query){

    $this->db->from('company');
    $this->db->like('company_number', $query, 'both');

    $q= $this->db->get(); 
    
    return $q;

}

function get_person_by_doc($nro_doc){

	$this->db->select('idcustomer');
	$this->db->from('person');
	$this->db->where('document_number', $nro_doc);
	$query = $this->db->get();

	return $query->result();

}

function get_company_by_doc($nro_doc){
	$this->db->select('idcustomer');
	$this->db->from('company');
	$this->db->where('company_number', $nro_doc);
	$query = $this->db->get();

	return $query->result();
}

function save_person($dni,$dni_old,$firstname,$lastname,$phone,$email,$country,$city){

	$this->db->trans_start();

	//Buscamos si existe la persona:
	$this->db->select('document_number');
	$this->db->from('person');
	$this->db->where('document_number', $dni_old);
	$query = $this->db->get(); 

	$items = $query->num_rows();

	if($items > 0) { //si existe la persona, se actualizan sus campos

		$data = array(
               'document_number' => $dni,
               'first_name' => $firstname,
               'last_name' => $lastname,
               'city' => $city
            );

		$this->db->where('document_number', $dni_old);
		$this->db->update('person', $data); 

	} else if($items == 0) { //si no existe la persona, se genera un customer id y se inserta la persona

		$data = array(
		   'status' => 1
		);

		$this->db->insert('customer', $data); 
		$customer_id = $this->db->insert_id();


		$data_person = array(
					'idcustomer' => $customer_id,
					'document_number' => $dni,
					'first_name' => $firstname,
					'last_name' => $lastname,
					'city' => $city
				);

		$this->db->insert('person', $data_person); 

	}

	$this->db->trans_complete();
            
    if ($this->db->trans_status() === FALSE) {
    	return false;
    } else {
    	return true;
    }
    

}


function save_company($company_document,$company_document_old,$company_name,$address,$phone,$email){

	$this->db->trans_start();

	//Buscamos si existe la persona:
	$this->db->select('company_number');
	$this->db->from('company');
	$this->db->where('company_number', $company_document_old);
	$query = $this->db->get(); 

	$items = $query->num_rows();

	if($items > 0) { //si existe la empresa, se actualizan sus campos

		$data = array(
               'company_number' => $company_document,
               'company_name' => $company_name,
               'address' => $address,
               'phone' => $phone,
               'email' => $email
            );

		$this->db->where('company_number', $company_document_old);
		$this->db->update('company', $data); 

	} else if($items == 0) { //si no existe la empresa, se genera un customer id y se inserta la empresa

		$data = array(
		   'status' => 1
		);

		$this->db->insert('customer', $data); 
		$customer_id = $this->db->insert_id();


		$data_company = array(
					'idcustomer' => $customer_id,
					'company_name' => $company_name,
					'company_number' => $company_document,
					'address' => $address,
					'phone' => $phone,
					'email' => $email
				);

		$this->db->insert('company', $data_company);
	}

	$this->db->trans_complete();
            
    if ($this->db->trans_status() === FALSE) return false;
    
    return true; 


}


}