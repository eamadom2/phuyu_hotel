<?php

require_once ("Secure_area.php");

class Rent extends Secure_area {
    
    function __construct() {
        parent::__construct();
        
        $this->load->helper('date');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->model('Rooms');
        $this->load->model('Rents');
        $this->load->model('User');
        $this->load->model('Customers');
        $this->load->model('Rooms_type');

    }
    
    function index(){
        
        $this->list_rooms_checked();
        
    }
    
    function list_rooms_checked(){
        
        
        $data= array('titulo'=>'Hotel Sudamérica | Sistema de Gestión Hoteles ','dashboard'=>0);
        $this->load->view("partial/header",$data);
        
        $rooms_pending_check_out = $this->Rooms->get_active_rooms_checked();
                
        $module = 'Alquiler habitación';
        $action = 'Ver lista habitaciones con checkout pendiente';
        
        $data = array('rooms_pending_check_out' => $rooms_pending_check_out,
                      'module' => $module, 'action' => $action);
        
        
        $this->load->view("rent/list",$data);
        
        $this->load->view("partial/footer",$data);
        
    }
    
    private function get_list_not_available_rooms($not_available_rooms){
        
        $list = array();
        
        foreach($not_available_rooms as $room){
            
            $list[]= $room->idroom;
            
        }
        
        return $list;
        
    }

    function get_rooms_by_dates(){
        
        $min_date = $this->input->post('min_date');
        $max_date = $this->input->post('max_date');

        $min_date = DateTime::createFromFormat('d/m/Y', $min_date)->format('Y-m-d');
        $max_date = DateTime::createFromFormat('d/m/Y', $max_date)->format('Y-m-d');

        $res = $this->Rooms->get_rooms_by_dates($min_date,$max_date);
        
        echo json_encode(array('ok' => true, 'rooms' => $res ));
  
    }
    
    function get_available_rooms($min_date,$max_date,$room_type){
        
        $rooms = $this->Rooms->get_rooms(0);
        $not_available_rooms = $this->Rooms->get_not_available_rooms($min_date,$max_date,$room_type);
        $list_not_available_rooms = $this->get_list_not_available_rooms($not_available_rooms);
                  
        return $rooms;
  
    }


    function view($idrent = -1){
        
        $data= array('titulo'=>'Hotel Sudamérica | Sistema de Gestión Hoteles ','dashboard'=>0);
        $this->load->view("partial/header",$data);
        
        $min_date = date('Y-m-d 10:30');
        $max_date = date('Y-m-d 11:00', strtotime($min_date . ' +1 day'));
        $room_type = 0;
        
        $available_rooms = $this->get_available_rooms($min_date,$max_date,$room_type);
        $room_types = $this->Rooms_type->get_all();
        
        $module = 'Venta';
        $action = 'Venta item';
                
        $data = array('available_rooms' => $available_rooms,
                      'room_types' => $room_types,
                      'min_date' => $min_date, 'max_date' => $max_date,
                      'module' => $module, 'action' => $action);
        
        $this->load->view("rent/view",$data);
        
        $this->load->view("partial/footer",$data);
        
    }



    function edit($idsale = -1){

        if( $idsale != -1 ){

            $data= array('titulo'=>'Hotel Sudamérica | Sistema de Gestión Hoteles ','dashboard'=>0);
            $this->load->view("partial/header",$data);

            $min_date = date('Y-m-d 10:30');
            $max_date = date('Y-m-d 11:00', strtotime($min_date . ' +1 day'));
            $room_type = 0;

            $available_rooms = $this->get_available_rooms($min_date,$max_date,$room_type);
            $room_types = $this->Rooms_type->get_all();

            $idcustomer = $this->Rents->get_customer_id_by_idsale($idsale)[0]->idcustomer;

            $amount_details = $this->Rents->get_sale_amounts($idsale);
            $amount_to_pay = $amount_details[0]->amount;
            $amount_paid = $amount_details[0]->amount_paid;

            $module = 'Venta';
            $action = 'Edición';

            $data = array('available_rooms' => $available_rooms,
                      'room_types' => $room_types,
                      'min_date' => $min_date, 'max_date' => $max_date,'idsale' => $idsale,
                      'amount_to_pay' => $amount_to_pay, 'amount_paid' => $amount_paid,
                      'idcustomer' => $idcustomer,'module' => $module, 'action' => $action);

            $this->load->view("rent/edit",$data);
            
            $this->load->view("partial/footer",$data);

        } else {

            $this->index();

        }

    }


    function get_payments(){

        $idsale = $this->input->post('idsale');
        $res = $this->Rents->get_payments($idsale);

        echo json_encode(array('ok' => true, 'payments' => $res ));

    }


    function get_rents_by_idsale()
    {
        $idsale = $this->input->post('idsale');
        $res = $this->Rents->get_rents_by_idsale($idsale);

        echo json_encode(array('ok' => true, 'rents' => $res ));
    }

    function get_items_by_idsale(){
        $idsale = $this->input->post('idsale');
        $res = $this->Rents->get_items_by_idsale($idsale);
        echo json_encode(array('ok' => true, 'items' => $res ));
    }

    function update_products(){
        $sale_id            = $this->input->post('idsale');
        $id_room            = explode('&', $this->input->post('idroom') );
        $cantidad           = explode('&', $this->input->post('cantidad') );
        $descuento          = explode('&', $this->input->post('descuento') );
        $fecha_fin          = explode('&', $this->input->post('fecha_fin') );

        //Se obtiene cantidad de items
        $items = sizeof($id_room);

        $cont_bad=0;

        for ($i=0; $i < $items; $i++) {

            $reg_id_room = $reg_id_item = explode("=",$id_room[$i])[1];
            $reg_quantity = explode("=",$cantidad[$i])[1];
            $reg_discount = explode("=",$descuento[$i])[1];
            $reg_fecha_fin = DateTime::createFromFormat('d/m/Y', urldecode(explode("=",$fecha_fin[$i])[1]) )->format('Y-m-d H:i:s');

            $res = $this->Rents->update_product($reg_id_room,$reg_quantity,$reg_discount,$reg_fecha_fin,$sale_id);

            if(!$res){   
                $cont_bad++;
            } 

        }

        if($cont_bad == 0){   
            echo json_encode(array('ok' => true, 'message' => 'Se realizó el registro' ));
        }else{
            echo json_encode(array('ok' => false, 'message' => 'Error al guardar. Consulte con el administrador'));
        }

    }

    function update_sale_detail(){

        $sale_id = $this->input->post('sale_id');
        $amount = $this->input->post('amount');
        $amount_paid = $this->input->post('amount_paid');

        $user_id = $this->User->get_logged_in_user_info()->iduser;

        $res = $this->Rents->update_sale_detail($sale_id,$amount,$amount_paid,$user_id);

        if($res){
            echo json_encode(array('ok' => true, 'message' => 'Registros actualizados' ));
        }else{
            echo json_encode(array('ok' => false, 'message' => 'Error al guardar. Consulte con el administrador'));
        }

    }


    function save_products(){
        // Se reciben parametros por post
        $tipo_registro      = explode('&', $this->input->post('tipo_registro') );
        $estado_registro    = explode('&', $this->input->post('estado_registro') );
        $nombre             = explode('&', $this->input->post('nombre') );
        $id_room            = explode('&', $this->input->post('idroom') );
        $room               = explode('&', $this->input->post('room') );
        $precio_unitario    = explode('&', $this->input->post('precio_unitario') );
        $cantidad           = explode('&', $this->input->post('cantidad') );
        $descuento          = explode('&', $this->input->post('descuento') );
        $total              = explode('&', $this->input->post('total') );
        $nro_doc            = $this->input->post('nro_doc');
        $amount_to_pay      = $this->input->post('amount_to_pay');
        $amount_payed       = $this->input->post('amount_payed');
        $customer_type      = $this->input->post('customer_type');
        $fecha_ini          = explode('&', $this->input->post('fecha_ini') );
        $fecha_fin          = explode('&', $this->input->post('fecha_fin') );
        $id_customer        = $this->input->post('idcustomer');
        $sale_id            = $this->input->post('idsale');

        $user_id = $this->User->get_logged_in_user_info()->iduser;

        //Se obtiene cantidad de items
        $items = sizeof($tipo_registro);

        for ($i=0; $i < $items; $i++) { 
            
            $reg_type = explode("=",$tipo_registro[$i])[1];
            $reg_status = explode("=",$estado_registro[$i])[1];
            $reg_name = urldecode( explode("=",$nombre[$i])[1] );
            $reg_id_room = $reg_id_item = explode("=",$id_room[$i])[1];
            $reg_room = explode("=",$room[$i])[1];
            $reg_unit_price = explode("=",$precio_unitario[$i])[1];
            $reg_quantity = explode("=",$cantidad[$i])[1];
            $reg_discount = explode("=",$descuento[$i])[1];
            $reg_total = explode("=",$total[$i])[1];
            $reg_fecha_ini = DateTime::createFromFormat('d/m/Y', urldecode(explode("=",$fecha_ini[$i])[1]) )->format('Y-m-d H:i:s');
            $reg_fecha_fin = DateTime::createFromFormat('d/m/Y', urldecode(explode("=",$fecha_fin[$i])[1]) )->format('Y-m-d H:i:s');

            $cont_ok=0;

            if($reg_type == "room"){

                $res = $this->Rents->save_rent($reg_fecha_ini,$reg_fecha_fin,$reg_status,$reg_id_room,$sale_id,$id_customer,$reg_unit_price,$reg_discount,$reg_quantity,$reg_room);
                //actualizamos estado de la habitación:
                $up = $this->Rents->update_room_status($reg_id_room,$reg_status);

                if($res){   
                    $cont_ok++;
                } 

            } else if($reg_type == "item") {

                $id_rent = null;

                //Si el item está asignado a un room, obtenemos id del room:
                if($reg_room!='' && $reg_room!=null)
                {
                    $id_room = $this->Rooms->getIdRoom($reg_room)[0]->idroom;

                    //obtenemos id del rent:
                    $id_rent = $this->Rents->getIdRent($sale_id,$id_room)[0]->idrent;
                }
                
                $res = $this->Rents->save_item_sale($sale_id,$reg_unit_price,$reg_quantity,$reg_id_item,$reg_discount,$id_rent,$user_id,$reg_name,$reg_room);

                if($res){   
                    $cont_ok++;
                }
            }
    
        }

        if($cont_ok > 0){   
            echo json_encode(array('ok' => true, 'message' => 'Se realizó el registro', 'sale_id' => $sale_id ));
        }else{
            echo json_encode(array('ok' => false, 'message' => 'Error al guardar. Consulte con el administrador'));
        }

    }


    function save(){

        // Se reciben parametros por post
        $tipo_registro      = explode('&', $this->input->post('tipo_registro') );
        $estado_registro    = explode('&', $this->input->post('estado_registro') );
        $nombre             = explode('&', $this->input->post('nombre') );
        $id_room            = explode('&', $this->input->post('idroom') );
        $room               = explode('&', $this->input->post('room') );
        $precio_unitario    = explode('&', $this->input->post('precio_unitario') );
        $cantidad           = explode('&', $this->input->post('cantidad') );
        $descuento          = explode('&', $this->input->post('descuento') );
        $total              = explode('&', $this->input->post('total') );
        $nro_doc            = $this->input->post('nro_doc');
        $amount_to_pay      = $this->input->post('amount_to_pay');
        $amount_payed       = $this->input->post('amount_payed');
        $customer_type      = $this->input->post('customer_type');
        $fecha_ini = explode('&', $this->input->post('fecha_ini') );
        $fecha_fin = explode('&', $this->input->post('fecha_fin') );
        

        $user_id = $this->User->get_logged_in_user_info()->iduser;

        
        //Se obtiene cantidad de items
        $items = sizeof($tipo_registro);

        
        //Obtenemos id Cliente:
        $id_customer = 0;

        if($customer_type=="persona"){
            $id_customer = $this->Customers->get_person_by_doc($nro_doc)[0]->idcustomer;
        } else if($customer_type=="empresa"){
            $id_customer = $this->Customers->get_company_by_doc($nro_doc)[0]->idcustomer;
        }


        //Insertamos la venta:
        $sale_id = $this->Rents->save_sale($id_customer,$amount_to_pay,$amount_payed,$user_id);


        for ($i=0; $i < $items; $i++) { 
            
            $reg_type = explode("=",$tipo_registro[$i])[1];
            $reg_status = explode("=",$estado_registro[$i])[1];
            $reg_name = urldecode( explode("=",$nombre[$i])[1] );
            $reg_id_room = $reg_id_item = explode("=",$id_room[$i])[1];
            $reg_room = explode("=",$room[$i])[1];
            $reg_unit_price = explode("=",$precio_unitario[$i])[1];
            $reg_quantity = explode("=",$cantidad[$i])[1];
            $reg_discount = explode("=",$descuento[$i])[1];
            $reg_total = explode("=",$total[$i])[1];


            $cont_ok=0;

            if($reg_type == "room"){

                $reg_fecha_ini = DateTime::createFromFormat('d/m/Y', urldecode(explode("=",$fecha_ini[$i])[1]) )->format('Y-m-d H:i:s');
                $reg_fecha_fin = DateTime::createFromFormat('d/m/Y', urldecode(explode("=",$fecha_fin[$i])[1]) )->format('Y-m-d H:i:s');

                $res = $this->Rents->save_rent($reg_fecha_ini,$reg_fecha_fin,$reg_status,$reg_id_room,$sale_id,$id_customer,$reg_unit_price,$reg_discount,$reg_quantity,$reg_room);
                //actualizamos estado de la habitación:
                $up = $this->Rents->update_room_status($reg_id_room,$reg_status);

                if($res){   
                    $cont_ok++;
                } 

            } else if($reg_type == "item") {

                $id_rent = null;

                //Si el item está asignado a un room, obtenemos id del room:
                if($reg_room!='' && $reg_room!=null)
                {
                    $id_room = $this->Rooms->getIdRoom($reg_room)[0]->idroom;

                    //obtenemos id del rent:
                    $id_rent = $this->Rents->getIdRent($sale_id,$id_room)[0]->idrent;
                }
                
                $res = $this->Rents->save_item_sale($sale_id,$reg_unit_price,$reg_quantity,$reg_id_item,$reg_discount,$id_rent,$user_id,$reg_name,$reg_room);

                if($res){   
                    $cont_ok++;
                }
            }
    
        }

        if($cont_ok > 0){   
            echo json_encode(array('ok' => true, 'message' => 'Se realizó el registro', 'sale_id' => $sale_id ));
        }else{
            echo json_encode(array('ok' => false, 'message' => 'Error al guardar. Consulte con el administrador'));
        }


    }


    function save_sale_payment(){

        // Se reciben parametros por post
        $id_sale         = $this->input->post('id_sale');
        $payment_type    = explode('&', $this->input->post('payment_type') );
        $payment_amount  = explode('&', $this->input->post('payment_amount') );
        $payment_date    = explode('&', $this->input->post('payment_date') );

        $user_id = $this->User->get_logged_in_user_info()->iduser;

        //Se obtiene cantidad de items
        $items = sizeof($payment_type);

        $cont_ok=0;

        for ($i=0; $i < $items; $i++) {

            $reg_type = explode("=",$payment_type[$i])[1];
            $reg_amount = explode("=",$payment_amount[$i])[1];
            $reg_date = DateTime::createFromFormat('d/m/Y', urldecode(explode("=",$payment_date[$i])[1]))->format('Y-m-d H:i:s');


            $res = $this->Rents->save_sale_payment($id_sale,$reg_type,$reg_amount,$reg_date,$user_id);

            if($res){   
                $cont_ok++;
            }

        }

        if($cont_ok > 0){   
            echo json_encode(array('ok' => true, 'message' => 'Se realizó el registro', 'sale_id' => $id_sale ));
        } else {
            echo json_encode(array('ok' => false, 'message' => 'Error al guardar. Consulte con el administrador'));
        }



    }




}