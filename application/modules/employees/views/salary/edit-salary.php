<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<link href="<?php echo base_url(); ?>assets/css/plugins/steps/jquery.steps.css" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-md-11">
        <h2>
          <i class="<?php echo $icon; ?>"></i> <?php echo $title; ?>
        </h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('employees/hr'); ?>">Home</a></li>
            <li><a href="<?php echo base_url('employees/salary'); ?>">Employees Salary</a></li>
            <li class="active"><strong><?php echo $employee['first_name'].' '.$employee['last_name']; ?></strong></li>
        </ol>
       
     </div>
</div>

<div class="wrapper wrapper-content">

    <div class="row">
        <div class="col-md-12">  
            <a href="<?php echo base_url('employees/salary'); ?>" class="btn btn-danger m-b dim">Employees Salaries</a>
            <a href="<?php echo base_url('employees/pay_requests'); ?>" class="btn btn-white m-b dim">Advance Pay Requests</a>
            <a href="<?php echo base_url('employees/loan_requests'); ?>" class="btn btn-white m-b dim">Loan Requests</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Edit Employee Salary<small> Here you can edit employee salary.</small></h5>
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
                    <?php echo $this->session->flashdata('notification');?>  
                    <form action="<?php echo base_url('employees/salary/edit_salary/'.$salary['employee_id']); ?>" class="form-horizontal" role="form" method="post">
                        <div class="row">
	                       <div class="col-md-6-offset-4">  
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Basic Salary </label>
                                    <div class="col-md-5">
                                        <input class="form-control required" type="text" id="basic_salary" name= "basic_salary" value="<?php echo $salary['basic_salary']; ?>">
                                    </div>
                                </div>     
                                <div class="form-group">
                                    <label class="col-md-4 control-label">House Allowance</label>
                                    <div class="col-md-5">
                                        <input class="form-control required" type="text" id="house_allowance" name= "house_allowance" value="<?php echo $salary['house_allowance']; ?>">
                                    </div>
                                </div>     
                                               
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Travelling Allowance</label>
                                    <div class="col-md-5">
                                        <input class="form-control required" type="text" id="travelling_allowance" name="travelling_allowance" value="<?php echo $salary['travelling_allowance']; ?>">
                                    </div>
                                </div>     
                               <div class="form-group">
                                    <label class="col-md-4 control-label">Other Allowance</label>
                                    <div class="col-md-5">
                                        <input class="form-control required" type="text" id="other_allowance" name= "other_allowance" value="<?php echo $salary['other_allowance']; ?>">
                                    </div>
                                </div>     
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Salary</label>
                                    <div class="col-md-5">
                                        <input class="form-control required" type="text" id="salary" name= "salary" value="<?php echo $salary['salary']; ?>">
                                    </div>
                                </div>  
                                <input type="hidden" name="salary_id" value="<?php echo $salary['id']; ?>" />                          
                                <div class="form-group">
                                    <label class="col-md-4 control-label"></label>
                                    <div class="col-md-5">
                                        <input type="submit" class="btn btn-primary m-b pull-right dim" value="UPDATE SALARY" id="submit">
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