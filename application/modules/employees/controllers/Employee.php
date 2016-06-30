<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {
	
	private $icon = 'fa fa-users';
	private $path = 'employee';
	
	function __construct()
    {
        parent::__construct();

        # CHECKS THE CONTROLLERS'S USER ACCESSIBILITY
        if($this->session->userdata['designation'] !== 'Admin')
            redirect('login/four_zero_four', 'refresh');

        $this->load->model('File_Model');
        $this->load->model('Designation_Model');
        $this->load->model('Employee_Model');
        $this->load->model('Salary_Model');
        $this->load->model('Experience_Model');
        $this->load->model('Qualification_Model');
    }


    public function index()
	{   
		$data['title']      =   'View Employees';
        $data['icon']		=	$this->icon; 
        $data['employees'] 	=	$this->Employee_Model->get_employees();
        $this->load->view($this->path.'/employees', $data);
	}  


	public function add_employee()
	{  	
		
		if($this->input->server('REQUEST_METHOD') == 'POST' && $this->input->post('user_level') !== 'super_admin')
        {
	        $data['first_name'] 		=  	$this->input->post('first_name');
	        $data['last_name'] 			=   $this->input->post('last_name');
	        $data['fathers_name'] 		=   $this->input->post('fathers_name');
	        $data['contact_no'] 		=   $this->input->post('contact_no');
	        $data['email'] 				=   $this->input->post('email');
	        $data['email_password'] 	=   $this->input->post('email_password');
	        $data['country']			=   $this->input->post('country');	        
	        $data['state'] 				=   $this->input->post('state');
	        $data['city']				=   $this->input->post('city');
	        $data['address']			=   $this->input->post('address');
	        $data['dob']				=   date('Y-m-d', strtotime($this->input->post('dob')));
	        $data['mobile_no']			=   $this->input->post('mobile_no');	        
	        $data['pin']				=   $this->input->post('pin');
	        $data['certifications']		=  	$this->input->post('certifications');
	        $data['trainings']			=   $this->input->post('trainings');	
	        $data['designation_id']		=   $this->input->post('designation_id');        
	        $data['designation']		=   $this->Designation_Model->get_designation_title($this->input->post('designation_id'));
	        $data['probation_period']	=	$this->input->post('probation_period');
	        
	        $data['doj']				=   date('Y-m-d', strtotime($this->input->post('doj')));
	        $data['employee_note']		=   $this->input->post('employee_note');
	        $data['user_name']			=   $this->input->post('user_name');
	        $data['user_password']		=   md5($this->input->post('user_password'));
	        $data['created_by']			=   $this->session->userdata['id'];
     
            if($employee_id = $this->Employee_Model->add_employee($data))
            {    
            	$salary['employee_id']			=   $employee_id;
            	$salary['basic_salary']			=   $this->input->post('basic_salary');
		        $salary['hra']					=   $this->input->post('hra');
		        $salary['da']					=   $this->input->post('da');
		        $salary['special_allowance']	=   $this->input->post('special_allowance');
		        $salary['medical_allowance']	=   $this->input->post('medical_allowance');
		        $salary['joining_bonus']		=   $this->input->post('joining_bonus');
		        $salary['income_tax']			=   $this->input->post('income_tax');
		        $salary['provident_fund']		=   $this->input->post('provident_fund');

		        $salary['bank_name']			=   $this->input->post('bank_name');
		        $salary['bank_ac_no']			=   $this->input->post('bank_ac_no');
		        $salary['pf_no']				=   $this->input->post('pf_no');
		        $salary['pan_no']				=   $this->input->post('pan_no');
		        $salary['uan_no']				=   $this->input->post('uan_no');
				$salary['created_by']			=   $this->session->userdata['id'];

		        $this->Salary_Model->add_salary($employee_id, $salary);

				$files       =  $_FILES['file']['name'];
            	$file_name   =  $this->input->post('file_name');
            	$file_desc   =  $this->input->post('file_desc');

            	for($i=0;$i<count($files);$i++)
            	{
            		$fname            =   	($employee_id)."_".($i+1);
            		$n_array 		  = 	explode(".",$files[$i]);
            		$ext              =   	end($n_array); 
            		$file_name_url    =   	$fname.".".$ext;
            		move_uploaded_file($_FILES['file']['tmp_name'][$i],"./file-uploads/user-account-files/files/".$file_name_url);
            		$file['file_name_url']  	=   $file_name_url;
            		$file['employee_id']						=	$employee_id;
            		$file['file_name']  	    =   $file_name[$i];	
            		$file['file_description']  	=   $file_desc[$i];
            		$file['created_by']  	    =   $this->session->userdata['id'];
            		$file['status']          	=   'active';
            		$this->File_Model->add_file($file);
            	}	            	
            	
            	$from  			=	$this->input->post('from');
            	$to  			=	$this->input->post('to');
            	$designation   	=  	$this->input->post('designation');
            	$employer   	=  	$this->input->post('employer');

            	for($i=0;$i<count($designation);$i++)
            	{	
	            	$experience['employee_id']   =   $employee_id;
	            	$experience['designation']   =   $designation[$i];
	            	$experience['employer']      =   $employer[$i];
	            	$experience['duration_from'] =   date('Y-m-d',strtotime($from[$i]));
	            	$experience['duration_to']   =   date('Y-m-d',strtotime($to[$i]));
	            	$experience['created_by']    =   $this->session->userdata['id'];
	            	$experience['status']        =  'active';
	            	$this->Experience_Model->add_experience($experience);
            	}	

            	$qualification  =	$this->input->post('qualification');
            	$authority  	=	$this->input->post('authority');
            	$percentage   	=  	$this->input->post('percentage');

            	for($i=0;$i<count($qualification);$i++)
            	{	
	            	$qualification_data['employee_id']  	=   $employee_id;
	            	$qualification_data['qualification']	=   $qualification[$i];
	            	$qualification_data['authority']    	=   $authority[$i];
	            	$qualification_data['percentage'] 		=   $percentage[$i];
	            	$qualification_data['created_by']   	=   $this->session->userdata['id'];
	            	$qualification_data['status']       	=  'active';
	            	$this->Qualification_Model->add_qualification($qualification_data);
            	}           
                
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('employee_added')));   

                $this->session->set_flashdata('notification', get_success_message($this->lang->line('employee_added')));   
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }
            
            redirect('employees/employee', 'refresh');
        }  

        $data['title']      	=   'Add Employee'; 
        $data['icon']			=	$this->icon; 
        $data['designations'] 	=	$this->Designation_Model->get_designations();
        $this->load->view($this->path.'/add-employee', $data);
	}


	function edit_employee($employee_id = '')
	{
		
		if(!is_numeric($employee_id))
		{
			redirect('login/four_zero_four', 'refresh');
		}

		if($this->input->server('REQUEST_METHOD') == 'POST')
        {
	        $data['first_name'] 		=  	$this->input->post('first_name');
	        $data['last_name'] 			=   $this->input->post('last_name');
	        $data['fathers_name'] 		=   $this->input->post('fathers_name');
	        $data['contact_no'] 		=   $this->input->post('contact_no');
	        $data['email'] 				=   $this->input->post('email');
	        $data['email_password'] 	=   $this->input->post('email_password');
	        $data['country']			=   $this->input->post('country');	        
	        $data['state'] 				=   $this->input->post('state');
	        $data['city']				=   $this->input->post('city');
	        $data['address']			=   $this->input->post('address');
	        $data['dob']				=   date('Y-m-d', strtotime($this->input->post('dob')));
	        $data['mobile_no']			=   $this->input->post('mobile_no');	        
	        $data['pin']				=   $this->input->post('pin');
	        $data['certifications']		=  	$this->input->post('certifications');
	        $data['trainings']			=   $this->input->post('trainings');
	        $data['designation_id']		=   $this->input->post('designation_id');        
	        $data['designation']		=   $this->Designation_Model->get_designation_title($this->input->post('designation_id'));
	        $data['probation_period']	=	$this->input->post('probation_period');
	        $data['doj']				=   date('Y-m-d', strtotime($this->input->post('doj')));
	        $data['employee_note']		=   $this->input->post('employee_note');
	        $data['user_name']			=   $this->input->post('user_name');
	        $data['last_updated_by'] 	=	$this->session->userdata['id'];
			$data['last_updated_at'] 	=	date('Y-m-d H:i:s');
     
            if($this->Employee_Model->update_employee($employee_id, $data))
            {
            	# CODE TO MANAGE SALARY STARTS
            	$salary['employee_id']			=   $employee_id;
            	$salary['basic_salary']			=   $this->input->post('basic_salary');
		        $salary['hra']					=   $this->input->post('hra');
		        $salary['da']					=   $this->input->post('da');
		        $salary['special_allowance']	=   $this->input->post('special_allowance');
		        $salary['medical_allowance']	=   $this->input->post('medical_allowance');
		        $salary['joining_bonus']		=   $this->input->post('joining_bonus');
		        $salary['income_tax']			=   $this->input->post('income_tax');
		        $salary['provident_fund']		=   $this->input->post('provident_fund');

		        $salary['bank_name']			=   $this->input->post('bank_name');
		        $salary['bank_ac_no']			=   $this->input->post('bank_ac_no');
		        $salary['pf_no']				=   $this->input->post('pf_no');
		        $salary['pan_no']				=   $this->input->post('pan_no');
		        $salary['uan_no']				=   $this->input->post('uan_no');
		        $salary['last_updated_by'] 		=	$this->session->userdata['id'];
				$salary['last_updated_at'] 		=	date('Y-m-d H:i:s');
		        $this->Salary_Model->update_salary($employee_id, $salary);
		        # CODE TO MANAGE SALARY ENDS

		        # CODE TO MANAGE FILES STARTS
				$files       =  $_FILES['file']['name'];
            	$file_name   =  $this->input->post('file_name');
            	$file_desc   =  $this->input->post('file_desc');

            	for($i=0;$i<count($files);$i++)
            	{
            		$fname            =   	($employee_id)."_".($i+1);
            		$n_array 		  = 	explode(".",$files[$i]);
        			$ext              =   	end($n_array); 
            		$file_name_url    =   	$fname.".".$ext;
            		move_uploaded_file($_FILES['file']['tmp_name'][$i],"./file-uploads/user-account-files/files/".$file_name_url);
            		$file['file_name_url']  	=   $file_name_url;
            		$file['employee_id']		=	$employee_id;
            		$file['file_name']  	    =   $file_name[$i];	
            		$file['file_description']  	=   $file_desc[$i];
            		$file['created_by']  	    =   $this->session->userdata['id'];
            		$file['status']          	=   'active';
            		$this->File_Model->add_file($file);

            	}	            	
	            # CODE TO MANAGE FILES ENDS	

	            # CODE TO MANAGE EXPERIENCE STARTS
            	$this->Experience_Model->delete_experience($employee_id);

            	$from  			=	$this->input->post('from');
            	$to  			=	$this->input->post('to');
            	$designation   	=  	$this->input->post('designation');
            	$employer   	=  	$this->input->post('employer');

            	for($i=0;$i<count($designation);$i++)
            	{	
	            	$experience['employee_id']   =   $employee_id;
	            	$experience['designation']   =   $designation[$i];
	            	$experience['employer']      =   $employer[$i];
	            	$experience['duration_from'] =   date('Y-m-d',strtotime($from[$i]));
	            	$experience['duration_to']   =   date('Y-m-d',strtotime($to[$i]));
	            	$experience['created_by']    =   $this->session->userdata['id'];
	            	$experience['status']        =  'active';
	            	$this->Experience_Model->add_experience($experience);
            	}
            	# CODE TO MANAGE EXPERIENCE ENDS

            	# CODE TO MANAGE QUALIFICATION STARTS
            	$this->Qualification_Model->delete_qualification($employee_id);

            	$qualification  =	$this->input->post('qualification');
            	$authority  	=	$this->input->post('authority');
            	$percentage   	=  	$this->input->post('percentage');

            	for($i=0;$i<count($qualification);$i++)
            	{	
	            	$qualification_data['employee_id']  	=   $employee_id;
	            	$qualification_data['qualification']	=   $qualification[$i];
	            	$qualification_data['authority']    	=   $authority[$i];
	            	$qualification_data['percentage'] 		=   $percentage[$i];
	            	$qualification_data['created_by']   	=   $this->session->userdata['id'];
	            	$qualification_data['status']       	=  'active';
	            	$this->Qualification_Model->add_qualification($qualification_data);
            	}
            	# CODE TO MANAGE QUALIFICATION ENDS

                $this->session->set_flashdata('notification', get_success_message($this->lang->line('employee_updated')));   
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }

            redirect('employees/employee/edit_employee/'.$employee_id, 'refresh');
        }  
        
        $data['title']      	=   'Edit Employee'; 
        $data['icon']			=	$this->icon; 
        $data['employee'] 		=	$this->Employee_Model->get_employee_details($employee_id);
        $data['designations'] 	=	$this->Designation_Model->get_designations();
        $data['salary'] 		=	$this->Salary_Model->get_employee_salary($employee_id);
        $data['experiences']	=	$this->Experience_Model->get_experience($employee_id);
        $data['qualifications']	=	$this->Qualification_Model->get_qualifications($employee_id);
        $data['files']			=	$this->File_Model->get_files($employee_id);
        $this->load->view($this->path.'/add-employee', $data);
	} 


	public function delete_employee($employee_id = '')
	{
		if(!is_numeric($employee_id))
		{
			redirect('login/four_zero_four', 'refresh');
		}

		$data['last_updated_by'] 	=	$this->session->userdata['id'];
		$data['last_updated_at'] 	=	date('Y-m-d H:i:s');
		$data['status'] 			=	'deleted';

		if($this->Employee_Model->update_employee($employee_id, $data))
		{
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('employee_deleted')));   
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }

        redirect('employees/employee/employees', 'refresh');
	}


	public function delete_employee_file()
	{	
		
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$data['last_updated_by'] 	=	$this->session->userdata['id'];
			$data['last_updated_at'] 	=	date('Y-m-d H:i:s');
			$data['status'] 			=	'deleted';

			if($this->File_Model->update_file($this->input->post('file_id'), $data))
			{
	            return true;
	        }
	        else
	        {
	            return false;
	        }
		}
		else
		{
			redirect('login/four_zero_four', 'refresh');
		}
	}


	public function download_file($filename)
    {
        $this->load->helper('download');
        $data = file_get_contents(base_url()."file-uploads/user-account-files/files/".$filename); 
        force_download($filename, $data);
    }
	 

	public function employee_profile()
	{   
        $data['title']      =   'Employee Profile'; 
        $data['icon']		=	$this->icon; 
        $this->load->view($this->path.'/add-employee', $data);
	}


	public function employees_leaves()
	{   
        $data['title']      =   'Employees Leaves';
        $data['icon']		=	$this->icon; 
        $this->load->view($this->path.'/employees-leaves', $data);
	}  


	public function employees_reports()
	{   
        $data['title']      =   'Employees Reports';
        $data['icon']		=	$this->icon; 
        $this->load->view($this->path.'/employees-reports', $data);
	}  


	public function attendance_calendar()
	{  
		  
        $data['title']      =   'Employee Attendance';
        $data['icon']		=	$this->icon; 
        $this->load->view($this->path.'/attendance-calendar', $data);
	}  
	
}
