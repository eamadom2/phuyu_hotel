<?php

    function get_status_items(){
        
        $list_status = array(
            '0' => 'Eliminado',
            '1' => 'Activo',
            '2' => 'Sin Stock',
        );    
        
        return $list_status;
    }

    function get_categories_sale(){
        
        $categories = array(
            '1' => 'Restaurante',
            '2' => 'Farmacia',
            '3' => 'Productos',
            '4' => 'Otros',
        );
        
        return $categories;
        
    }
    
    function get_categories_item(){
        
        $categories = array(
            '1' => 'Restaurante',
            '2' => 'Farmacia',
            '3' => 'Productos',
            '4' => 'Otros',
            '5' => 'Almacén',
        );
        
        return $categories;
        
    }

    function get_windows_answer($has_windows){
        
        $windows = '';
        
        if($has_windows) $windows = 'Si';
        
        return $windows;
        
    }

    function get_reasons_type($type){
        
        $data = array();
        
        if($type == 1){
            
            $data = array(
                '1' => 'Ingreso items',
                '2' => 'Devolución',
                '3' => 'Ingreso sobras'
            );
            
        }elseif($type == 2){
            
            $data = array(
                '1' => 'Venta',
                '2' => 'Traslado Cieneguilla',
                '3' => 'Traslado otros',
                '4' => 'Recepción',
                '5' => 'Lavandería',
                '6' => 'Cocina/Sauna',
                '7' => 'Salón #1',
                '8' => 'Salón #2',
                '9' => 'Otros',
            );  
        }
        
        return $data;
        
    }
    
    function get_item_reason($type,$reason){
        
        $list = get_reasons_type($type);
        
        return $list[$reason];
        
    }

    function get_type_inventory(){
        
        $data = array(
            '1' => 'Ingreso',
            '2' => 'Salida'
        );
        
        return $data;
              
    }
    
    function get_item_type_inventory($type){
     
        $list = get_type_inventory();
        
        return $list[$type];
    }

    function get_list_category_name(){
        
        $data =  array(
            '1' => 'Restaurante',
            '2' => 'Farmacia',
            '3' => 'Productos',
            '4' => 'Servicios',
            '5' => 'Almacén'
          
        );
        
        return $data;
    }

    function get_item_category_name($idcategory){
        
        $list_categories = get_list_category_name();
        
        return $list_categories[$idcategory];
        
    }
    
    function get_list_status_item(){
        
        $data = array(
            0 => 'Eliminado',
            1 => 'Activo',
            2 => 'Sin stock'
        );
        
        return $data;
        
    }
    
    
    function get_list_cleaning_type(){
        
        $data = array(
            1 => 'Limpieza Pernoctante',
            2 => 'Limpieza checkout',
        );
        
        return $data;
        
    }
    
    function get_cleaning_type($type){
        
        $list_cleaning_type = get_list_cleaning_type();
        
        return $list_cleaning_type[$type];
        
    }
    
    function get_list_status_cleaning(){
        
        $data = array(
            1 => 'Pendiente',
            2 => 'Limpieza iniciada',
            3 => 'Finalizado',
        );
        
        return $data;
        
    }
    
    function get_cleaning_status($status){
        
        $list_status = get_list_status_cleaning();
        
        return $list_status[$status];
        
    }
    
    function get_item_status($status){
        
        $list_status = get_list_status_item();
        
        return $list_status[$status];
        
    }