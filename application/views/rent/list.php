<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2 class="tituloPaginaActual"><?php echo $action;?></h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url("home");?> ">Inicio</a></li>
            <li><?php echo $module;?></li>
            <li class="active"><strong><?php echo $action;?></strong></li>
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
                            <a href="<?php echo site_url("rent/view/-1");?>"><button class="btn btn-primary"><i class="fa fa-plus fa-lg" > </i> <span class="bold">Agregar</span></button></a> 
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="footable table table-stripped" data-filter-container="#filter-form-container"  data-sorting="true" data-page-size="10" data-filtering="true"   >  
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Cliente</th>
                                    <th>Checkin</th>
                                    <th>Check out</th>
                                    <th>Monto</th>
                                    <th>Monto pagado</th>
                                    <th>Estado</th>
                                    <th data-type="html" data-sortable="false" data-filterable="false">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                    foreach($rooms_pending_check_out as $room_pending_check_out){?>
                                        <tr class="grade<?= $i%2==0?'C':'X'?>">
                                            <td><?= $room_pending_check_out->idsale ?></td>
                                            <td><?= ($room_pending_check_out->person)?$room_pending_check_out->person:$room_pending_check_out->company_name ?></td>
                                            <td><?= date("d/m/Y H:i",strtotime($room_pending_check_out->date_created)) ?></td>
                                            <td>--</td>
                                            <td class="center"><?= $room_pending_check_out->amount ?></td>
                                            <td class="center"><?= $room_pending_check_out->amount_paid ?></td>
                                            <td id="rent_status_<?= $room_pending_check_out->idsale?>"><?php 
                                                switch($room_pending_check_out->status){
                                                    case 1: echo "Pendiente pago"; break;
                                                    case 2: echo "Pago parcial"; break;
                                                    case 3: echo "Pago completo"; break;
                                                }  
                                                ?>
                                            </td>
                                            <td class="center">
                                                <div class="btn-group">
                                                    <a href="<?php echo site_url("rent/edit/$room_pending_check_out->idsale");?>"><i class="fa fa-pencil fa-lg" title="Editar"></i></a> 
                                                    <?php if($room_pending_check_out->status){ ?>
                                                        <a><button id="delete_<?= $room_pending_check_out->idsale?>" name="delete" onclick="delete_rent('<?= $room_pending_check_out->idsale ?>')" class="delete btn-danger btn btn-xs"><i class="fa fa-trash" title="Eliminar"></i></button></a> 
                                                     <?php } ?>   
                                                </div>
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
                    "dropdownTitle": "Buscar por"
		}
	});
    });

</script>