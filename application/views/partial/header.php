<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $titulo?></title>
    
    <link href="<?php echo base_url();?>assets/assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    
    <link href="<?php echo base_url();?>assets/assets/css/plugins/datetimepicker/bootstrap-datetimepicker.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    
    <link href="<?php echo base_url();?>assets/assets/css/plugins/awesome-bootstrap-chosen/awesome-bootstrap-checkbox.css" rel="stylesheet">

    
    <link href="<?php echo base_url();?>assets/assets/css/plugins/dualListBox/bootstrap-duallistbox.min.css" rel="stylesheet">
    
    <link href="<?php echo base_url();?>assets/assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/assets/css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
    
    <link href="<?php echo base_url();?>assets/assets/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/assets/css/plugins/select2/select2.min.css" rel="stylesheet">
    
    <link href="<?php echo base_url();?>assets/assets/css/plugins/footable/footable.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    
    
    <link href="<?php echo base_url();?>assets/assets/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
    
    <!-- Toastr style -->
    <link href="<?php echo base_url();?>assets/assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- iCheck style -->
    <script src="<?php echo base_url();?>assets/assets/css/plugins/iCheck/custom.css"></script>
    
    <!-- Gritter -->
    <link href="<?php echo base_url();?>assets/assets/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    
     <!-- Data picker -->
    
    <link href="<?php echo base_url();?>assets/assets/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">

  
    <link href="<?php echo base_url();?>assets/assets/css/plugins/jQueryUI/jquery-ui-1.10.4.custom.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/assets/css/plugins/jqGrid/ui.jqgrid.css" rel="stylesheet">
 
    <link href="<?php echo base_url();?>assets/assets/css/plugins/steps/jquery.steps.css" rel="stylesheet">
    
    <link href="<?php echo base_url();?>assets/assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/assets/css/style.css" rel="stylesheet">
        
</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> 
                            <span>
                                <img alt="image" class="img-circle" src="<?php echo base_url();?>assets/assets/img/user.jpg"/>
                            </span>
                            
                            <span class="clear"> 
                                <span class="block m-t-xs"> <strong class="font-bold"><?= $user_info_logged_in->name ?></strong></span> 
                            </span>
                            
                        </div>
                        <div class="logo-element">
                            SHS
                        </div>
                    </li>
                    
                    <li >
                        <a href="<?php echo base_url("/dashboard");?>"> <i class="fa fa-home"></i> <span class="nav-label">Dashboard</span> </a>
                    </li>
                    
                    <?php foreach($enable_modules as $module) { ?>   
                            <li>      
                                <a href="<?php echo base_url("/".$module->route);?>"> <i class="fa <?= $module->icon; ?>"></i> <span class="nav-label"><?= $module->name ?></span></a>       
                            </li>
                    <?php } ?>               
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg <?php if($dashboard){ ?> dashbard-1 <?php }?>">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Bienvenido al Sistema de Gestión de Hoteles</span>
                        </li>

                        <li>
                            <a href="<?php echo site_url('login/logout') ?>">
                                <i class="fa fa-sign-out"></i> Salir
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>

    
    
    
    <!-- Mainly scripts -->
    <script src="<?php echo base_url();?>assets/assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url();?>assets/assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>


     <!-- Moment -->
    
    <script src="<?php echo base_url();?>assets/assets/js/plugins/moment/moment-with-locales.js"></script>
    


    <!-- Dual Listbox -->
    <script src="<?php echo base_url();?>assets/assets/js/plugins/dualListBox/jquery.bootstrap-duallistbox.js"></script>
    
    <!-- Chosen -->
    <script src="<?php echo base_url();?>assets/assets/js/plugins/chosen/chosen.jquery.js"></script>

    <!-- Typehead -->
    <script src="<?php echo base_url();?>assets/assets/js/plugins/typehead/bootstrap3-typeahead.min.js"></script>
    
    
    
    <!-- Data picker -->
    <script src="<?php echo base_url();?>assets/assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url();?>assets/assets/js/plugins/datapicker/bootstrap-datepicker.min.js"></script>
    
   
    <!-- Datarange picker -->
    <script src="<?php echo base_url();?>assets/assets/js/plugins/daterangepicker/daterangepicker.js"></script>
    
   
    
    <!-- MENU -->
    <script src="<?php echo base_url();?>assets/assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    

    <!-- Clock picker -->
    <script src="<?php echo base_url();?>assets/assets/js/plugins/clockpicker/clockpicker.js"></script>

    <!-- Select2 -->
    <script src="<?php echo base_url();?>assets/assets/js/plugins/select2/select2.full.min.js"></script>

    <!-- FooTable -->
    <script src="<?php echo base_url();?>assets/assets/js/plugins/footable/footable.min.js"></script>
    
    <!-- DataTable -->
    <script src="<?php echo base_url();?>assets/assets/js/plugins/dataTables/datatables.min.js"></script>

    <!-- Flot -->
    <script src="<?php echo base_url();?>assets/assets/js/plugins/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url();?>assets/assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo base_url();?>assets/assets/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="<?php echo base_url();?>assets/assets/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url();?>assets/assets/js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="<?php echo base_url();?>assets/assets/js/plugins/peity/jquery.peity.min.js"></script>

    <!-- GITTER -->
    <script src="<?php echo base_url();?>assets/assets/js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="<?php echo base_url();?>assets/assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- ChartJS-->
    <script src="<?php echo base_url();?>assets/assets/js/plugins/chartJs/Chart.min.js"></script>

    <!-- Toastr -->
    <script src="<?php echo base_url();?>assets/assets/js/plugins/toastr/toastr.min.js"></script>
    
    <!-- iCheck -->
    <script src="<?php echo base_url();?>assets/assets/js/plugins/iCheck/icheck.min.js"></script>

    <!-- Jasny -->
    <script src="<?php echo base_url();?>assets/assets/js/plugins/jasny/jasny-bootstrap.min.js"></script>
    
    <!-- jqGrid -->
   
    <script src="<?php echo base_url();?>assets/assets/js/plugins/jqGrid/i18n/grid.locale-es.js"></script>
    <script src="<?php echo base_url();?>assets/assets/js/plugins/jqGrid/jquery.jqGrid.min.js"></script>
    
    <!-- Steps -->
    <script src="<?php echo base_url();?>assets/assets/js/plugins/steps/jquery.steps.min.js"></script>

    <!-- Jquery Validate -->
    <script src="<?php echo base_url();?>assets/assets/js/plugins/validate/jquery.validate.min.js"></script>
    
    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url();?>assets/assets/js/inspinia.js"></script>
    <script src="<?php echo base_url();?>assets/assets/js/plugins/pace/pace.min.js"></script>
    
    