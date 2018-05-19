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
                <h5> <?= (!$room->idroom)?'Agregar habitación':'Editar habitación' ?></h5> 
            </div>
            
            <div class="ibox">
                <div class="ibox-content">
                    <form name="room_form" id="item_form" class="form-horizontal" accept-charset="utf-8" >
                      
                        <input type="hidden" id="idroom" name="idroom" value="<?= $room->idroom ?>" />
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label campoObligatorio"><small class="campoObligatorio">*</small>Num Habitación: </label>
                            <div class="col-sm-4">
                                <input id="number" name="number" type="text" class="form-control" value="<?= $room->number ?>" > 
                            </div>         
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label campoObligatorio"><small class="campoObligatorio">*</small>Piso: </label>
                            <div class="col-sm-4">
                                <input id="floor" name="floor" type="text" class="form-control" value="<?= $room->floor ?>" > 
                            </div>         
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label campoObligatorio"><small class="campoObligatorio">*</small>Orden: </label>
                            <div class="col-sm-4">
                                <input id="order" name="order" type="text" class="form-control" value="<?= $room->order ?>" > 
                            </div>         
                        </div>
                        
                        
                        
                        <div class="message_form"></div>
                    
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-2">
                                <div id="cancel" name="cance" onclick="cancel('<?= $room->idroom ?>')" class="procesar_item btn btn-white " >Cancelar</div>
                                <div id="save" name="save" onclick="save()" class="procesar_item btn btn-primary " >Guardar</div>    
                            </div>
                        </div>
                        
                    </form> 
                </div>
            </div>
        </div> 
    </div>
</div>    