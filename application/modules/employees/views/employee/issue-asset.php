<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<link href="<?php echo base_url(); ?>assets/js/plugins/timepicker/jquery.datetimepicker.css" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-md-9">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?>
        </h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('employees/hr'); ?>">Home</a></li>
            <li><a href="<?php echo base_url('employees/employee/assets'); ?>">Issued Assets</a></li>
            <li class="active"><strong><?php echo $title; ?></strong></li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
     <div class="row">
        <div class="col-md-12"> 
            <a href="<?php echo base_url('employees/employee'); ?>" class="btn btn-white m-b dim">Employees</a>
            <a href="<?php echo base_url('employees/designations'); ?>" class="btn btn-white m-b dim">Designations</a>
            <a href="<?php echo base_url('employees/assets'); ?>" class="btn btn-danger m-b dim">Assets</a>
        </div>       
    </div>
    <div class="row">
        <div class="col-md-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
               
                <div class="ibox-title">
                    <h5><?php if(isset($asset['id'])) echo "Edit Assets" ; else echo "Issue Assets" ?> <small> <?php if(isset($asset['id'])) echo "Here you can edit asset."; else echo "Here you can issue asset"; ?> </small></h5>
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
                    
                    <form action="<?php if(isset($asset['id'])) echo base_url('employees/assets/edit/'.$asset['id']); else echo base_url('employees/assets/issue_asset'); ?>" class="form-horizontal" role="form" method="post">
                       

                        <div class="form-group">
                            <label class="col-md-4 control-label">Employee </label> 
                            <div class="col-md-6">
                                <select data-placeholder="Select Employee..." class="chosen-select form-control" name="employee_id" id="employee_id" required>
                                    <option value="">Select Employee</option> 
                                    <?php foreach($employees as $employee): ?>
                                        <option value="<?php echo $employee['id']; ?>" ><?php echo $employee['first_name'].' '.$employee['last_name'].' ('.$employee['designation'].')'; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Asset Name </label>
                            <div class="col-md-6">
                                <input class="form-control " type="text" id="asset_name" name= "asset_name" value="<?php if(isset($asset['id'])) echo $asset['asset_name']; ?>" >
                            </div>
                        </div> 
                    
                        <div class="form-group">
                            <label class="col-md-4 control-label">Asset Description </label> 
                            <div class="col-md-6">
                                <textarea class="form-control" type="text" name="description" id="description" rows="5"><?php if(isset($asset['id'])) echo $asset['description']; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-4 control-label">Issued-on </label>
                            <div class="input-group col-lg-6">
                                <input type="text" class=" date-picker-disable-future-dates input-sm form-control" name="issued_on" id="issued_on"  value="<?php if(isset($asset['id'])) echo date('jS-M-Y', strtotime($asset['asset_name'])); ?>" required/>
                                
                            </div>
                        </div> 

                        <div class="form-group">
                            <div class="col-md-10">
                                <input type="submit" class="btn btn-primary m-b pull-right dim" value="<?php if(isset($asset['id'])) echo "SAVE CHANGES"; else echo "ISSUE"; ?>" id="submit">
                            </div>
                        </div>

                  </form>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/js/plugins/timepicker/jquery.datetimepicker.full.js"></script>

<script type="text/javascript">
    $('.timepicker').datetimepicker({
        datepicker:false,
        format:'H:i',
        step:5
    });
</script>

<?php if(isset($asset['id'])): ?>
<script language="javascript">
        
    var employees   =   [<?php echo $asset['employee_id']; ?>];
    $('#employee_id').val(employees);

</script>  
<?php endif; ?>

<?php include_once( APPPATH.'views/includes/footer.php' ); ?>