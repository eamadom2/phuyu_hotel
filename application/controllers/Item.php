<?php

require_once ("Secure_area.php");

class Item extends Secure_area {
    
    function __construct() {
        parent::__construct();
        
        $this->load->helper('common');
        $this->load->helper('date');
        $this->load->library('form_validation');
        $this->load->model('Items');

    }
    
    function index(){
        
        $this->list_items();
        
    }
    
    function list_items(){
        
        $data= array('titulo'=>'Hotel Sudamérica | Sistema de Gestión Hoteles ','dashboard'=>0);
        $this->load->view("partial/header",$data);
        
        $user_id = $this->session->idUser;
        $user_rol = $this->session->rol;
        
        $items = $this->Items->get_items(1);
        
        $module = 'Items';
        $action = 'Lista items';
        
        $data = array(
            'items' =>   $items,
            'module'=>   $module,
            'action'=>   $action,
            'user_rol'=> $user_rol,
        );
        
        
        $this->load->view("items/list",$data);
        $this->load->view("partial/footer");
        
        
    }
    
    function get_data_inventory(){
        
        $user_id = $this->session->idUser;
        $type = $this->input->post('type');
        $quantity = 0;
        
        if($type == 1) $quantity = $this->input->post('quantity');
        else $quantity =  $quantity - $this->input->post('quantity');
        
        $data = array(
            'iditem' => $this->input->post('iditem'),
            'iduser' => $user_id,
            'transaction_date' => date('Y-m-d H:i:s'),
            'transaction_type' => $type,
            'transaction_inventory' => $quantity,
            'transaction_reason' => $this->input->post('reason'),
            'transaction_description' => $this->input->post('description'),
        );
                
        return $data;
        
    }
    
    function get_data(){
        
        $iditem = $this->input->post('iditem');
        $for_sale = $this->input->post('for_sale');
        $is_service = $this->input->post('is_service');
        $category = $this->input->post('type');
        $cost_price = $this->input->post('cost_price');
        $quantity = $this->input->post('quantity');
        
        $status = 3;
        
        if($iditem){
            $status = $this->input->post('status');
        }else{
            if($for_sale && !$is_service && $quantity){
                $status = 1;
            }
        }
        
        if($is_service){
            $quantity = NULL;
            $cost_price = NULL;
        }
        
        $data = array(
            'item_name' => $this->input->post('name'),
            'unit_price' => $this->input->post('unit_price'),
            'cost_price' => $cost_price,
            'quantity' => $quantity,
            'type_item' => $this->input->post('type'),
            'status' => $status,
            'is_service' => $is_service,
            'is_for_sale' => $for_sale,
        );
        
        return $data;
        
    }
    
    function get_data_item($quantity){
        
        $iditem = $this->input->post('iditem');
        
        $item = $this->Items->get_item($iditem);
        
        $data = array(
            'quantity' => $item->quantity + $quantity,
        );
        
        return $data;
        
    }
    
    
    function get_transactions_item($iditem){
        
        $rows = array();
        
        $transactions = $this->Items->get_inventory($iditem);
        $i=0;
        
        foreach($transactions as $transaction){
            
            $rows[$i] = array(
                'datetime' => nice_date($transaction->transaction_date, "d/m/Y H:i"),
                'user' => $transaction->name.' '.$transaction->lastname,
                'quantity' => $transaction->transaction_inventory,
                'type' => get_item_type_inventory($transaction->transaction_type),
                'reason' => get_item_reason($transaction->transaction_type,$transaction->transaction_reason),
                'description' => $transaction->transaction_description,
            );
            
            $i++;
        }
        
        return $rows;
        
    }
    
    function get_transactions(){
          
        $iditem = $this->input->post('iditem');
        
        $rows =  $this->get_transactions_item($iditem);
        
        echo json_encode($rows);
    }
    
    function get_header_table_inventory(){
        
        $header = array();
        
        $header[] = array("name" => "datetime",'title'=>"Fecha Hora" ,"style" => array("width"=>200));
        $header[] = array("name" => "user", 'title'=>"Usuario", "style" => array("width"=>250));
        $header[] = array("name" => "quantity", 'title'=>"Cantidad entrada/salida","breakpoints" => "xs sm", "type" => "number", "style" => array("text-align"=>"center", "width"=>150));
        $header[] = array("name" => "type", 'title'=>"Tipo","breakpoints" => "xs sm");
        $header[] = array("name" => "reason", 'title'=>"Motivo","breakpoints" => "xs sm");
        $header[] = array("name" => "description", 'title'=>"Descripción","breakpoints" => "xs sm");
        
        echo json_encode($header);
        
    }
    
    function save(){
        
        $iditem = $this->input->post('iditem');
        $for_sale = $this->input->post('for_sale');
        $is_service = $this->input->post('is_service');
        $category = $this->input->post('type');
        
        $this->form_validation->set_rules('name', 'Nombre', 'required');
        $this->form_validation->set_rules('type', 'Categoría', 'required');
        
        if($category <> 5){
            $this->form_validation->set_rules('unit_price', 'Precio unitario', 'required|numeric');
        }
        
        if($for_sale && !$is_service){
            
            $this->form_validation->set_rules('cost_price', 'Costo', 'required|numeric');
            $this->form_validation->set_rules('quantity', 'Cantidad', 'required|numeric');
        }
        
        if($iditem){
            $this->form_validation->set_rules('status', 'Estado', 'required');
        }
        
        $this->form_validation->set_message('required', 'El campo {field} es obligatorio');
        $this->form_validation->set_message('numeric', 'El campo {field} debe ser numérico');
        
        if ($this->form_validation->run() == FALSE){
            echo json_encode(array('ok' => false, 'message' => validation_errors()));                
        }else{
            
            $data_item = $this->get_data();
            
            
            if($this->Items->save($data_item,$data_item['quantity'],$iditem)){
                
                echo json_encode(array('ok' => true, 'message' => 'Se registró el item'));
            }else{
                echo json_encode(array('ok' => false, 'message' => 'Error al guardar. Consulte con el administrador'));
            } 
        }
        
    }
    
    function get_all_items(){

        $query = $this->input->post('query');
        $items = $this->Items->get_all_items($query);

        echo json_encode($items->result());

    }
    
    function save_inventory(){
        
        $this->form_validation->set_rules('type', 'Tipo', 'required');
        $this->form_validation->set_rules('reason', 'Motivo', 'required');
        $this->form_validation->set_rules('quantity', 'Cantidad a agregar/substraer', 'required|numeric');
        
        $this->form_validation->set_message('required', 'El campo {field} es obligatorio');
        $this->form_validation->set_message('numeric', 'El campo {field} debe ser numérico');
        
        if ($this->form_validation->run() == FALSE){
            echo json_encode(array('ok' => false, 'message' => validation_errors()));                
        }else{
            
            $data_inventory = $this->get_data_inventory();
            $data_item = $this->get_data_item($data_inventory['transaction_inventory']);

            if($this->Items->save_inventory($data_inventory,$data_item)){
                
                $rows = $this->get_transactions_item($data_inventory['iditem']);
                
                echo json_encode(array('ok' => true, 'quantity' => $data_item['quantity'] , 'rows' => $rows,
                                       'message' => 'Se registró la adición/substracción del item'));
            }else{
                echo json_encode(array('ok' => false, 'message' => 'Error al guardar. Consulte con el administrador'));
            } 
        }
        
    }
    
    function get_reasons(){
        
        $inventory_type = $this->input->post('inventory_type');
        
        $list_reasons = get_reasons_type($inventory_type);
        
        if($list_reasons){
            echo json_encode(array('ok'=>true,'list_reasons'=>$list_reasons));
        }else{
            echo json_encode(array('ok'=>false,'message'=>'Error. No hay motivos. Consulte con el administrador'));
        }

    }
    
    function view($iditem){
        
        $data= array('titulo'=>'Hotel Sudamérica | Sistema de Gestión Hoteles ','dashboard'=>0);
        $this->load->view("partial/header",$data);
        
        $user_id = $this->session->idUser;
        $user_rol = $this->session->rol;
        
        $item = $this->Items->get_item($iditem);
        $categories = get_categories_item();
        $list_status = get_status_items();
        
        $module = 'Items';
        $action = 'Ver';
        
        $data = array(
            'item'        => $item,
            'categories'  => $categories,
            'list_status' => $list_status,
            'module'      => $module,
            'action'      => $action,
            'user_rol'    => $user_rol,
        );
        
        $this->load->view("items/view",$data);
        $this->load->view("partial/footer");
        
    }
    
    function inventory($iditem){
        
        $data= array('titulo'=>'Hotel Sudamérica | Sistema de Gestión Hoteles ','dashboard'=>0);
        $this->load->view("partial/header",$data);
        
        $user_id = $this->session->idUser;
        $user_rol = $this->session->rol;
        
        $item = $this->Items->get_item($iditem);
        $inventory = $this->Items->get_inventory($iditem);
        $type_inventory = get_type_inventory();
        
        $module = 'Items';
        $action = 'Inventario';
        
        $data = array(
            'item'      => $item,
            'inventory' => $inventory,
            'type_inventory' => $type_inventory,
            'module'    => $module,
            'action'    => $action,
            'user_rol'  => $user_rol,
        );
        
        $this->load->view("items/inventory",$data);
        $this->load->view("partial/footer");
             
    }
    
    
}    

