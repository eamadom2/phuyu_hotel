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
                <h5> Limpieza Habitación <?= $cleaning_room->number?></h5> 
            </div>
            
            <div class="ibox">
                <div class="ibox-content">
                    <form name="cleaning_form" id="cleaning_form" class="form-horizontal" accept-charset="utf-8" >
                      
                        <input type="hidden" id="idcleaning" name="idcleaning" value="<?= $cleaning_room->idcleaning ?>" />
                        
                        <div class="form-group">
                            
                            <label class="col-sm-3 col-md-3 col-lg-2 control-label ">Articulos a devolver :</label>						
                            <div class="table-responsive col-sm-9 col-md-6 col-lg-6">
                                <table id="items_return" class="table">
                                    <thead>
                                        <tr>
                                        <th>Articulo limpieza</th>
                                        <th>Cantidad</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            
                                            <td class="col-md-5">
                                                <select class="form-control chosen-select" id="items_return_name" name="items_return_name[]"   >
                                                    <option selected value="">Seleccion item</option>    
                                                    <?php foreach ($items_cleaning as $item) { ?>
                                                        <option value="<?= $item->iditem ?>"><?= $item->item_name ?>"</option>
                                                    <?php } ?>
                                                </select> 
                                                
                                            </td>
                                            <td class="col-md-3"><input type="text"  name="items_return_quantity[]" class="form-control" value="" /></td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                                
                                <a href="javascript:void(0);" id="add_item_return">Agregar item</a>
                            </div> 
                        </div>  
                        
                        <div class="form-group">
                            
                            <label class="col-sm-3 col-md-3 col-lg-2 control-label ">Articulos a agregar :</label>						
                            <div class="table-responsive col-sm-9 col-md-6 col-lg-6">
                                <table id="items_add" class="table">
                                    <thead>
                                        <tr>
                                        <th>Articulo limpieza</th>
                                        <th>Cantidad</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            
                                            <td class="col-md-5">
                                                <select class="form-control chosen-select" id="items_add_name" name="items_add_name[]" >
                                                    <option selected value="">Seleccion item</option>    
                                                    <?php foreach ($items_cleaning as $item) { ?>
                                                        <option value="<?= $item->iditem ?>"><?= $item->item_name ?>"</option>
                                                    <?php } ?>
                                                </select> 
                                            </td>
                                            <td class="col-md-3"><input type="text" name="items_add_quantity[]" class="form-control" value="" /></td>
                                           
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="javascript:void(0);" id="add_item_add">Agregar item</a>
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
        
        $("#add_item_return").click(function(){
            
            $("#items_return_name").chosen("destroy");
            
            var content = '<tr><td class="col-md-5"><select class="form-control chosen-select" id="items_return_name" name="items_return_name[]" ><option selected value="">Seleccion item</option><?php foreach ($items_cleaning as $item) { ?><option value="<?= $item->iditem ?>"><?= $item->item_name ?>"</option><?php } ?> </select> </td><td class="col-md-3"><input type="text" class="form-control" name="items_add_quantity[]" value="" /></td></tr>';
            
            $("#items_return tbody").append(content);
            $('#items_return_name').chosen();
	});
        
        $("#add_item_add").click(function(){
            
            $("#items_add_name").chosen("destroy");
            
            var content = '<tr><td class="col-md-5"><select class="form-control chosen-select" id="items_add_name" name="items_add_name[]" ><option selected value="">Seleccion item</option><?php foreach ($items_cleaning as $item) { ?><option value="<?= $item->iditem ?>"><?= $item->item_name ?>"</option><?php } ?> </select> </td><td class="col-md-3"><input type="text" class="form-control" name="items_return_quantity[]" value="" /></td></tr>';
            
            $("#items_add tbody").append(content);
            $('#items_add_name').chosen();
	});
        
            
        var config = {
                '.chosen-select'           : {},
                '.chosen-select-deselect'  : {allow_single_deselect:true},
                '.chosen-select-no-single' : {disable_search_threshold:10},
                '.chosen-select-no-results': {no_results_text:'Oops, no se encontró!'},
                '.chosen-select-width'     : {width:"95%"}
        }
            
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }
    
    });
</script>    