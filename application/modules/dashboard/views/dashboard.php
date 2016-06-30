<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<link href="<?php echo base_url(); ?>assets/js/plugins/timepicker/jquery.datetimepicker.css" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url('dashboard'); ?>">Home</a>
            </li>
            <li class="active">
                <strong><?php echo $title; ?></strong>
            </li>
        </ol>
    </div>
</div>
    
<div class="wrapper wrapper-content">
    <div class="row">

        <div class="col-md-12 animated fadeInRight">

            
        </div>
    </div>
</div> 

<?php include_once( APPPATH.'views/includes/footer.php' ); ?>

