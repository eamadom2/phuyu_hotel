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
            <div class="ibox-title">
                <h5> Información Hotel</h5> 
            </div>
            
            <div class="ibox">
                <div class="ibox-content">
                    <form name="hotel_form" id="customer_form" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8" >
                        
                        <input type="hidden" id="idhotel" name="idhotel" value="<?= $hotel->idhotel ?>" />
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label campoObligatorio"><small class="campoObligatorio">*</small>Nombre</label>
                            <div class="col-sm-6">
                                <input  id="name" name="name" type="text" class="form-control" value="<?= $hotel->name?>" >
                            </div> 
                        </div>  
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label campoObligatorio"><small class="campoObligatorio">*</small>Dirección</label>
                            <div class="col-sm-6">
                                <input id="address" name="address" type="text" class="form-control" value="<?= $hotel->address?>" >
                            </div> 
                        </div>  
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label campoObligatorio"><small class="campoObligatorio">*</small>Teléfono</label>
                            <div class="col-sm-6">
                                <input id="phone" name="phone" type="text" class="form-control" value="<?= $hotel->phone?>" >
                            </div> 
                        </div>  
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label campoObligatorio"><small class="campoObligatorio">*</small>Email</label>
                            <div class="col-sm-6">
                                <input id="email" name="email" type="text" class="form-control" value="<?= $hotel->email?>" >
                            </div> 
                        </div>  
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label campoObligatorio"><small class="campoObligatorio">*</small>N° Pisos</label>
                            <div class="col-sm-6">
                                <input id="num_floors" name="num_floors" type="text" class="form-control" value="<?= $hotel->num_floors?>" >
                            </div> 
                        </div>  
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label campoObligatorio"><small class="campoObligatorio">*</small>RUC</label>
                            <div class="col-sm-6">
                                <input id="ruc" name="ruc" type="text" class="form-control" value="<?= $hotel->ruc?>" >
                            </div> 
                        </div>  
                        
                        <div class="message_form"></div>
                    
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-2">
                                <div id="cancel" name="cance" onclick="cancel('<?= $hotel->idhotel ?>')" class="procesar_item btn btn-white " >Cancelar</div>
                                <div id="save" name="save" onclick="save()" class="procesar_item btn btn-primary " >Guardar</div>    
                            </div>
                        </div>
                        
                    </form>   
                </div>
            </div>
        </div>
    </div>
</div>    

<script type="text/javascript">
    
   
    function cancel(idhotel){
        
        if (idhotel){
            location.reload();
        }else{
            $('#hotel_form').trigger("reset");
        }
        
    }
    
    function save(){

        $('.message_form').empty();
        
        var data = {
            'idhotel'    : $('#idhotel').val(),
            'name'       : $('#name').val(),
            'address'    : $('#address').val(),
            'phone'      : $('#phone').val(),
            'num_floors' : $('#num_floors').val(),
            'email'      : $('#email').val(),
            'ruc'        : $('#ruc').val(),
        }; 
        
        $.ajax({
            type:"post",
            url: '<?php echo site_url('hotel/save/') ?>',
            data:data,
            dataType: 'json',
            success: function (data) {

                if (!data.ok){
                    $('.message_form').append('<div class="alert alert-danger">' + data.message + '</div>'); 
                }else{
                    $('.message_form').append('<div class="alert alert-success">' + data.message + '</div>');
                    
                }

            }
        });

    }
</script>