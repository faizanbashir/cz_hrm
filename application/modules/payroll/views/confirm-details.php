<?php include_once( APPPATH.'views/includes/header.php' ); ?>

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
                    <h5>Pay slip for the month of <?php echo $date; ?></small></h5>
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

                    <form action="#" class="form-horizontal" role="form" method="post">
                       	<div class="row">
                       		<div class= "col-md-3">
			                   	<div class="form-group">
			                       	<label class="col-md-4 control-label">Employee ID:</label>
			                       	<div class= "col-md-6">
			                            <input id="employee_id" name="employee_id" readonly type="text" class="form-control" value="<?php echo $employee['id']; ?>">

			                     	</div>
			                    </div>
			                    <div class="form-group">
			                       	<label class="col-md-4 control-label">Employee Name:</label>
			                       	<div class= "col-md-6">
			                            <input id="name" name="name" readonly type="text" class="form-control" value="<?php echo $employee['first_name']." ".$employee['last_name']; ?>">

			                     	</div>
			                    </div>
			                    <div class="form-group">
			                       	<label class="col-md-4 control-label">Standard Days:</label>
			                       	<div class= "col-md-6">
			                            <input id="days" name="days" readonly type="text" class="form-control" value="">

			                     	</div>
			                    </div>
			                    <div class="form-group">
			                       	<label class="col-md-4 control-label">Days Worked:</label>
			                       	<div class= "col-md-6">
			                            <input id="days_worked" name="days_worked" readonly type="text" class="form-control" value="">

			                     	</div>
			                    </div>
			                </div>
			                <div class= "col-md-3">
			                	<div class="form-group">
			                       	<label class="col-md-4 control-label">Date of Joining:</label>
			                       	<div class= "col-md-6">
			                            <input id="doj" name="doj" readonly type="text" class="form-control" value="<?php echo $employee['doj']; ?>">

			                     	</div>
			                    </div>
			                    <div class="form-group">
			                       	<label class="col-md-4 control-label">Designation:</label>
			                       	<div class= "col-md-6">
			                            <input id="designation" name="designation" readonly type="text" class="form-control" value="<?php echo $employee['designation']; ?>">

			                     	</div>
			                    </div>
			                    <div class="form-group">
			                       	<label class="col-md-4 control-label">Department:</label>
			                       	<div class= "col-md-6">
			                            <input id="department" name="department" readonly type="text" class="form-control" value="<?php echo $employee['department']; ?>">

			                     	</div>
			                    </div>
			                    <div class="form-group">
			                       	<label class="col-md-4 control-label">Location:</label>
			                       	<div class= "col-md-6">
			                            <input id="location" name="location" readonly type="text" class="form-control" value="">

			                     	</div>
			                    </div>
			                </div>
			                <div class= "col-md-3">
			                	<div class="form-group">
			                       	<label class="col-md-4 control-label">Bank Name:</label>
			                       	<div class= "col-md-6">
			                            <input id="bank_name" name="bank_name" readonly type="text" class="form-control" value="<?php echo $salary['bank_name']; ?>">

			                     	</div>
			                    </div>
			                    <div class="form-group">
			                       	<label class="col-md-4 control-label">Bank Ac/no:</label>
			                       	<div class= "col-md-6">
			                            <input id="bank_ac_no" name="bank_ac_no" readonly type="text" class="form-control" value="<?php echo $salary['bank_ac_no']; ?>">

			                     	</div>
			                    </div>
			                    <div class="form-group">
			                       	<label class="col-md-4 control-label">PF No:</label>
			                       	<div class= "col-md-6">
			                            <input id="pf_no" name="pf_no" readonly type="text" class="form-control" value="<?php echo $salary['pf_no']; ?>">

			                     	</div>
			                    </div>
			                    <div class="form-group">
			                       	<label class="col-md-4 control-label">PAN No:</label>
			                       	<div class= "col-md-6">
			                            <input id="pan_no" name="pan_no" readonly type="text" class="form-control" value="<?php echo $salary['pan_no']; ?>">

			                     	</div>
			                    </div>

			                </div>
			                <div class= "col-md-3">
			                	<div class="form-group">
			                       	<label class="col-md-4 control-label">UAN No:</label>
			                       	<div class= "col-md-6">
			                            <input id="uan_no" name="uan_no" readonly type="text" class="form-control" value="<?php echo $salary['uan_no']; ?>">

			                     	</div>
			                    </div>
			                </div>
			            </div>
			        </form>
			        <form action="<?php echo base_url('payroll/payroll/confirm');?>" class="form-horizontal" role="form" method="post">
			            <div class="row">
			            	<div class= "col-md-6">
			            		<h2>Earnings</h2>
			            		<div class="form-group">
			                       	<label class="col-md-4 control-label">Basic Salary:</label>
			                       	<div class= "col-md-6">
			                            <input id="basic_salary" name="basic_salary" readonly type="text" class="form-control" value="<?php echo $salary['basic_salary']; ?>">

			                     	</div>
			                    </div>
			            		<div class="form-group">
				                    <label class="col-md-4 control-label">HRA:</label>
				                    <div class= "col-md-6">
				                        <input id="hra" name="hra" type="text" class="form-control" value="<?php echo $salary['hra']; ?>">

				                    </div>
				                </div>
				                <div class="form-group">
			                    	<label class="col-md-4 control-label">DA:</label>
			                    	<div class= "col-md-6">
			                        	<input id="da" name="da" type="text" class="form-control" value="<?php echo $salary['da']; ?>">
			                        </div>
			                	</div>
				                <div class="form-group">
				                   	<label class="col-md-4 control-label">Special Allowance:</label>
				                    <div class= "col-md-6">
				                        <input id="special_allowance" name="special_allowance" type="text" class="form-control" value="<?php echo $salary['special_allowance']; ?>">

				                    </div>
				                </div>
				            	<div class="form-group">
			                   		<label class="col-md-4 control-label">Medical Allowance:</label>
			                    	<div class= "col-md-6">
			                        	<input id="medical_allowance" name="medical_allowance" type="text" class="form-control" value="<?php echo $salary['medical_allowance']; ?>">
									</div>
			               		</div>
			               		<div class="form-group">
			                   		<label class="col-md-4 control-label">Performance Incentive:</label>
			                    	<div class= "col-md-6">
			                        	<input id="performance" name="performance" type="text" class="form-control" value= 0>
									</div>
			               		</div>
			               	<!-- <?php //if(date('m y', strtotime($date)) == date('m y',strtotime($employee['doj']))): ?>
			               		<div class="form-group">
			                   		<label class="col-md-4 control-label">Joining Bonus:</label>
			                    	<div class= "col-md-6">
			                        	<input id="joining_bonus" name="joining_bonus" type="text" class="form-control" value="<?php //echo $salary['joining_bonus']; ?>">
									</div>
			               		</div>
			               	<?php //endif; ?> -->
			            	</div>
			            	<div class="col-md-6">
			            		<h2>Deductions</h2>
			            		<div class="form-group">
			                   		<label class="col-md-4 control-label">Income Tax:</label>
			                    	<div class= "col-md-6">
			                        	<input id="income_tax" name="income_tax" readonly type="text" class="form-control" value="<?php echo $salary['income_tax']; ?>">
									</div>
			               		</div>
			               		<div class="form-group">
			                   		<label class="col-md-4 control-label">Provident Fund:</label>
			                    	<div class= "col-md-6">
			                        	<input id="provident_fund" name="provident_fund" readonly type="text" class="form-control" value="<?php echo $salary['provident_fund']; ?>">
									</div>
			               		</div>
			            	</div>

			            	<input type="hidden" id="date" name="date" value="<?php echo $date; ?>">
			            	<input type="hidden" id="emp_id" name="emp_id" value="<?php echo $employee['id']; ?>">

			               <div class="form-group">
			                	<label class="col-md-4 control-label"></label>
			                    <div class="col-md-4">
			                        <input type="submit" class="btn btn-primary m-b pull-right dim" value="CONFIRM" id="submit">
			                            <span></span>
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