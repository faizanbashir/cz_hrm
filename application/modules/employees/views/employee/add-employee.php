<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<link href="<?php echo base_url(); ?>assets/css/plugins/steps/jquery.steps.css" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-md-12">
        <h2>
            <i class="<?php echo $icon; ?>"></i> <?php echo $title; ?>
        </h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('employees/hr'); ?>">Home</a></li>
            <li><a href="<?php echo base_url('employees/employee'); ?>">Employees</a></li>
            <li class="active"><strong><?php if(isset($employee['id'])) echo $employee['first_name'].' '.$employee['last_name'].' ('.$employee['designation'].')'; else echo $title; ?></strong></li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-md-12"> 
            <a href="<?php echo base_url('employees/employee'); ?>" class="btn btn-danger m-b dim">Employees</a>
            <a href="<?php echo base_url('employees/designations'); ?>" class="btn btn-white m-b dim">Designations</a>
            <a href="<?php echo base_url('employees/assets'); ?>" class="btn btn-white m-b dim">Assets</a>
        </div>       
    </div>
	<div class="row">
	    <div class="col-md-12">
	        <div class="ibox">
	            <div class="ibox-title">
	                <h5>EMPLOYEE DETAILS</h5>
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

	                <form id="form" action="<?php if(isset($employee['id'])) echo base_url('employees/employee/edit_employee/'.$employee['id']); else echo base_url('employees/employee/add_employee');?>" class="wizard-big" method="post" enctype="multipart/form-data">
	                    <h1>PERSONAL INFORMATION</h1>
	                    <fieldset>
	                        <h2>Personal Information</h2>
	                        <div class="row">
	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <label>First Name *</label>
	                                    <input id="name" name="first_name" type="text" class="form-control required" value="<?php if(isset($employee['id'])) echo $employee['first_name']; ?>">
	                                </div>
	                                <div class="form-group">
	                                    <label>Father's Name *</label>
	                                    <input id="fathers_name" name="fathers_name" type="text" class="form-control required" value="<?php if(isset($employee['id'])) echo $employee['fathers_name']; ?>">
	                                </div>
	                                <div class="form-group">
	                                    <label>Contact No *</label>
	                                    <input id="contact" name="contact_no" type="number" class="form-control required" value="<?php if(isset($employee['id'])) echo $employee['contact_no']; ?>">
	                                </div>
	                                <div class="form-group">
	                                    <label>Email ID*</label>
	                                    <input id="email" name="email" type="text" class="form-control required email" value="<?php if(isset($employee['id'])) echo $employee['email']; ?>">
	                                </div>	 
	                                <div class="form-group">
	                            	    <label>Country *</label>
	                            	    <select class="form-control required" name="country" id="country" onchange="select_state();">
                                        </select>
	                            	</div>                          
	                            	<div class="form-group">
	                            	    <label>Address *</label>
	                            	    <input id="address" name="address" type="text" class="form-control required" value="<?php if(isset($employee['id'])) echo $employee['address']; ?>">
	                            	</div>
	                            </div>
	                            <div class="col-sm-6">
	                            	<div class="form-group">
	                            	    <label>Last Name *</label>
	                            	    <input id="surname" name="last_name" type="text" class="form-control required" value="<?php if(isset($employee['id'])) echo $employee['last_name']; ?>">
	                            	</div>
	                               <div class="form-group" id="data_1">
                                       <label>DOB *</label>
                                       <div class="input-group date">
                                           <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control required" name= "dob" id = "dob" value="<?php if(isset($employee['id'])) echo date('m/d/Y', strtotime($employee['dob'])); ?>">
                                       </div>
                                   </div>
                                   <div class="form-group">
                                       <label>Mobile No *</label>
                                       <input id="mobile_no" name="mobile_no" type="number" class="form-control required" value="<?php if(isset($employee['id'])) echo $employee['mobile_no']; ?>">
                                   </div>
                                   <div class="form-group">
	                                    <label>Email Password *</label>
	                                    <input id="email" name="email_password" type="text" class="form-control required" value="<?php if(isset($employee['id'])) echo $employee['email_password']; ?>">
	                                </div>  
	                                <div class="form-group">
	                            	    <label>State *</label>
	                            	    <select class="form-control required" name="state" id="state">
                                          
                                        </select>
	                            	</div>                                 
	                            	<div class="form-group">
	                            	    <label>City *</label>
	                            	    <input id="city" name="city" type="text" class="form-control required" value="<?php if(isset($employee['id'])) echo $employee['city']; ?>">
	                            	</div>
	                            	<div class="form-group">
	                            	    <label>PIN *</label>
	                            	    <input id="pin" name="pin" type="text" class="form-control required" value="<?php if(isset($employee['id'])) echo $employee['pin']; ?>">
	                            	</div>
	                            </div>
	                        </div>
	                    </fieldset>
	                    <h1>ACADEMICS</h1>
	                    <fieldset>
	                        <h2>Academic Information</h2>
	                        <div class="row">	                            
	                            <div class="qualification-list">
	                            	<?php 
	                            		if(isset($employee['id'])):
		                            	foreach($qualifications as $qualification): ?>
		                            		<div class="col-xs-12" id="qualification_<?php echo $employee['id'].'_'.$qualification['id']; ?>">
			                            	<div class="list">
			                            		<div class="col-xs-3">
					                                <div class="form-group">
					                                    <label>Qualification *</label>
					                                    <input id="qualification" name="qualification[]" type="text" class="form-control required" value="<?php if(isset($employee['id'])) echo $qualification['qualification']; ?>">
					                                </div>
					                            </div>
					                            <div class="col-xs-4">
					                                <div class="form-group">
					                                    <label>Authority *</label>
					                                    <input id="authority" name="authority[]" type="text" class="form-control required" value="<?php if(isset($employee['id'])) echo $qualification['authority']; ?>">
					                                </div>
					                            </div>
					                            <div class="col-xs-4">
					                                <div class="form-group">
					                                    <label>Percentage *</label>
					                                    <input id="percentage" name="percentage[]" type="text" class="form-control number required" value="<?php if(isset($employee['id'])) echo $qualification['percentage']; ?>">
					                                </div>
					                            </div>
					                            <div class="col-md-1">
						                        	<div class="form-group"><label>Remove</label>
						                        		<center><i onclick="$('#qualification_<?php echo $employee['id'].'_'.$qualification['id']; ?>').remove();" class="fa fa-trash fa-2x red pointer"></i></center>
						                        	</div>
						                        </div>
				                            </div>	           
						                    
						                </div>
						            <?php 
						            		endforeach; 
						            	else:
						            ?>
	                            	<div class="col-xs-12" id="qualification_1">
		                            	<div class="list">
		                            		<div class="col-xs-3">
				                                <div class="form-group">
				                                    <label>Qualification *</label>
				                                    <input id="qualification" name="qualification[]" type="text" class="form-control required">
				                                </div>
				                            </div>
				                            <div class="col-xs-4">
				                                <div class="form-group">
				                                    <label>Authority *</label>
				                                    <input id="authority" name="authority[]" type="text" class="form-control required">
				                                </div>
				                            </div>
				                            <div class="col-xs-4">
				                                <div class="form-group">
				                                    <label>Percentage *</label>
				                                    <input id="percentage" name="percentage[]" type="text" class="form-control number required">
				                                </div>
				                            </div>
				                            <div class="col-md-1">
					                        	<!-- <div class="form-group"><label>Remove</label>
					                        		<center><i onclick="$('#qualification_1').remove();" class="fa fa-trash fa-2x red pointer"></i></center>
					                        	</div> -->
					                        </div>
			                            </div>	           
					                    
					                </div>

					            	<?php endif; ?>
					            </div>

					            <div class="form-group">
			                        <div class="col-md-12">
			                            <div class="col-md-8">
			                                <span id="add-qualification" class="btn btn-success btn-xs dim"><i class="fa fa-plus"></i> ADD QUALIFICATION</span> 
			                                <span id="remove-qualification" class="btn btn-warning btn-xs dim"><i class="fa fa-minus"></i> REMOVE QUALIFICATION</span>
			                            </div>
			                        </div>
			                    </div>

                                <div class="col-md-12">
	                                <div class="form-group">
	                                    <label>Certifications (if any) </label>
	                                    <input id="certifications" name="certifications" type="text" class="form-control" value="<?php if(isset($employee['id'])) echo $employee['certifications']; ?>">
	                                </div>
	                            </div>
	                            <div class="col-md-12">
	                            	<div class="form-group">
	                            	    <label>Trainings (if any)</label>
	                            	    <input id="trainings" name="trainings" type="text" class="form-control" value="<?php if(isset($employee['id'])) echo $employee['trainings']; ?>">
	                            	</div>
	                            </div>
	                        </div>
	                    </fieldset>
	                    <h1>EXPERIENCE</h1>
	                    <fieldset>
	                        <h2>Experience Information</h2>
	                        <div class="row">
	                        	<div class="experience-list">
	                        		<?php 
	                        			$i = 1;
	                        			if(isset($employee['id'])): 
	                        				foreach($experiences as $experience):
	                        		?>
	                        			<div class="col-md-12">
			                        		<div class="list" id="list_<?php echo $experience['id'].'_'.$i; ?>">
					                            <div class="col-md-3">		                            	
					                                <div class="form-group">
					                                    <label>Designation *</label>
					                                    <input id="designation" name="designation[]" type="text" class="form-control" value="<?php if(isset($employee['id'])) echo $experience['designation']; ?>">
					                                </div>
					                            </div>
				                            
					                            <div class="col-md-3">
					                                <div class="form-group">
					                                    <label>Employer *</label>
					                                    <input id="employer" name="employer[]" type="text" class="form-control" value="<?php if(isset($employee['id'])) echo $experience['employer']; ?>">
					                                </div>
					                            </div>
					                            <div class="col-md-5">
						                            <div class="form-group" id="experience_1">
						                                <label>Duration</label>
						                                <div class="input-daterange input-group" id="datepicker">
						                                	<span class="input-group-addon">From</span>
						                                    <input type="text" class="input-sm form-control" name="from[]" value="<?php if(isset($employee['id'])) echo date('m/d/Y', strtotime($experience['duration_from'])); ?>"/>
						                                    <span class="input-group-addon">To</span>
						                                    <input type="text" class="input-sm form-control" name="to[]" value="<?php if(isset($employee['id'])) echo date('m/d/Y', strtotime($experience['duration_to'])); ?>"/>
						                                </div>
						                            </div>					                            
						                        </div>
						                        <div class="col-md-1">
						                        	<div class="form-group"><label>Remove</label>
						                        		<center><i onclick="$('#list_<?php echo $experience['id'].'_'.$i; ?>').remove();" class="fa fa-trash fa-2x red pointer"></i></center>
						                        	</div>
						                        </div>
						                        
						                    </div>
						                </div>
					               <?php 
					               			endforeach;
					               		else:
					               	?>
		                        		<div class="col-md-12">
			                        		<div class="list">
					                            <div class="col-md-3">		                            	
					                                <div class="form-group">
					                                    <label>Designation *</label>
					                                    <input id="designation" name="designation[]" type="text" class="form-control">
					                                </div>
					                            </div>
				                            
					                            <div class="col-md-3">
					                                <div class="form-group">
					                                    <label>Employer *</label>
					                                    <input id="employer" name="employer[]" type="text" class="form-control">
					                                </div>
					                            </div>
					                            <div class="col-md-5">
						                            <div class="form-group" id="experience_1">
						                                <label>Duration</label>
						                                <div class="input-daterange input-group" id="datepicker">
						                                	<span class="input-group-addon">From</span>
						                                    <input type="text" class="input-sm form-control" name="from[]" />
						                                    <span class="input-group-addon">To</span>
						                                    <input type="text" class="input-sm form-control" name="to[]"  />
						                                </div>
						                            </div>					                            
						                        </div>
						                        
						                    </div>
						                </div>						           

			                		<?php endif; ?>
			                	</div>
		                        <div class="form-group">
		                            <div class="col-md-8">
		                                <span id="add-experience" class="btn btn-success btn-xs dim"><i class="fa fa-plus"></i> ADD EXPERIENCE</span> 
		                                <span id="remove-experience" class="btn btn-warning btn-xs dim"><i class="fa fa-minus"></i> REMOVE EXPERIENCE</span>
		                            </div>
		                        </div> 
	                        </div>
	                    </fieldset>
	                    <h1>SALARY DETAILS</h1>
	                    <fieldset>
	                        <h2>Salary Details</h2>
	                        <div class="row">
	                            <div class="col-md-6">
	                                <div class="form-group">
	                                    <label>Designation *</label>
	                                    <select name="designation_id" class="form-control required">
	                                    	<option value="">Select Currrent Designation</option>
	                                    	<?php foreach($designations as $designation): ?>
	                                    		<option value="<?php echo $designation['id']; ?>" <?php if(isset($employee['designation_id'])) if($employee['designation_id'] == $designation['id']) echo 'selected'; ?>><?php echo $designation['designation_title']; ?></option>
	                                    	<?php endforeach; ?> 
	                                    </select>
	                                </div>
	                                
	                                <div class="form-group">
	                                    <label>Probation Period</label>
	                                    <input id="probation_period" name="probation_period" type="text" class="form-control number" value="<?php if(isset($employee['id'])) echo $employee['probation_period']; ?>" placeholder="IN MONTHS">
	                                </div>
	                                <div class="form-group">
	                                    <label>House Rent Allowance(HRA)</label>
	                                    <input id="hra" name="hra" type="text" class="form-control number" value="<?php if(isset($salary['id'])) echo $salary['hra']; ?>">
	                                </div>	 
	                                <div class="form-group">
	                                    <label>Dearness Allowance(DA)</label>
	                                    <input id="da" name="da" type="text" class="form-control number" value="<?php if(isset($salary['id'])) echo $salary['da']; ?>">
	                                </div>
	                                <div class="form-group">
	                                    <label>Joining Bonus</label>
	                                    <input id="joining_bonus" name="joining_bonus" type="text" class="form-control number" value="<?php if(isset($salary['id'])) echo $salary['joining_bonus']; ?>">
	                                </div>
	                                <div class="form-group">
	                                    <label>Provident Fund</label>
	                                    <input id="provident_fund" name="provident_fund" type="text" class="form-control number" value="<?php if(isset($salary['id'])) echo $salary['provident_fund']; ?>">
	                                </div>	                                
	                            </div>
	                            <div class="col-md-6">
	                               	<div class="form-group" id="data_2">
                                       <label>Date of Joining *</label>
                                       <div class="input-group date">
                                           <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control required" name="doj" id = "doj" value="<?php if(isset($employee['id'])) echo date('m/d/Y', strtotime($employee['doj'])); ?>">
                                       </div>
                                   	</div>
                                   	<div class="form-group">
	                                    <label>Basic Salary *</label>
	                                    <input id="basic_salary" name="basic_salary" type="text" class="form-control number required" value="<?php if(isset($salary['id'])) echo $salary['basic_salary']; ?>">
	                                </div>
	                                <div class="form-group">
	                                    <label>Special Allowance</label>
	                                    <input id="special_allowance" name="special_allowance" type="text" class="form-control number" value="<?php if(isset($salary['id'])) echo $salary['special_allowance']; ?>">
	                                </div>
	                                <div class="form-group">
	                                    <label>Medical Allowance</label>
	                                    <input id="medical_allowance" name="medical_allowance" type="text" class="form-control number" value="<?php if(isset($salary['id'])) echo $salary['medical_allowance']; ?>">
	                                </div>
	                                <div class="form-group">
	                                    <label>Income Tax</label>
	                                    <input id="income_tax" name="income_tax" type="text" class="form-control number" value="<?php if(isset($salary['id'])) echo $salary['income_tax']; ?>">
	                                </div>
	                                <div class="form-group">
		                                <label>Employee Note </label>
		                                <textarea class="form-control" rows="3" id="employee_note" name="employee_note"><?php if(isset($employee['id'])) echo $employee['employee_note']; ?></textarea>
		                            </div>

	                        	</div>
								
								<?php if(isset($salary['id'])): ?>
		                        	<input type="hidden" name="salary_id" value="<?php if(isset($salary['id'])) echo $salary['id']; ?>" />
		                        <?php endif; ?>

                            </div>
	                    </fieldset>
	                    <h1>BANK DETAILS</h1>
	                    <fieldset>
	                        <h2>Bank Details</h2>
	                        <div class="row">
	                            <div class="col-md-6">
	                                <div class="form-group">
	                                    <label>Bank Name</label>
	                                    <input id="bank_name" name="bank_name" type="text" class="form-control" value="<?php if(isset($salary['id'])) echo $salary['bank_name']; ?>">
	                                </div>
	                                <div class="form-group">
	                                    <label>Bank Account No.</label>
	                                    <input id="bank_ac_no" name="bank_ac_no" type="text" class="form-control" value="<?php if(isset($salary['id'])) echo $salary['bank_ac_no']; ?>">
	                                </div>
	                                <div class="form-group">
	                                    <label>Provident Fund No.</label>
	                                    <input id="pf_no" name="pf_no" type="text" class="form-control" value="<?php if(isset($salary['id'])) echo $salary['pf_no']; ?>">
	                                </div>	 	                                
	                            </div>
	                            <div class="col-md-6">
	                               	<div class="form-group">
	                                    <label>PAN No.</label>
	                                    <input id="pan_no" name="pan_no" type="text" class="form-control" value="<?php if(isset($salary['id'])) echo $salary['pan_no']; ?>">
	                                </div>
                                   	<div class="form-group">
	                                    <label>UAN No.</label>
	                                    <input id="uan_no" name="uan_no" type="text" class="form-control" value="<?php if(isset($salary['id'])) echo $salary['uan_no']; ?>">
	                                </div>
	                            </div>
							</div>
	                    </fieldset>
	                    <h1>FILES</h1>
	                    <fieldset>
	                        <h2>Files</h2>
	                        <div class="row">
	                        	<div class="file-list">
	                        		<?php 
	                        			if(isset($employee['id'])): 
	                        				foreach($files as $file):
	                        		?>
	                        			<div class="col-md-12">
			                            	<div class="list" id="emp_file_<?php echo $file['id']; ?>">
				                                <div class="form-group col-md-2">
				                                	<label>Download File</label><br>
				                                    <center><i class="fa fa-download fa-2x" onclick="window.location = '<?php echo base_url()."employees/hr/download_file/".$file['file_name_url'];?>'"></i></center>
				                                </div>
				                                <div class="form-group col-md-3">
				                                    <label>File Name </label>
				                                    <input id="file_name_1" name="file_name[]" type="text" class="form-control" value="<?php if(isset($employee['id'])) echo $file['file_name']; ?>">
				                                </div>
				                                <div class="form-group col-md-6">
				                                    <label>File Description </label>
				                                    <input id="file_desc_1" name="file_desc[]" type="text" class="form-control" value="<?php if(isset($employee['id'])) echo $file['file_description']; ?>">
				                                </div>
				                                <div class="col-md-1">
						                        	<div class="form-group"><label>Remove</label>
						                        		<center><i onclick="$('#emp_file_<?php echo $file['id']; ?>').remove(); delete_file(<?php echo $file['id']; ?>);" class="fa fa-trash fa-2x red pointer"></i></center>
						                        	</div>
						                        </div>
				                            </div> 
			                            </div>
	                        		<?php 
	                        				endforeach;
	                        			else: 
	                        		?>
			                            <div class="col-md-12">
			                            	<div class="list">
				                                <div class="form-group col-md-4">
				                                	<label>Upload File</label>
				                                    <input type="file" class="fileinput" name="file[]" title="Click to upload File"/>
				                                </div>
				                                <div class="form-group col-md-3">
				                                    <label>File Name </label>
				                                    <input id="file_name_1" name="file_name[]" type="text" class="form-control">
				                                </div>
				                                <div class="form-group col-md-4">
				                                    <label>File Description </label>
				                                    <input id="file_desc_1" name="file_desc[]" type="text" class="form-control">
				                                </div>
				                            </div> 
			                            </div>
			                        <?php endif; ?>
		                        </div>
	                        </div>

	                        <div class="form-group">
	                            <div class="col-md-8">
	                                <span id="add-file" class="btn btn-success btn-xs dim"><i class="fa fa-plus"></i> ADD FILE</span> 
	                                <span id="remove-file" class="btn btn-warning btn-xs dim"><i class="fa fa-minus"></i> REMOVE FILE</span>
	                            </div>
	                        </div>
	                    </fieldset>
	                    <h1>ACCOUNT DETAILS</h1>
	                    <fieldset>
	                        <h2>Account Details</h2>
	                        <div class="row">
	                            <div class="col-md-8">
	                            	<!-- <div class="form-group">
	                            	    <label>Employee Type *</label>
	                            	    <select class="form-control required" name="user_level" id="user_level">
	                            	    	<option value="">Select Employee Level</option>
	                            	    	<option <?php if($employee['user_level'] == 'reporting_officer') echo 'seleted'; ?> value="reporting_officer">Reporting Officer</option>	                            	    	
	                            	    	<option <?php if($employee['user_level'] == 'reporting_officer') echo 'seleted'; ?> value="line_manager">Line Manager</option>
	                            	    	<option <?php if($employee['user_level'] == 'reporting_officer') echo 'seleted'; ?> value="project_manager">Project Manager</option>
	                            	    	<option <?php if($employee['user_level'] == 'hod') echo 'seleted'; ?> value="hod">HOD</option>
                                        </select>
	                            	</div>        -->  

	                                <div class="form-group">
	                                    <label>Username *</label>
	                                    <input id="userName" name="user_name" type="text" class="form-control required" value="<?php if(isset($employee['id'])) echo $employee['user_name']; ?>">
	                                </div>

	                                <?php if(!isset($employee['id'])): ?>
		                                <div class="form-group">
		                                    <label>Password *</label>
		                                    <input id="password" name="user_password" type="text" class="form-control required">
		                                </div>
		                                <div class="form-group">
		                                    <label>Confirm Password *</label>
		                                    <input id="confirm" name="confirm_password" type="text" class="form-control required">
		                                </div>
		                            <?php endif; ?>
	                            </div>
	                            <div class="col-md-4">
	                                <div class="text-center">
	                                    <div style="margin-top: 20px">
	                                        <i class="fa fa-sign-in" style="font-size: 180px;color: #e5e5e5 "></i>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>

	                    </fieldset>
	                </form>
	            </div>
	            
	        </div>
	    </div>
	</div>
</div>


<!-- Steps -->
<script src="<?php echo base_url(); ?>assets/js/plugins/staps/jquery.steps.min.js"></script>

<!-- Jquery Validate -->
<script src="<?php echo base_url(); ?>assets/js/plugins/validate/jquery.validate.min.js"></script>


<script>
    $(document).ready(function(){

        $("#wizard").steps();
        $("#form").steps({
            bodyTag: "fieldset",
            onStepChanging: function (event, currentIndex, newIndex)
            {
                // Always allow going backward even if the current step contains invalid fields!
                if (currentIndex > newIndex)
                {
                    return true;
                }

                // Forbid suppressing "Warning" step if the user is to young
                if (newIndex === 3 && Number($("#age").val()) < 18)
                {
                    return false;
                }

                var form = $(this);

                // Clean up if user went backward before
                if (currentIndex < newIndex)
                {
                    // To remove error styles
                    $(".body:eq(" + newIndex + ") label.error", form).remove();
                    $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                }

                // Disable validation on fields that are disabled or hidden.
                form.validate().settings.ignore = ":disabled,:hidden";

                // Start validation; Prevent going forward if false
                return form.valid();
            },
            onStepChanged: function (event, currentIndex, priorIndex)
            {
                // Suppress (skip) "Warning" step if the user is old enough.
                if (currentIndex === 2 && Number($("#age").val()) >= 18)
                {
                    $(this).steps("next");
                }

                // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                if (currentIndex === 2 && priorIndex === 3)
                {
                    $(this).steps("previous");
                }
            },
            onFinishing: function (event, currentIndex)
            {
                var form = $(this);

                // Disable validation on fields that are disabled.
                // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                form.validate().settings.ignore = ":disabled";

                // Start validation; Prevent form submission if false
                return form.valid();
            },
            onFinished: function (event, currentIndex)
            {
                var form = $(this);

                // Submit form input
                form.submit();
            }
        }).validate({
                    errorPlacement: function (error, element)
                    {
                        element.before(error);
                    },
                    rules: {
                        confirm: {
                            equalTo: "#password"
                        }
                    }
                });
        //Date Picker

        var date = new Date();
        date.setDate(date.getDate());

        $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true,
            endDate: date
        });

        $('#data_2 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true,
            endDate: date
        });

        $('#experience_1 .input-daterange').datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });

        // End Date Picker

        $("#add-qualification").click(function () 
        {
            
            var id = ($('.qualification-list .list').length + 1).toString();
            
            $('.qualification-list').append('<div class="col-xs-12" id="qualification_'+id+'"><div class="list"><div class="col-xs-3"> <div class="form-group"> <label>Qualification *</label> <input id="qualification" name="qualification[]" type="text" class="form-control required"> </div></div><div class="col-xs-4"> <div class="form-group"> <label>Authority *</label> <input id="authority" name="authority[]" type="text" class="form-control required"> </div></div><div class="col-xs-4"> <div class="form-group"> <label>Percentage *</label> <input id="percentage" name="percentage[]" type="text" class="form-control number required"> </div></div><div class="col-md-1">	<div class="form-group"><label>Remove</label> <center><i onclick="$(\'#qualification_'+id+'\').remove();" class="fa fa-trash fa-2x red pointer"></i></center></div></div></div></div>');

            return true;
        });

        $("#remove-qualification").click(function () {
 			if ($('.qualification-list .list').length == 1) {
                alert("NO MORE QUALIFICATON TO REMOVE");
                return false;
            }
	 	    $(".qualification-list .list:last").remove();
	 	    return true;
 		});
       
 		$("#add-experience").click(function () 
        {
            
            var id = ($('.experience-list .list').length + 1).toString();
            
            $('.experience-list').append('<div class="col-md-12"><div class="list" id="list_'+id+'"><div class="col-md-3"><div class="form-group"><label>Designation *</label><input id="designation_'+id+'" name="designation[]" type="text" class="form-control"></div></div><div class="col-md-3"><div class="form-group"><label>Employer</label><input id="employer_'+id+'" name="employer[]" type="text" class="form-control"></div></div><div class="col-md-5"><div class="form-group" id="experience_'+id+'"><label>Duration</label><div class="input-daterange input-group" id="datepicker"><span class="input-group-addon">From</span><input type="text" class="input-sm form-control" name="from[]" value=""/><span class="input-group-addon">To</span><input type="text" class="input-sm form-control" name="to[]" value="" /></div></div></div><div class="col-md-1"><div class="form-group"><label>Remove</label><center><i onclick="$(\'#list_'+id+'\').remove();" class="fa fa-trash fa-2x red pointer"></i></center></div></div></div></div>');

            $('#experience_'+id+' .input-daterange').datepicker({
	            keyboardNavigation: false,
	            forceParse: false,
	            autoclose: true
	        });

            return true;
        });

        $("#remove-experience").click(function () {
 			if ($('.experience-list .list').length == 1) {
 				alert("NO MORE EXPERIENCE TO REMOVE");
                return false;
            }
	 	    $(".experience-list .list:last").remove();
	 	    return true;
 		});

 		$("#add-file").click(function () 
        {
            
            var id = ($('.file-list .list').length + 1).toString();
            
            $('.file-list').append('<div class="col-md-12"><div class="list" id="list_file_'+id+'"><div class="form-group col-md-4"><label>Upload File</label><input type="file" class="fileinput" name="file[]" title="Click to upload File"/></div><div class="form-group col-md-3"><label>File Name </label><input id="file_name_'+id+'" name="file_name[]" type="text" class="form-control"></div><div class="form-group col-md-4"><label>File Description </label><input id="file_desc_'+id+'" name="file_desc[]" type="text" class="form-control"></div><div class="col-md-1"><div class="form-group"><label>Remove</label><center><i onclick="$(\'#list_file_'+id+'\').remove();" class="fa fa-trash fa-2x red pointer"></i></center></div></div></div></div>');
            return true;
        });

        $("#remove-file").click(function () {
 			if ($('.file-list .list').length == 1) {
                alert("NO MORE FILES TO REMOVE");
                return false;
            }
	 	    $(".file-list .list:last").remove();
	 	    return true;
 		});
   });	

</script>

<script src="<?php echo base_url(); ?>assets/js/countries.js"></script>

<script type="text/javascript">

	populateCountries("country", "state");
	var countryElement = document.getElementById('state');
	function select_state()
	{
		populateStates( "country", "state");
	}

</script>

<?php if(isset($employee['country']) && isset($employee['state'])): ?>
    <script type="text/javascript">
        function update_country_state()
    	{
	        $("#country").val("<?php echo $employee['country'];?>");
	        $("#country").change();
	        $("#state").val("<?php echo $employee['state'];?>");
	    }
	    onload = setTimeout(function(){ update_country_state(); }, 1000);
    </script>  
<?php endif; ?>

<script type="text/javascript">
	function delete_file(file_id)
	{
		$.ajax({
            type: 'POST',
            url: '<?php echo base_url()."employees/hr/delete_employee_file";?>',
            data: { file_id: file_id },
            success:function()
            {
                return true;
            },
            error:function()
            {
                alert('Something went wrong. Please try again after sometime.');
                onClick="update_sidebar();" 
            }
        });
	}
</script>
	
<?php include_once( APPPATH.'views/includes/footer.php' ); ?>