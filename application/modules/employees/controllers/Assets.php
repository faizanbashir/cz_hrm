<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Assets extends CI_Controller {

	
	private $icon  =   'fa fa-users';
	private $path  =   'employee';

	
	function __construct()
    {
        parent::__construct();

        # CHECKS THE CONTROLLERS'S USER ACCESSIBILITY
        if($this->session->userdata['designation'] !== 'Admin')
            redirect('login/four_zero_four', 'refresh');

        $this->load->model('Asset_Model');
        $this->load->model('Employee_Model');
    }


    public function index()
	{ 
       
        $data['title']      =   'View Assets Issued To Employees';
        $data['icon']		=	$this->icon; 
        $data['assets'] 	=	$this->Asset_Model->get_assets();
        $this->load->view($this->path.'/assets', $data);
	}  


	public function issue_asset()
	{   
       
		if($this->input->server('REQUEST_METHOD') == 'POST')
        {
	        $data['employee_id'] 		=  	$this->input->post('employee_id');
	        $data['asset_name'] 		=  	$this->input->post('asset_name');
	        $data['description'] 		=  	$this->input->post('description');
	        $data['issued_on'] 			=  	date('y-m-d', strtotime($this->input->post('issued_on')));
	        $data['created_by']			=   $this->session->userdata['id'];
	    	if($this->Asset_Model->issue_asset($data))
        	{
            	$this->session->set_flashdata('notification', get_success_message($this->lang->line('asset_issued')));           
        	}
        	else
        	{
            	$this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        	}
                
        	redirect('employees/assets', 'refresh');
	    }
	    
        $data['title']      =   'Issue Assets To Employees';
        $data['icon']		=	$this->icon; 
        $data['employees'] 	=	$this->Employee_Model->get_employees();
        $this->load->view($this->path.'/issue-asset', $data);
	}  


	public function edit($id = '')
	{   
       
		if($this->input->server('REQUEST_METHOD') == 'POST')
        {
        	$data['employee_id'] 		=  	$this->input->post('employee_id');
	        $data['asset_name'] 		=  	$this->input->post('asset_name');
	        $data['description'] 		=  	$this->input->post('description');
	        $data['issued_on'] 			=  	date('y-m-d', strtotime($this->input->post('issued_on')));
	        $data['last_updated_by'] 	=	$this->session->userdata['id'];
			$data['last_updated_at'] 	=	date('Y-m-d H:i:s');
	    	if($this->Asset_Model->update_asset($id, $data))
        	{
            	$this->session->set_flashdata('notification', get_success_message($this->lang->line('asset_updated')));           
        	}
        	else
        	{
            	$this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        	}
                
        	redirect('employees/assets', 'refresh');
	    }
	    
        $data['title']      =   'Edit Assets To Employees';
        $data['icon']		=	$this->icon; 
        $data['employees'] 	=	$this->Employee_Model->get_employees();
        $data['asset'] 		=	$this->Asset_Model->get_asset_details($id);
        $this->load->view($this->path.'/issue-asset', $data);
	}  


	public function return_asset($id = '')
	{   
       
		if($this->input->server('REQUEST_METHOD') == 'POST')
        {
	        $data['returned_on'] 		=  	date('y-m-d', strtotime($this->input->post('returned_on')));
	        $data['status']				= 	'returned';
	        $data['last_updated_by'] 	=	$this->session->userdata['id'];
			$data['last_updated_at'] 	=	date('Y-m-d H:i:s');
	    	if($this->Asset_Model->update_asset($id, $data))
        	{
            	$this->session->set_flashdata('notification', get_success_message($this->lang->line('asset_returned')));           
        	}
        	else
        	{
            	$this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        	}
                
        	redirect('employees/assets', 'refresh');
	    }
	}  


	public function delete($id = '')
	{   
         
        $data['status']				= 	'deleted';
        $data['last_updated_by'] 	=	$this->session->userdata['id'];
		$data['last_updated_at'] 	=	date('Y-m-d H:i:s');

    	if($this->Asset_Model->update_asset($id, $data))
    	{
        	$this->session->set_flashdata('notification', get_success_message($this->lang->line('asset_deleted')));           
    	}
    	else
    	{
        	$this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
    	}
                
        redirect('employees/assets', 'refresh');
	}  

	
	
}
