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
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?= $action;?></h5>
                </div>
                <div class="ibox-content">
                    
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-6"><div id="filter-form-container"></div></div>
                        <div class="col-sm-2">
                            <a href="<?php echo site_url("item/view/-1");?>"><button class="btn btn-primary"><i class="fa fa-plus fa-lg" > </i> <span class="bold">Agregar Item</span></button></a> 
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="footable table table-stripped" data-filter-container="#filter-form-container"  data-sorting="true" data-page-size="20" data-filtering="true"   >  
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Categoría</th>
                                    <th>Costo</th>
                                    <th>Precio venta</th>
                                    <th>Cantidad</th>
                                    <th>Estado</th>
                                    <th data-type="html" data-sortable="false" data-filterable="false">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                    foreach($items as $item){?>
                                        <tr class="grade<?= $i%2==0?'C':'X'?>">
                                            <td><?= $item->item_name ?></td>
                                            <td><?= get_item_category_name($item->type_item) ?></td>
                                            <td date-type="number" data-decimal-separator="." data-sortable="true"><?= $item->cost_price ?></td>
                                            <td date-type="number" data-decimal-separator="." data-sortable="true"><?= $item->unit_price ?></td>
                                            <td date-type="number" data-decimal-separator="." data-sortable="true"><?= $item->quantity ?></td>
                                            <td><?= get_item_status($item->status) ?> </td>
                                            <td class="center">
                                                <?php if($user_rol == 'administrator'){?>
                                                            <a class="btn btn-info btn-bitbucket" href="<?php echo site_url("item/inventory/$item->iditem");?>"><i class="fa fa-refresh" title="Inventario"></i></a>
                                                            <a class="btn btn-success btn-bitbucket" href="<?php echo site_url("item/view/$item->iditem");?>"><i class="fa fa-pencil" title="Editar"></i></a>
                                                            <a class="btn btn-danger btn-bitbucket" href="<?php echo site_url("item/delete/$item->iditem");?>"><i class="fa fa-trash" title="Eliminar"></i></a>
                                                <?php }else{?>
                                                
                                                <?php }?>
                                            </td>
                                        </tr>
                                    <?php 
                                        $i++;
                                    } ?>
                            </tbody>    
                        </table>    
                    </div>  
                </div>
            </div> 
        </div>     
    </div> 
</div> 

<script>
    $(document).ready(function(){
        
        $('.footable').footable({
            "filtering": {
                "placeholder": "Buscar",
                "dropdownTitle": "Campos de búsqueda"
            }
	});
    });

</script>

