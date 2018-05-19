<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2 class="tituloPaginaActual"><?php echo $action; ?></h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url("home"); ?> ">Inicio</a></li>
            <li><?php echo $module; ?></li>
            <li class="active"><strong><?php echo $action; ?></strong></li>
        </ol>
    </div>
    <div class="col-lg-2"></div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-md-7">
            <div class="ibox-title">
                <h5> Selección Habitación </h5>
            </div>

            <div class="ibox">
                <div class="ibox-content">
                    <form name="rent_form" id="rent_form" class="form-horizontal">

                        <input type="hidden" id="num_days" name="num_days" value="1"/>
                        <input type="hidden" id="price_rooms_days" name="price_rooms_days" value="0"/>

                        <div class="row no-margins">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-daterange input-group" id="datepicker">
                                        <input type="text" class="input-sm form-control" id="start_date"
                                               name="start_date"
                                               value="<?= date('d/m/Y', strtotime(date($min_date))) ?>"/>
                                        <span class="input-group-addon">a</span>
                                        <input type="text" class="input-sm form-control" id="end_date" name="end_date"
                                               value="<?= date('d/m/Y', strtotime(date($max_date))) ?>"/>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div id="room">

                            <?php
                            foreach (array_chunk($available_rooms, 8) as $rooms) { ?>

                                <div class="row no-margins">

                                    <?php foreach ($rooms as $room) {

                                        switch ($room->status) {
                                            case 1:
                                                $background = 'btn-white';
                                                break;
                                            case 2:
                                                $background = 'btn-primary';
                                                break;
                                            case 3:
                                                $background = 'btn-warning';
                                                break;
                                            case 4:
                                                $background = 'btn-danger';
                                                break;
                                            case 5:
                                                $background = 'btn-blue-sky';
                                                break;
                                            case 6:
                                                $background = 'btn-yellow';
                                                break;
                                            case 7:
                                                $background = 'btn-grey';
                                                break;
                                            case 8:
                                                $background = 'btn-pink';
                                                break;
                                        }
                                        ?>
                                        <div class="col-sm-room">
                                            <button idroom="<?= $room->idroom ?>" nroom="<?= $room->number?>" <?= ($room->status != 1 ? 'disabled' : '') ?>
                                                    type="button"
                                                    class="btn <?= $background ?> btn-xs btn-block"> <?php if($room->window){?>  <i class="fa fa-bookmark-o"></i>  <?php } ?> <?= $room->number . "<br>" . $room->abreviation; ?> </button>
                                        </div>
                                    <?php } ?>


                                </div>
                            <?php } ?>
                        </div>

                        <hr class="hr-line-solid">


                    </form>
                    Ocupado: <input type="radio" name="radio_estado" checked value=2>
                    Peligroso: <input type="radio" name="radio_estado" value=4>
                    Delegación: <input type="radio" name="radio_estado" value=5>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="ibox-title">
                <h5> Cliente </h5>
            </div>

            <div class="ibox">
                <div class="ibox-content">
                    
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-3 control-label campoObligatorio">Tipo de cliente</label>
                            <div class="col-sm-9">
                                <select name="sel_tipocliente" id="sel_tipocliente" class="form-control">
                                    <option value="persona" selected="selected">Persona</option>
                                    <option value="empresa">Empresa</option>
                                </select>
                            </div>    
                        </div>
                    </form>

                    <form name="formulario_persona" id="formulario_persona" class="form-horizontal">
                        
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label campoObligatorio">Buscar</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input id="buscar_persona" autocomplete="off" name="dni" type="text" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label campoObligatorio">
                                <small class="campoObligatorio">*</small>
                                Doc. Identidad</label>
                            <div class="col-sm-9">
                                <input name="per_dni" id="per_dni" type="text" class="form-control" value="">
                                <input name="per_dni_old" id="per_dni_old" type="hidden" class="form-control" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label campoObligatorio">
                                <small class="campoObligatorio">*</small>
                                Nombre</label>
                            <div class="col-sm-9">
                                <input name="per_nombres" id="per_nombres" type="text" class="form-control" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label campoObligatorio">
                                <small class="campoObligatorio">*</small>
                                Apellidos</label>
                            <div class="col-sm-9">
                                <input name="per_apellidos" id="per_apellidos" type="text" class="form-control" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label campoObligatorio">
                                Teléfono</label>
                            <div class="col-sm-9">
                                <input name="per_telefono" id="per_telefono" type="text" class="form-control" value="">
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label campoObligatorio">
                                Correo</label>
                            <div class="col-sm-9">
                                <input name="per_correo" type="text" class="form-control" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label campoObligatorio">
                                País</label>
                            <div class="col-sm-9">
                                <input name="per_pais" id="per_pais" type="text" class="form-control" value="">
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label campoObligatorio">
                                <small class="campoObligatorio">*</small>
                                Ciudad</label>
                            <div class="col-sm-9">
                                <input name="per_ciudad" id="per_ciudad" type="text" class="form-control" value="">
                            </div>
                        </div>

                    </form>


                    <form name="formulario_empresa" id="formulario_empresa" class="form-horizontal" hidden="true">
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label campoObligatorio">Buscar</label>

                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input name="buscar_empresa" id="buscar_empresa" autocomplete="off" type="text" class="form-control" value="">
                                </div>
                            </div>

                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label campoObligatorio">
                                <small class="campoObligatorio">*</small>
                                Nro. Documento</label>
                            <div class="col-sm-9">
                                <input name="emp_numerodoc" id="emp_numerodoc" type="text" class="form-control" value="">
                                <input name="emp_numerodoc_old" id="emp_numerodoc_old" type="hidden" class="form-control" value="">
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label campoObligatorio">
                                <small class="campoObligatorio">*</small>
                                Nombre</label>
                            <div class="col-sm-9">
                                <input name="emp_name" id="emp_name" type="text" class="form-control" value="">
                            </div>

                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label campoObligatorio">
                                <small class="campoObligatorio">*</small>
                                Dirección</label>
                            <div class="col-sm-9">
                                <input name="emp_direccion" id="emp_direccion" type="text" class="form-control" value="">
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label campoObligatorio">
                                <small class="campoObligatorio">*</small>
                                Teléfono</label>
                            <div class="col-sm-9">
                                <input name="emp_telefono" id="emp_telefono" type="text" class="form-control" value="">
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label campoObligatorio">
                                <small class="campoObligatorio">*</small>
                                Correo</label>
                            <div class="col-sm-9">
                                <input name="emp_mail"  id="emp_mail" type="text" class="form-control" value="">
                            </div>

                        </div>

                    </form>


                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="ibox-title">
                <h5> Servicios / Productos </h5>
            </div>
            <div class="ibox">
                <div class="ibox-content">
                    <div class="table-responsive">

                        <input type="hidden" id="lista_rooms">
                        <table id="tableitems" class="table table-striped">
                            <thead>
                            <tr>
                                <th>Item</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Habitación</th>
                                <th>Precio Unitario</th>
                                <th>Cantidad</th>
                                <th>Descuento</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            

                            </tbody>

                        </table>
                    </div>
                    <div>
                        <!-- <button id="v_button_article" class="btn btn-success btn-sm" type="button">
                            <span class="fa fa-search-plus"></span>
                            Buscar Artículos
                        </button> -->
                        Buscar artículo:
                        <input type="text" name="itemsearch" id="itemsearch" autocomplete="off">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">

            <div class="ibox-title">
                <h5> Pago </h5>
            </div>

            <div class="ibox">
                <div class="ibox-content">

                    <div class="row" id="total">
                        <div class="col-md-6 border-left-right">
                            <div class="text-left ">Total</div>
                            <h2 id="total_to_pay" class="text-center text-info bold">S/ 0.00</h2>
                            <input type="hidden" id="amount_to_pay">
                        </div>
                        <div class="col-md-6 border-right">
                            <div class="text-left ">Total a Pagar</div>
                            <h2 id="total_paid" class="text-center text-warning bold">S/ 0.00</h2>
                            <input type="hidden" id="amount_payed">
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="tablepayments" class="table table-striped">
                            <thead>
                            <tr>
                                <th>Tipo</th>
                                <th>Monto</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>

                        </table>
                    </div>

                    <div class="row" id="agregar_pago">
                        <div class="col-md-12">
                            <h5> Agregar Pago </h5>
                        </div>

                        <div class="col-md-12">
                            <a tabindex="-1" href="#" class="btn btn-pay select-payment active" data-payment="Efectivo" payment-type="1">Efectivo </a>
                            <a tabindex="-1" href="#" class="btn btn-pay select-payment " data-payment="Tarjeta de D&eacute;bito" payment-type="2">Tarjeta de Débito </a>
                            <a tabindex="-1" href="#" class="btn btn-pay select-payment " data-payment="Tarjeta de Cr&eacute;dito" payment-type="3">Tarjeta de Crédito </a>

                           <div class="input-group-addon">
                               <input type="text" name="pay_amount" id="pay_amount">
                               <button id="add_payment" class="btn btn-blue-sky">Agregar Pago</button>
                           </div>
                        </div>

                    </div>
                    
                </div>
            </div>
            
            

            

        </div>

        <div class="col-md-12 text-center">
            <div class="ibox-title">
                <button type="button" id="btn_grabar_venta" class="btn btn-warning show_btn_save" ng-click="saveSales()">
                    <span class="fa fa-save"></span>
                    Guardar
                </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <span class="fa fa-times"></span> Cerrar
                </button>
            </div>
        </div>
    </div>

    <div class="message_form"></div>

</div>
<!-- Modal -->
<?php require_once 'article.php'; ?>
<?php require_once 'customers.php'; ?>
<?php require_once 'customersForm.php'; ?>

<script type="text/javascript">

    $(document).ready(function () {

        $('.footable_c').footable({
            "filtering": {
                "placeholder": "Buscar",
                "dropdownTitle": "Buscar por"
            }
        });

    });




    $(document).ready(function () {

        var v_button_article = $("#v_button_article");
        var modalProduct = $("#modalProduct");
        var s_btn_open_client = $("#s_btn_open_client");
        var modalCustomers = $("#modalCustomers");
        var modalCustomersForm = $("#modalCustomersForm");
        var s_btn_add_client = $("#s_btn_add_client");

        v_button_article.click(function () {
            modalProduct.modal('show');
        });

        s_btn_open_client.click(function () {
            
            modalCustomers.modal('show');
        });

        s_btn_add_client.click(function () {
            
            modalCustomersForm.modal('show');
        });

        $('#start_date').datepicker({
            format: 'dd/mm/yyyy',
            language: 'es',
            firstDay: 1,
            startDate: new Date(),
            dayNames: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
            dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
            monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dec"],

           /* onSelect: function () {
                
                $.ajax({
                    type: 'post',
                    dataType: 'html',
                    url: '<?php echo base_url("rent/get_vailable_rooms");?>',
                    data: data,
                    success: function (data) {
                        $('#lista_convocados').html('<option value="" selected > Seleccione Lista </option>');
                        $('#lista_convocados').append(data);
                    }
                });

            }*/

        }).on("changeDate", function (e) {

            $.ajax({
                    type: 'post',
                    dataType: 'html',
                    url: '<?php echo base_url("rent/get_vailable_rooms");?>',
                    data: data,
                    success: function (data) {
                        $('#lista_convocados').html('<option value="" selected > Seleccione Lista </option>');
                        $('#lista_convocados').append(data);
                    }
                });
           
        });

        $('#end_date').datepicker({
            format: 'dd/mm/yyyy',
            language: 'es',
            firstDay: 1,
            startDate: new Date(),
            dayNames: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
            dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
            monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dec"],
            onSelect: function (dateText, inst) {
                $("#start_date").datepicker("option", "maxDate", $("#end_date").datepicker("getDate"));

                $.ajax({
                    type: 'post',
                    dataType: 'html',
                    url: '<?php echo base_url("admin/actividades/get_lista_tipo_actividad");?>',
                    data: data,
                    success: function (data) {
                        $('#lista_convocados').html('<option value="" selected > Seleccione Lista </option>');
                        $('#lista_convocados').append(data);
                    }
                });
            }
        });

    
    //mostrar mensaje:

    function showMessage(msg){

        $('.message_form').append(msg);

        setTimeout(function(){
            $('.message_form').html('');
        }, 4000);

    }


    //input de pago:

    $("body").on("keyup","#pay_amount",function(){
        monto = $(this).val();
        monto_a_pagar = $("#amount_payed").val();
        
        if(monto == monto_a_pagar){
            $("#add_payment").html("Completar Pago");
        }else{
            $("#add_payment").html("Agregar Pago"); 
        }

    });
    

    //Tabs de agregar pago:

    $("body").on("click","#agregar_pago a",function(e){
        e.preventDefault();
        $("#agregar_pago").find('a').removeClass('active');
        $(this).addClass('active');
    });


    // Botón agregar pago:

    $("body").on("click","#add_payment", function(){

        monto = $("#pay_amount").val();
        tipo_texto = $("#agregar_pago").find('a.active').attr("data-payment");
        tipo = $("#agregar_pago").find('a.active').attr("payment-type");;
        monto_a_pagar = $("#amount_payed").val();

        payment_date = new Date($.now());
        day = ("0" + payment_date.getUTCDate()).slice(-2);
        mes = ("0" + (payment_date.getUTCMonth() + 1)).slice(-2);
        year = payment_date.getUTCFullYear();

        fecha = day + "/" + mes + "/" + year;

        if( $("#amount_to_pay").val() == "" || $("#amount_to_pay").val() == 0){

            showMessage('<div class="alert alert-danger">No se puede agregar pago, ya que el monto a pagar es 0</div>');
             
        } else {

            if( monto_a_pagar == 0){

                showMessage('<div class="alert alert-danger">No se pueden agregar más pagos</div>');

            } else{

                html='<tr class="clone clonedInput">';
                html+='<td><input name="bulk_tipoPago[]" class="form-control input-sm" type="hidden" readonly="readonly" value="'+tipo+'">';
                html+='<input name="bulk_fechaPago[]" class="form-control input-sm" type="hidden" readonly="readonly" value="'+fecha+'">';
                html+='<input name="bulk_tipoPagoTexto[]" class="form-control input-sm" type="text" readonly="readonly" value="'+tipo_texto+'"></td>';
                html+='<td><input name="bulk_montoPago[]" class="form-control input-sm" type="text" readonly="readonly" value="'+monto+'"></td>';
                html+='<td><a href="#" class="remove btn btn-xs btn-danger remove_row_payment">-</a></td>';
                html+='</tr>';

                $("#tablepayments").find("tbody").append(html);

                update_prices();

            }
            
        }

    });
    
    // Formularios de Cliente:

    $("body").on("change","#sel_tipocliente",function(){

        selection = $(this).val();

        if(selection=="empresa"){
            $("#formulario_empresa").removeAttr("hidden");
            $("#formulario_persona").attr("hidden","true");
        }else{
            $("#formulario_persona").removeAttr("hidden");
            $("#formulario_empresa").attr("hidden","true");
        }

    });

    function validate_room_available(idroom,mindate,maxdate){

        
        
    }


    function setrooms(){

        var lista_rooms = '';
        var comodin = '';

        $('#tableitems tr').each(function (index, value) {

            item_type = $(this).find("input[name='bulk_tipoRegistro[]']").val();
            room_item = $(this).find("input[name='bulk_roomNumber[]']").val();

            if( room_item != '' && room_item != null && item_type=='room' ){
                lista_rooms += comodin + room_item; 
                comodin = ',';
            }
                    
        });

        $("#lista_rooms").val(lista_rooms);

    }


    function updaterow(){

        $(this).parents('.clonedInput').find("[name='bulk_quantityOrdered[]']").val(diffDays);
        $(this).parents('.clonedInput').find("[name='bulk_orderLineNumber[]']").val(diffDays * price - dscto );

        update_prices();
    }

    // verificar si hubo actualización en la fecha fin de un registro de room
    $("body").on("focusin",".input_date",function(){

        var valor_actual = $(this).val();
        var valor_fecha_inicial = $(this).parents('.clonedInput').find("[name='bulk_fecha_inicio[]']").val();

        var fecha_inicio = moment( valor_fecha_inicial , 'D/M/YYYY');

        var fecha_fin = moment(valor_actual, 'D/M/YYYY');
        var diffDays = fecha_fin.diff(fecha_inicio, 'days') + 1;
        var price = $(this).parents('.clonedInput').find("[name='bulk_productCode[]']").val();
        var dscto = $(this).parents('.clonedInput').find("[name='bulk_priceEach[]']").val();
        var idroom = $(this).parents('.clonedInput').find("[name='bulk_idRoom[]']").val();


        var data = {
            'idroom': idroom,
            'mindate': valor_fecha_inicial,
            'maxdate': valor_actual
        };


        $.ajax({
                type: 'post',
                dataType: 'json',
                url: '<?php echo base_url("room/validate_room_available");?>',
                data: data,
                success: function (data) {

                    if(data.ok){

                        
                        $(this).parents('.clonedInput').find("[name='bulk_quantityOrdered[]']").val(diffDays);
                        $(this).parents('.clonedInput').find("[name='bulk_orderLineNumber[]']").val(diffDays * price - dscto );
                        update_prices();

                    }

                }
            });

        /*$(this).parents('.clonedInput').find("[name='bulk_quantityOrdered[]']").val(diffDays);
        $(this).parents('.clonedInput').find("[name='bulk_orderLineNumber[]']").val(diffDays * price - dscto );

        update_prices();*/
    });
    

    // Seleccionar habitación: 

    $("body").on("click",".col-sm-room", function (e){

        //Se obtiene el idroom, número de habitación y el estado:
        idroom = $(this).find("button").attr("idroom");
        nroom = $(this).find("button").attr("nroom");
        estado = $("input[name='radio_estado']:checked").val();
        tipo = "room";      

        //Se deshabilita la habitación:
        $(this).find("button").attr("disabled","disabled");

      
        //Se modifica la sección de Pago
        var start_date = moment($('#start_date').val(), 'D/M/YYYY');
        var end_date = moment($('#end_date').val(), 'D/M/YYYY');
        var diffDays = end_date.diff(start_date, 'days') + 1;

        var data = {
            'idroom': idroom,
            'diffDays': diffDays,
        };


        $.ajax({
            type: 'post',
            dataType: 'json',
            url: '<?php echo base_url("room/get_price_days");?>',
            data: data,
            success: function (data) {
                
                if (data.ok) {

                 html='<tr class="clone clonedInput">';
                 html+='<td><input  name="bulk_tipoRegistro[]" class="form-control input-sm" type="hidden" value="'+tipo+'">';
                 html+='<input  name="bulk_EstadoRegistro[]" class="form-control input-sm" type="hidden" value="'+estado+'">';
                 html+='<input  name="bulk_idRoom[]" class="form-control input-sm" type="hidden" value="'+idroom+'">';
                 html+='<input type="text" name="bulk_orderDetailId[]" class="form-control input-sm" readonly="readonly" value="'+nroom+'"></td>';
                 html+='<td><input  name="bulk_fecha_inicio[]" class="form-control input-sm" readonly="readonly" value="'+$('#start_date').val()+'"></td>';
                 html+='<td><input  name="bulk_fecha_fin[]" class="form-control input-sm input_date" value="'+$('#end_date').val()+'"></td>';
                 html+='<td><input type="text" name="bulk_roomNumber[]" class="form-control input-sm inputroomnumber" readonly="readonly" value="'+nroom+'"></td>';
                 html+='<td><input type="text" name="bulk_productCode[]" class="form-control input-sm" readonly="readonly" value="'+data.precio+'"></td>';
                 html+='<td><input type="text" name="bulk_quantityOrdered[]" class="form-control input-sm inputcant" readonly="readonly" value="'+data.dias+'"></td>';
                 html+='<td><input type="text" name="bulk_priceEach[]" class="form-control input-sm inputdscto" value="0"></td>';
                 html+='<td><input type="text" name="bulk_orderLineNumber[]" class="form-control input-sm" readonly="readonly" value="'+data.total+'"></td>';
                 html+='<td><a href="#" class="remove btn btn-xs btn-danger remove_row">-</a><input type="hidden" name="counter[]"></td>';
                 html+='</tr>';

                 $("#tableitems").find("tbody").append(html);
                 update_prices();
                 
                 $('.input_date').datepicker({

                                format: 'dd/mm/yyyy',
                                language: 'es',
                                firstDay: 1,
                                minDate: 0,
                                startDate: new Date(),
                                dayNames: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
                                dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                                monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                                monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dec"]
                            });

                 //agregamos nro de room a campo hidden:
                 setrooms();

                }
            }
        });


        
    
    });

    
    //input de roomid:

    $("body").on("focusout",".inputroomnumber",function(){

        room_number = $(this).val();
        rooms = $("#lista_rooms").val().split(',');
        cont = 0;

        for (i = 0; i < rooms.length; i++) { 
            if( rooms[i] == room_number){
                cont++;
            }
        }

        if(cont == 0){
            $(this).val('');
            showMessage('<div class="alert alert-danger">Habitación no válida, debe agregarla a la lista primero</div>');
        }

    });

    
    //input de descuentos:

    $("body").on("keyup",".inputdscto",function(){

        dscto = $(this).val();

        if(dscto == null || dscto == ''){
            dscto = 0;
            $(this).val(0);
        }

        precio_unitario = $(this).parents(".clonedInput").find("td").find("input[name='bulk_productCode[]']").val();
        cantidad = $(this).parents(".clonedInput").find("td").find("input[name='bulk_quantityOrdered[]']").val();
        total = precio_unitario * cantidad;

        $(this).parents(".clonedInput").find("td").find("input[name='bulk_orderLineNumber[]']").val(total-dscto);

        update_prices();
        
    });

    //input de cantidades:

    $("body").on("keyup",".inputcant",function(){

        cant = $(this).val();

        if(cant == null || cant == ''){
            cant = 1;
            $(this).val(1);
        }

        precio_unitario = $(this).parents(".clonedInput").find("td").find("input[name='bulk_productCode[]']").val();
        cantidad = $(this).parents(".clonedInput").find("td").find("input[name='bulk_quantityOrdered[]']").val();
        dscto = $(this).parents(".clonedInput").find("td").find("input[name='bulk_priceEach[]']").val();
        total = precio_unitario * cantidad;

        $(this).parents(".clonedInput").find("td").find("input[name='bulk_orderLineNumber[]']").val(total-dscto);
        
        update_prices();


    });
    

    //botón de eliminar row de pagos:

    $("body").on("click",".remove_row_payment",function(e){
        e.preventDefault();
        $(this).parents(".clonedInput").remove();
        update_prices();
    });

    //botón de eliminar row de servicios/productos:

    $("body").on("click",".remove_row",function(e){
        e.preventDefault();
        $(this).parents(".clonedInput").remove();
        numero_habitacion = $(this).parents(".clonedInput").find("td").find("input[name='bulk_orderDetailId[]']").val(); 
        
        $("#room .col-sm-room").find("button[nroom='"+numero_habitacion+"']").removeAttr("disabled");

        update_prices();
        setrooms();
        
    });


    //función que actualiza precios en la sección de Pago:
    
    function update_prices(){

        total = pagostotal = parseFloat(0);

        $('#tableitems tr').each(function (index, value) { 
           subtotal =  $(this).find("td").find("input[name='bulk_orderLineNumber[]']").val();
           if(subtotal == null){
            subtotal = parseFloat(0);
           }
           total += parseFloat(subtotal);
        });

        $('#tablepayments tr').each(function (index, value) {
            subpagos = $(this).find("td").find("input[name='bulk_montoPago[]']").val();
            if(subpagos == null){
                subpagos = parseFloat(0);
               }
            pagostotal += parseFloat(subpagos);
        }); 

        porpagar = total-pagostotal;

        $('#total_to_pay').html('S/ ' + total);
        $('#amount_to_pay').val(total);
        $('#total_paid').html('S/' + porpagar);
        $('#amount_payed').val(porpagar);
        
    }


    // Búsqueda de Personas:

    $("#buscar_persona").typeahead({
        minLength: 2,
        hint:true,
        items: 5,

        source: function (query, result) {

        $.ajax({
            type: 'post',
            dataType: 'json',
            url: '<?php echo base_url("customer/get_persons");?>',
            data: {query: query},
            success: function (data) {
                result(data);
            } 
        });

        },

        updater: function(selection){
            
            $("#per_nombres").val(selection.first_name);
            $("#per_apellidos").val(selection.last_name);
            $("#per_ciudad").val(selection.city);
            $("#per_dni").val(selection.document_number);
            $("#per_dni_old").val(selection.document_number);       

        },
        
        displayText: function(item){ return item.document_number;}

        });


    //Búsqueda de Empresas:

    $("#buscar_empresa").typeahead({
        minLength: 2,
        hint:true,
        items: 5,

        source: function (query, result) {

        $.ajax({
            type: 'post',
            dataType: 'json',
            url: '<?php echo base_url("customer/get_companies");?>',
            data: {query: query},
            success: function (data) {
                result(data);
            } 
        });

        },

        updater: function(selection){
            

            $("#emp_direccion").val(selection.address);
            $("#emp_numerodoc").val(selection.company_number);
            $("#emp_numerodoc_old").val(selection.company_number);
            $("#emp_name").val(selection.company_name);
            $("#emp_telefono").val(selection.phone);
            $("#emp_mail").val(selection.email);       

        },
        
        displayText: function(item){ return item.company_number;}

        });


    //Búsqueda de items:

    $("#itemsearch").typeahead({
        minLength: 2,
        hint:true,
        items: 5,

        source: function (query, result) {

        $.ajax({
            type: 'post',
            dataType: 'json',
            url: '<?php echo base_url("item/get_all_items");?>',
            data: {query: query},
            success: function (data) {
                result(data);
            } 
        });

        },
        
        updater: function(selection){

        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();

        html='<tr class="clone clonedInput">';
        html+='<td><input name="bulk_tipoRegistro[]" class="form-control input-sm" type="hidden" value="item">';
        html+='<input  name="bulk_EstadoRegistro[]" class="form-control input-sm" type="hidden" value="">';
        html+='<input  name="bulk_idRoom[]" class="form-control input-sm" type="hidden" value="'+selection.iditem+'">';
        html+='<input type="text" name="bulk_orderDetailId[]" class="form-control input-sm" readonly="readonly" value="'+selection.item_name+'"></td>';
        html+='<td><input  name="bulk_fecha_inicio[]" class="form-control input-sm" readonly="readonly" value="" ></td>';
        html+='<td><input  name="bulk_fecha_fin[]" class="form-control input-sm" readonly="readonly" value=""></td>';
        html+='<td><input type="text" name="bulk_roomNumber[]" class="form-control input-sm inputroomnumber inputroomnumberitem"  value=""></td>';
        html+='<td><input type="text" name="bulk_productCode[]" class="form-control input-sm" readonly="readonly" value="'+selection.unit_price+'"></td>';
        html+='<td><input type="text" name="bulk_quantityOrdered[]" class="form-control input-sm inputcant" value="1"></td>';
        html+='<td><input type="text" name="bulk_priceEach[]" class="form-control input-sm inputdscto" value="0"></td>';
        html+='<td><input type="text" name="bulk_orderLineNumber[]" class="form-control input-sm" readonly="readonly" value="'+selection.unit_price+'"></td>';
        html+='<td><a href="#" class="remove btn btn-xs btn-danger remove_row">-</a><input type="hidden" name="counter[]"></td>';
        html+='</tr>';

        $("#tableitems").find("tbody").append(html);
        update_prices();

        },
        
        displayText: function(item){ return item.item_name;}

    });



    //Función para grabar los pagos
    function save_payments(sale_id){

        var sale_id = sale_id;
        //Grabamos los pagos que se han hecho
        var data_payment = {
            'id_sale'  : sale_id,
            'payment_type'  : $("[name='bulk_tipoPago[]']").serialize(),
            'payment_amount'  : $("[name='bulk_montoPago[]']").serialize(),
            'payment_date'  : $("[name='bulk_fechaPago[]']").serialize()
        };

        if(data_payment.payment_type != null && data_payment.payment_type != "" ){
            
            $.ajax({
                type:"post",
                url: '<?php echo site_url("rent/save_sale_payment/") ?>',
                data:data_payment,
                dataType: 'json',
                success: function (data) {

                    if (!data.ok){
                    showMessage('<div class="alert alert-danger">' + data.message + '</div>'); 
                    } else {
                        showMessage('<div class="alert alert-success">Registro grabado</div>');

                        setTimeout(function(){
                            window.location = "<?php  echo site_url('rent/edit/"+sale_id+"'); ?>";
                        }, 1000);
                    }

                }
            });
        } 
    }


    //Botón de grabar venta:

    $("body").on("click","#btn_grabar_venta",function(){

        
        $('.message_form').empty();  

        //obtenermos datos del cliente:
        var customer_type = $("#sel_tipocliente").val();
        var docnumber;

        if(customer_type=="persona"){

            docnumber = $('#per_dni').val();

            var data = {
                'customer'  : customer_type,
                'dni'       : $('#per_dni').val(),
                'dni_old'   : $('#per_dni_old').val(),
                'firstname' : $('#per_nombres').val(),
                'lastname'  : $('#per_apellidos').val(),
                'phone'     : $('#per_telefono').val(),
                'email'     : $('#per_correo').val(),
                'country'   : $('#per_pais').val(),
                'city'      : $('#per_ciudad').val()
            };

        } else if(customer_type=="empresa"){

            docnumber = $('#emp_numerodoc').val();

            var data = {
                'customer'  : customer_type,
                'company_document'  : $('#emp_numerodoc').val(),
                'company_document_old'  : $('#emp_numerodoc_old').val(),
                'company_name'           : $('#emp_name').val(),
                'address'           : $('#emp_direccion').val(),
                'phone'             : $('#emp_telefono').val(),
                'email'             : $('#emp_mail').val()
            };          

        }


        //Grabamos datos del cliente
        $.ajax({
            type:"post",
            url: '<?php echo site_url("customer/save/") ?>',
            data:data,
            dataType: 'json',
            success: function (data) {

                if (!data.ok){
                    $('.message_form').append('<div class="alert alert-danger">' + data.message + '</div>'); 
                } else {


                //Grabamos datos de la venta
                var data_venta = {
                    'tipo_registro'     : $("[name='bulk_tipoRegistro[]']").serialize(),
                    'estado_registro'   : $("[name='bulk_EstadoRegistro[]']").serialize(),
                    'nombre'            : $("[name='bulk_orderDetailId[]']").serialize(),
                    'idroom'            : $("[name='bulk_idRoom[]']").serialize(),
                    'room'              : $("[name='bulk_roomNumber[]']").serialize(),
                    'precio_unitario'   : $("[name='bulk_productCode[]']").serialize(),
                    'cantidad'          : $("[name='bulk_quantityOrdered[]']").serialize(),
                    'descuento'         : $("[name='bulk_priceEach[]']").serialize(),
                    'total'             : $("[name='bulk_orderLineNumber[]']").serialize(),
                    'nro_doc'           : docnumber,
                    'customer_type'     : customer_type,
                    'amount_to_pay'     : $('#amount_to_pay').val(),
                    'amount_payed'      : $('#amount_payed').val(),
                    'fecha_ini'         : $("[name='bulk_fecha_inicio[]']").serialize(), 
                    'fecha_fin'         : $("[name='bulk_fecha_fin[]']").serialize()
                };   

                $.ajax({
                    type:"post",
                    url: '<?php echo site_url("rent/save/") ?>',
                    data:data_venta,
                    dataType: 'json',
                    success: function (data) {

                        if (!data.ok){
                            
                            showMessage('<div class="alert alert-danger">' + data.message + '</div>');
                            
                        } else {
                            
                            //Grabamos los pagos que se han hecho
                            save_payments(data.sale_id);    
                        }
                    }
                });

                }

            }
        });


    });



    });
</script> 

