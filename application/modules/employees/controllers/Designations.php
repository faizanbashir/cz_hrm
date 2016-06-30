<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Designations extends CI_Controller {

	
	private $icon  =   'fa fa-users';
	private $path  =   'employee';

	
	function __construct()
    {
        parent::__construct();

        # CHECKS THE CONTROLLERS'S USER ACCESSIBILITY
        if($this->session->userdata['designation'] !== 'Admin')
            redirect('login/four_zero_four', 'refresh');

        $this->load->model('Designation_Model');
    }


    public function index()
	{   
        $data['title']          =   'Employee Designations';
        $data['icon']		    =	$this->icon; 
        $data['designations'] 	=	$this->Designation_Model->get_designations();
        $this->load->view($this->path.'/designations', $data);
	}  


    public function add()
    {   
       
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['designation_title']          =   $this->input->post('designation_title');
            $data['designation_description']    =   $this->input->post('designation_description');
            $data['created_by']                 =   $this->session->userdata['id'];

            if($this->Designation_Model->add_designation($data))
            {
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('designation_added')));           
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }
                
            redirect('employees/designations', 'refresh');
        }
        
        $data['title']      =   'Add Employee Designation';
        $data['icon']       =   $this->icon; 
        $this->load->view($this->path.'/add-designation', $data);
    }  


	public function edit($id = '')
	{   
        
		if($this->input->server('REQUEST_METHOD') == 'POST')
        {
        	$data['designation_title']          =   $this->input->post('designation_title');
            $data['designation_description']    =   $this->input->post('designation_description');
	        $data['last_updated_by'] 	        =	$this->session->userdata['id'];
			$data['last_updated_at'] 	        =	date('Y-m-d H:i:s');

	    	if($this->Designation_Model->update_designation($id, $data))
        	{
            	$this->session->set_flashdata('notification', get_success_message($this->lang->line('designation_updated')));           
        	}
        	else
        	{
            	$this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        	}
                
        	redirect('employees/designations', 'refresh');
	    }
	    
        $data['title']          =   'Edit Employee Designation';
        $data['icon']		    =	$this->icon; 
        $data['designation']    =	$this->Designation_Model->get_designation_details($id);
        $this->load->view($this->path.'/add-designation', $data);
	}   


	public function delete($id = '')
	{  
        $data['status']				= 	'deleted';
        $data['last_updated_by'] 	=	$this->session->userdata['id'];
		$data['last_updated_at'] 	=	date('Y-m-d H:i:s');

    	if($this->Designation_Model->update_designation($id, $data))
    	{
        	$this->session->set_flashdata('notification', get_success_message($this->lang->line('designation_deleted')));           
    	}
    	else
    	{
        	$this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
    	}
                
        redirect('employees/designations', 'refresh');
	}  

	
	
}
