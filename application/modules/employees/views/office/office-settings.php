<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<link href="<?php echo base_url(); ?>assets/js/plugins/timepicker/jquery.datetimepicker.css" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-md-9">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?>
        <a href="<?php echo base_url('employees/office/history'); ?>" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> History</a>
        </h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('employees/hr'); ?>">Home</a></li>
            <li class="active"><strong><?php echo $title; ?></strong></li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-md-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
               
                <div class="ibox-title">
                    <h5>Edit Settings <small> Here you can edit office settings.</small></h5>
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
                    
                    <form action="<?php echo base_url('employees/office/update_office_settings/'.$office['id']);?>" class="form-horizontal" role="form" method="post">

                        <div class="form-group">
                            <label class="col-md-3 control-label">Office Weekends </label>
                            <div class="col-md-5">
                                <select data-placeholder="Select Weekends..." class="chosen-select col-lg-12" multiple tabindex="4" name="weekends[]" id="weekends" required>
                                    <option value="1">Monday</option>
                                    <option value="2">Tuesday</option>
                                    <option value="3">Wednesday</option>
                                    <option value="4">Thursday</option>
                                    <option value="5">Friday</option>
                                    <option value="6">Saturday</option>
                                    <option value="7">Sunday</option>   
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Office Timein </label>
                            <div class="col-md-5">
                                <input class="form-control timepicker required " type="text" id="timing_from" name= "timing_from" value="<?php echo $office['timing_from'];?>" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Office Timeout </label>
                            <div class="col-md-5">
                                <input class="form-control timepicker required " type="text" id="timing_to" name= "timing_to" value="<?php echo $office['timing_to'];?>" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Applicable From: </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="applicable_from" 
                                id="datetimepicker" value="<?php echo date('M y', strtotime($office['applicable_from']));?>" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10">
                                <input type="submit" class="btn btn-primary m-b pull-right dim" value="UPDATE SETTINGS" id="submit">
                            </div>
                        </div>

                  </form>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/js/plugins/timepicker/jquery.datetimepicker.full.js"></script>

<script type="text/javascript">
 
    $.datetimepicker.setLocale('en');
    var date = new Date();
    date.setDate(date.getDate());

   $('#datetimepicker').datetimepicker({
        timepicker: false,
        format: 'M y'
    });

   $('.timepicker').datetimepicker({
        datepicker:false,
        format:'H:i',
        step:5
    });

    var weekends   =   [<?php echo $office['weekends']; ?>];
    $('#weekends').val(weekends);
    
</script>


<?php include_once( APPPATH.'views/includes/footer.php' ); ?>