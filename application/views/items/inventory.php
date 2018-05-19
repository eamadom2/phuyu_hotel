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
                <h5> Inventario <?= $item->item_name?></h5> 
            </div>
            
            <div class="ibox">
                <div class="ibox-content">
                    <form name="inventory_form" id="inventory_form" class="form-horizontal" accept-charset="utf-8" >
                      
                        <input type="hidden" id="iditem" name="iditem" value="<?= $item->iditem ?>" />
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label campoObligatorio">Item: </label>
                            <div class="col-sm-4">
                                <p class="form-control-static"><?= $item->item_name?></p>   
                            </div>         
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label campoObligatorio">Categoría: </label>
                            <div class="col-sm-4">
                                <p class="form-control-static"><?= get_item_category_name($item->type_item)?></p>   
                            </div>         
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label campoObligatorio">Cantidad actual: </label>
                            <div class="col-sm-4">
                                <p class="form-control-static" id="current_quantity" ><?= $item->quantity?></p>   
                            </div>         
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label campoObligatorio"><small class="campoObligatorio">*</small>Tipo: </label>
                            <div class="col-sm-4">
                                <select class="form-control" id="type"  name="type">
                                    <option selected value="">Seleccion tipo</option>    
                                    <?php foreach ($type_inventory as $key => $value) {  ?>
                                        <option value="<?= $key ?>"><?= $value ?></option>
                                    <?php } ?>
                                </select>  
                            </div>         
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label campoObligatorio"><small class="campoObligatorio">*</small>Motivo: </label>
                            <div class="col-sm-4">
                                <select class="form-control" id="reason"  name="reason">
                                    <option selected value="">Seleccion tipo</option>           
                                </select>  
                            </div>         
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label campoObligatorio"><small class="campoObligatorio">*</small>Cantidad a agregar o substraer</label>
                            <div class="col-sm-4">
                                <input id="quantity" name="quantity" type="text" class="form-control" value="" >
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Descripción</label>
                            <div class="col-sm-4">
                                <textarea id="description" name="description" type="text" class="form-control" placeholder="Ingrese descripción" value=""> </textarea>
                            </div>
                        </div>
                        
                        <div class="message_form"></div>
                    
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-2">
                                <div id="cancel" name="cancel" onclick="cancel()" class="procesar_item btn btn-white " >Cancelar</div>
                                <div id="save" name="save" onclick="save()" class="procesar_item btn btn-primary " >Guardar</div>    
                            </div>
                        </div>
                        
                    </form>
                    
                </div>
            </div>    
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox-title">
                <h5> Historial de movimientos</h5> 
            </div>
            <div class="ibox">
                <div class="ibox-content">
                    <table class="table" data-paging="true" data-sorting="true"></table>
                </div>
            </div>    
        </div>
    </div>    
    
</div>  

<script type="text/javascript">
    
    function save(){
                    
        var ft = FooTable.get('.table');
                    
        var data = {
            'iditem' : $('#iditem').val(),
            'type' : $('#type').val(),
            'reason' : $('#reason').val(),
            'quantity' : $('#quantity').val(),
            'description' : $('#description').val()
        }; 

        $.ajax({
            type:"post",
            url: '<?php echo site_url('item/save_inventory/') ?>',
            data: data,
            dataType: 'json',
            success: function (data) {

                if (data.ok){ 
                    $('#current_quantity').html(data.quantity);
                    ft.rows.load(data.rows);
                    $('.message_form').append('<div class="alert alert-success">' + data.message + '</div>');
                    
                    setTimeout(function() {  
                        $('.message_form').empty();
                        $('#reason').find('option').not(':first').remove();
                        $('#inventory_form').trigger("reset");
                        $('#iditem').val(<?= $item->iditem ?>);
                    }, 2000);
                    
                }else{
                    $('.message_form').append('<div class="alert alert-danger">' + data.message + '</div>');
                }

            }
        });
        
    }
    
</script>  

<script>
    $(document).ready(function(){
        
        var data_columns = {
                        'iditem' : $('#iditem').val()
                    };
        
        $('.table').footable({
            'columns': 
                    $.ajax({
                        dataType: 'json',
                        url: '<?php echo site_url('item/get_header_table_inventory/') ?>',
                    }) ,
            'rows':                     
                    $.ajax({
                        type:"post",
                        data: data_columns,
                        dataType: 'json',
                        url: '<?php echo site_url('item/get_transactions/') ?>',
                    }) ,
	});
        
        $("#type").change(function() {
                               
            var data = {
                'inventory_type' : $("#type").val()
            };

            $.ajax({
                type:"post",
                url: '<?php echo site_url('item/get_reasons/') ?>',
                data: data,
                dataType: 'json',
                success: function (data) {

                    $('#reason').find('option').not(':first').remove();

                    if (data.ok){
                        
                        $.each(data.list_reasons,function(index,type){
                            $('#reason').append('<option value="'+index+'">'+type+'</option>');
                        });
                        
                    }else{
                        
                        $('.message_form').append('<div class="alert alert-success">' + data.message + '</div>');

                    }

                }
            });

        });
        
    });
 </script>   