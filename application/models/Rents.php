<?php

class Rents extends CI_Model {

    function save_sale($id_customer,$amount_to_pay,$amount_payed,$user_id){

	$data = array(
					'date_created' => date('Y-m-d H:m:s'),
					'date_modified' => date('Y-m-d H:m:s'),
					'status' => 1,
					'iduser_creation' => $user_id,
					'iduser_modified' => $user_id,
					'idcustomer' => $id_customer,
					'amount' => $amount_to_pay,
					'amount_paid' => $amount_payed
				);

	$this->db->insert('sale', $data);

	$sale_id = $this->db->insert_id();

	return $sale_id;    

    }

    function update_sale_detail($sale_id,$amount,$amount_paid,$user_id){

    	$this->db->trans_start();

    	$data = array(
					'date_modified' => date('Y-m-d H:m:s'),
					'iduser_modified' => $user_id,
					'amount' => $amount,
					'amount_paid' => $amount_paid
				);

    	$this->db->where('idsale', $sale_id);
		$this->db->update('sale', $data);

		$this->db->trans_complete();
            
	    if ($this->db->trans_status() === FALSE) {
	    	return false;
	    } else {
	    	return true;
	    }

    }

    function get_sale_amounts($idsale){

    	$this->db->select('amount,amount_paid');
		$this->db->from('sale');
		$this->db->where('idsale',$idsale);
		$query = $this->db->get();
		return $query->result();

    }

    function save_rent($fecha_ini,$fecha_fin,$reg_status,$reg_id_room,$sale_id,$id_customer,$reg_unit_price,$reg_discount,$reg_quantity,$reg_room){

		$this->db->trans_start();

		$data = array(
						'start_date' => $fecha_ini,
						'finish_date' => $fecha_fin,
						'status' => $reg_status,
						'room_price' => $reg_unit_price,
						'idroom' => $reg_id_room,
						'idsale' => $sale_id,
						'customer_idcustomer' => $id_customer,
						'discount' => $reg_discount,
						'quantity' => $reg_quantity,
						'room_number' => $reg_room
					); 

		$this->db->insert('rent', $data);

		$this->db->trans_complete();
	            
	    if ($this->db->trans_status() === FALSE) return false;
	    
	    return true;

	}

	function update_room_status($reg_id_room,$reg_status){

		$this->db->trans_start();

		$data = array(
               'status' => $reg_status
            );

		$this->db->where('idroom', $reg_id_room);
		$this->db->update('room', $data);

		$this->db->trans_complete();
            
	    if ($this->db->trans_status() === FALSE) {
	    	return false;
	    } else {
	    	return true;
	    }
	
	}

	function update_product($reg_id_room,$reg_quantity,$reg_discount,$reg_fecha_fin,$sale_id){

		$this->db->trans_start();

		$data = array(
               'discount' => $reg_discount,
               'quantity' => $reg_quantity,
               'finish_date' => $reg_fecha_fin
            );

		$this->db->where('idsale', $sale_id);
		$this->db->where('idroom', $reg_id_room);
		$this->db->update('rent', $data);

		$this->db->trans_complete();
            
	    if ($this->db->trans_status() === FALSE) {
	    	return false;
	    } else {
	    	return true;
	    }

	}

	function get_customer_id_by_idsale($idsale){

		$this->db->select('idcustomer');
		$this->db->from('sale');
		$this->db->where('idsale',$idsale);
		$query = $this->db->get();
		return $query->result();

	}

	function get_payments($idsale){

        $this->db->from('sales_payment');
        $this->db->where('idsale',$idsale);

        $query = $this->db->get();
        return $query->result();

	}

	function get_rents_by_idsale($idsale){

		$this->db->from('rent');
        $this->db->where('idsale',$idsale);

        $query = $this->db->get();
        return $query->result();
	}

	function get_items_by_idsale($idsale){
		$this->db->from('sale_item');
        $this->db->where('idsale',$idsale);

        $query = $this->db->get();
        return $query->result();
	}


	function save_item_sale($sale_id,$reg_unit_price,$reg_quantity,$reg_id_item,$reg_discount,$id_rent=null,$user_id,$reg_name,$reg_room=null){

		$this->db->trans_start();

		$subtotal = $reg_quantity*$reg_unit_price;
		$total = $subtotal - $reg_discount;

		$data = array(
						'idsale' => $sale_id,
						'item_unit_price' => $reg_unit_price,
						'quantity' => $reg_quantity,
						'iditem' => $reg_id_item,
						'idrent' => $id_rent,
						'subtotal' => $subtotal,
						'discount' => $reg_discount,
						'total' => $total,
						'iduser' => $user_id,
						'item_name' => $reg_name,
						'room_number' => $reg_room,
					);

		$this->db->insert('sale_item', $data);

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) return false;

		return true;

	}

	function save_sale_payment($id_sale,$reg_type,$reg_amount,$reg_date,$user_id){

		$this->db->trans_start();

		$data = array(
						'idsale' => $id_sale,
						'payment_type' => $reg_type,
						'payment_amount' => $reg_amount,
						'payment_date' => $reg_date,
						'iduser' => $user_id
					);

		$this->db->insert('sales_payment', $data);

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) return false;

		return true;
	}

	function getIdRent($sale_id,$id_room){

	        $this->db->select('idrent');
	        $this->db->from('rent');
	        $this->db->where('idsale',$sale_id);
	        $this->db->where('idroom',$id_room);

	        $query = $this->db->get();
	        return $query->result();

	}


}