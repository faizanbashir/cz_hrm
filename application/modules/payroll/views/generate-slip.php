<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<link href="<?php echo base_url(); ?>assets/js/plugins/timepicker/jquery.datetimepicker.css" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?></h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('employees/hr'); ?>">Home</a></li>
            <li class="active"><strong><?php echo $title; ?></strong></li>
        </ol>
    </div>
</div>
 
<div class="wrapper wrapper-content">

    <div class="row">
        <div class="col-lg-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Generate Pay Slip <small>Here you can generate employees salary slips.</small></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div id="warning"></div>
                    <?php echo $this->session->flashdata('notification');?> 

                    <form action="<?php echo base_url('payroll/payroll/generate');?>" class="form-horizontal" role="form" method="post">
                    <?php if($this->session->userdata['designation'] == 'Admin'): ?> 
                        <div class="form-group">
                            <label class="col-md-4 control-label">Select Employee </label>
                            <div class="col-md-4">
                                <select title="Select Employee..." class="select col-md-12" name="employee" id="employee">
                                    <option value=""></option>
                                    <?php 
                                        foreach($employees as $employee): 
                                    ?>
                                    <option value="<?php echo $employee['id']; ?>"><?php echo $employee['first_name'].' '.$employee['last_name'].' ('.$employee['designation'].')'; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    <?php endif; ?>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Select Month-Year: </label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="date" 
                                id="date" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                                <input type="submit" class="btn btn-primary m-b pull-right dim" value="CONTINUE" id="submit">
                                <span></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  

<script src="<?php echo base_url(); ?>assets/js/plugins/timepicker/jquery.datetimepicker.full.js"></script>
<script type="text/javascript"> 

    $('#date').datetimepicker({
        timepicker: false,
        format: 'M y'
    });

</script>

<?php include_once( APPPATH.'views/includes/footer.php' ); ?>

