<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2 class="tituloPaginaActual"><?=  $action;?></h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url("dashboard");?> ">Inicio</a></li>
            <li><?= ucwords($module);?></li>
            <li class="active"><strong><?= $action;?></strong></li>
        </ol>
    </div>
    <div class="col-lg-2"></div>
</div> 

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox-title">
                <h5> <?= (!$item->iditem)?'Agregar item':'Editar item' ?></h5> 
            </div>
            
            <div class="ibox">
                <div class="ibox-content">
                    <form name="item_form" id="item_form" class="form-horizontal" accept-charset="utf-8" >
                      
                        <input type="hidden" id="iditem" name="iditem" value="<?= $item->iditem ?>" />
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label campoObligatorio"><small class="campoObligatorio">*</small>Item: </label>
                            <div class="col-sm-4">
                                <input id="name" name="name" type="text" class="form-control" value="<?= $item->item_name ?>" > 
                            </div>         
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label campoObligatorio"><small class="campoObligatorio">*</small>Categoría: </label>
                            <div class="col-sm-4">
                                <select class="form-control" id="type"  name="type">
                                    <option selected value="">Seleccion categoría</option>    
                                    <?php foreach ($categories as $key => $value) {  ?>
                                        <option <?php if($item->type_item == $key){ ?> selected <?php } ?> value="<?= $key ?>"><?= $value ?></option>
                                    <?php } ?>
                                </select>  
                            </div>         
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label campoObligatorio">¿Para venta?: </label>
                            <div class="col-sm-4">
                                <div class="i-checks"><input id="for_sale" name="for_sale" type="checkbox" value="<?= $item->is_for_sale ?>" <?php if($item->is_for_sale){?> checked <?php }?> > </div>
                            </div>         
                        </div>
                        
                        <div id="service">
                            <div class="form-group">
                                <label class="col-sm-2 control-label campoObligatorio"><small class="campoObligatorio">*</small>¿Es servicio?: </label>
                                <div class="col-sm-4">
                                    <div class="i-checks"><input id="is_service" name="is_service" type="checkbox" value="<?= $item->is_service?>" <?php if($item->is_service){?> checked <?php }?> > </div>
                                </div>         
                            </div>
                        </div>    
                        
                        <div id="price">
                            <div class="form-group">
                                <label class="col-sm-2 control-label campoObligatorio"><small class="campoObligatorio">*</small>Precio: </label>
                                <div class="col-sm-4">
                                    <input id="unit_price" name="unit_price" type="text" class="form-control" value="<?= $item->unit_price ?>" > 
                                </div>         
                            </div>
                        </div>
                        
                        <div id="cost">
                            <div class="form-group">
                                <label class="col-sm-2 control-label campoObligatorio"><small class="campoObligatorio">*</small>Costo: </label>
                                <div class="col-sm-4">
                                    <input id="cost_price" name="cost_price" type="text" class="form-control" value="<?= $item->cost_price ?>" > 
                                </div>         
                            </div>
                        </div>
                        
                        <div id="quantity">
                            <div class="form-group">
                                <label class="col-sm-2 control-label campoObligatorio"><small class="campoObligatorio">*</small>Cantidad: </label>
                                <div class="col-sm-4">
                                    <?php if($item->iditem){?>
                                        <p class="form-control-static" id="current_quantity" ><?= $item->quantity?></p>
                                    <?php }else{?>
                                        <input id="item_quantity" name="item_quantity" type="text" class="form-control" value="<?= $item->quantity ?>" > 
                                    <?php } ?>
                                </div>         
                            </div>
                        </div>
                        
                        <?php if($item->iditem){?>
                            <div class="form-group">
                                <label class="col-sm-2 control-label campoObligatorio"><small class="campoObligatorio">*</small>Estado: </label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="type"  name="type">
                                        <option selected value="">Seleccione estado</option>    
                                        <?php foreach ($list_status as $key => $value) {  ?>
                                            <option <?php if($item->status == $key){ ?> selected <?php } ?> value="<?= $key ?>"><?= $value ?></option>
                                        <?php } ?>
                                    </select>  
                                </div>         
                            </div>
                        <?php }?>
                        
                        <div class="message_form"></div>
                    
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-2">
                                <div id="cancel" name="cance" onclick="cancel('<?= $item->iditem ?>')" class="procesar_item btn btn-white " >Cancelar</div>
                                <div id="save" name="save" onclick="save()" class="procesar_item btn btn-primary " >Guardar</div>    
                            </div>
                        </div>
                        
                    </form>   
                </div>
            </div>
        </div>
    </div>
</div>    
  
<script>
    $(document).ready(function(){
        
        var item_id = '<?= $item->iditem?>';
        
        if(!item_id){
            $('#service').hide();
            $('#price').hide();
            $('#cost').hide();
        }else{
            $('#service').hide();
            $('#price').hide();
            $('#cost').hide();
        }    
        
        function show_fields_sales(){
            $('#service').show();
            $('#price').show();
            $('#cost').show(); 
            $('#for_sale').val(1); 
            
        }  
        
        function hide_fields_sales(){
            $('#service').hide();
            $('#price').hide();
            $('#cost').hide();
            $('#for_sale').val(0); 
        }  
        
        function hide_fields_not_service(){
            
            $('#cost').hide();  
            $('#quantity').hide();  
            $('#is_service').val(1);  
        }    
        
        function show_field_not_service(){
            
            $('#cost').show();  
            $('#quantity').show(); 
            $('#is_service').val(0); 
        } 
                
        $("#for_sale").on("ifChecked", show_fields_sales ); 
        $("#for_sale").on("ifUnchecked", hide_fields_sales );
        $("#is_service").on("ifChecked", hide_fields_not_service );
        $("#is_service").on("ifUnchecked", show_field_not_service );
                
        

        
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });
    });
</script>    

<script type="text/javascript">
    
   
    function cancel(iditem){
        
        if (iditem){
            location.reload();
        }else{
            $('#item_form').trigger("reset");
        }
        
    }
    
    function save(){

        $('.message_form').empty();
        
        var data = {
            'iditem'     : $('#iditem').val(),
            'name'       : $('#name').val(),
            'type'       : $('#type').val(),
            'for_sale'   : $('#for_sale').val(),
            'is_service' : $('#is_service').val(),
            'quantity'   : $('#item_quantity').val(),
            'cost_price' : $('#cost_price').val(),
            'unit_price' : $('#unit_price').val(),
            'status'     : $('#status').val()
        }; 
        
        $.ajax({
            type:"post",
            url: '<?php echo site_url('item/save/') ?>',
            data:data,
            dataType: 'json',
            success: function (data) {

                if (!data.ok){
                    $('.message_form').append('<div class="alert alert-danger">' + data.message + '</div>'); 
                }else{
                    $('.message_form').append('<div class="alert alert-success">' + data.message + '</div>');
                    
                    setTimeout(function() { 
                        window.location.href = '<?php echo base_url('item/view/-1'); ?>';
                    }, 2500);
                }

            }
        });

    }
</script>