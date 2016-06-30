<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $title; ?> | HRMS+</title>


    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet"> 
    <link href="<?php echo base_url(); ?>assets/css/plugins/chosen/chosen.css" rel="stylesheet">

    <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js"></script>

    <!-- Morris -->
    <link href="<?php echo base_url(); ?>assets/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?php echo base_url(); ?>assets/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <!-- Full Calendar -->
    <link href="<?php echo base_url(); ?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/plugins/fullcalendar/fullcalendar.print.css" rel='stylesheet' media='print'>

    <!-- Date Picker -->
    <link href="<?php echo base_url(); ?>assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- Data Tables -->
    <link href="<?php echo base_url(); ?>assets/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">  

</head>

<body class="skin-3">
    <div id="wrapper">
    <?php require_once('sidebar.php')?>
    <?php require_once('header-pannel.php')?>