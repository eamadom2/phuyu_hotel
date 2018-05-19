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
                            <a href="<?php echo site_url("room/view/-1");?>"><button class="btn btn-primary"><i class="fa fa-plus fa-lg" > </i> <span class="bold">Agregar Habitación</span></button></a> 
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="footable table table-stripped" data-filter-container="#filter-form-container"  data-sorting="true" data-page-size="20" data-filtering="true"   >  
                            <thead>
                                <tr>
                                    <th class="text-center">Num Habitación</th>
                                    <th class="text-center">Piso</th>
                                    <th class="text-center">Tipo Habitación</th>
                                    <th class="text-center">Ventana calle</th>
                                    <th class="text-center">Estado actual</th>
                                    <th data-type="html" data-sortable="false" data-filterable="false">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                    foreach($rooms as $room){?>
                                        <tr class="grade<?= $i%2==0?'C':'X'?>">
                                            <td class="text-center"><?= $room->number ?></td>
                                            <td class="text-center"><?= $room->floor ?></td>
                                            <td class="text-center"><?= $room->roomtype_name?></td>
                                            <td class="text-center"><?= get_windows_answer($room->window)?></td>
                                            <td class="text-center"><?= get_item_status($room->status) ?> </td>
                                            <td class="center">
                                                <?php if($user_rol == 'administrator'){?>
                                                            <a class="btn btn-success btn-bitbucket" href="<?php echo site_url("room/edit/$room->idroom");?>"><i class="fa fa-pencil" title="Editar"></i></a>
                                                            <a class="btn btn-danger btn-bitbucket" href="<?php echo site_url("room/delete/$room->idroom");?>"><i class="fa fa-trash" title="Eliminar"></i></a>
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

