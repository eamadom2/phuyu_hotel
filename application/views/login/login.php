<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hotel Sudamérica| Login</title>

    <link href="<?php echo base_url();?>assets/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/assets/css/style.css" rel="stylesheet">
    
    <!-- Mainly scripts -->
    <script src="<?php echo base_url();?>assets/assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url();?>assets/assets/js/bootstrap.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url();?>assets/assets/js/inspinia.js"></script>
    <script src="<?php echo base_url();?>assets/assets/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?php echo base_url();?>assets/assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>
    

</head>

<body class="white-bg">
    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div >
            <div class="logo-name">
                <img src="<?php echo base_url();?>assets/assets/img/logo_hotel.png" />
            </div>
            
            <h3>Bienvenido al sistema del Suites Hotel Sudamérica</h3>   
            <p>Ingrese su usuario y contraseña</p>
            
            <?php if (validation_errors()) {?>
                <div class="alert alert-danger">
                    <strong> Error </strong>
                    <?php echo validation_errors(); ?>
                </div>
            <?php } ?>
            
            <?php echo form_open('login','class="m-t" id="loginform"'); ?>
                <div class="form-group">
                    <input id="usuario" name="username" type="text" class="form-control" placeholder="Usuario" required="">
                </div>
                <div class="form-group">
                    <input id="password" name="password" type="password" autocomplete="off" class="form-control" placeholder="Contraseña" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Ingresar</button>
 
            <?php echo form_close(); ?>
            
        </div>
    </div>


</body>

</html>



 
    


