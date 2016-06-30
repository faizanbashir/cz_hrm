<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-md-9">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?></h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('employees/hr'); ?>">Home</a></li>
            <li><a href="<?php echo base_url('employees/performance_report'); ?>">Employee Performance</a></li>
            <li class="active"><strong><?php echo $title; ?></strong></li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-md-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
               
                <div class="ibox-title">
                    <h5>Upload Performance Report <small> Here you can upload an employee performance report</small></h5>
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
                    
                    <form action="<?php echo base_url('employees/performance_report/add_report'); ?>" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                         <div class="row">
                                <div class="col-md-6-offset-4">                           
                                    
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Select Employee </label> 
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
                                        <label class="col-md-4 control-label">Submitted By </label> 
                                        <div class="col-md-6">
                                            <select data-placeholder="Select..." class="chosen-select form-control" name="submitted_by" id="submitted_by" required>
                                                <option value="">Select </option> 
                                                <?php foreach($employees as $employee): ?>
                                                <option value="<?php echo $employee['id']; ?>" ><?php echo $employee['first_name'].' '.$employee['last_name'].' ('.$employee['designation'].')'; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Submitted On: </label>
                                        <div class="input-daterange input-group col-md-6">
                                            <input type="text" class="input-sm form-control" name="submitted_on" id="submitted_on" required/>
                                        </div>
                                    </div> 
                                                              
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Upload Report</label>
                                        <div class="col-md-6"> 
                                            <input type="file" class="fileinput" name="report" accept="application/pdf" title="Click to upload Report" required/>
                                        </div>
                                    </div>  
      
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"></label>
                                        <div class="col-md-5">
                                            <input type="submit" class="btn btn-primary m-b pull-right dim" value="UPLOAD" id="submit">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
          
        </div>
    </div>
</div>




<?php include_once( APPPATH.'views/includes/footer.php' ); ?>