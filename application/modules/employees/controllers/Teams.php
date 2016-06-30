<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Teams extends CI_Controller {

	
	private $icon  =   'fa fa-sitemap';
	private $path  =   'teams';

	
	function __construct()
    {
        parent::__construct();

        # CHECKS THE CONTROLLERS'S USER ACCESSIBILITY
        if($this->session->userdata['designation'] !== 'Admin')
            redirect('login/four_zero_four', 'refresh');

        $this->load->model('Team_Model');
        $this->load->model('Employee_Model');
        //$this->load->model('Office_Model');
    }


    public function index()
	{   
        $data['title']      =   'Employees Hierarchy';
        $data['icon']		=	$this->icon; 
        $data['teams'] 	    =	$this->Team_Model->get_teams();
        $this->load->view($this->path.'/teams', $data);
	}  


    public function add()
    {         

        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['team_name']      =   $this->input->post('team_name');
            $data['team_leader']    =   $this->input->post('team_leader');
            $data['team_members']   =   implode(',', $this->input->post('team_members'));
            $data['created_by']     =   $this->session->userdata['id'];

            if($this->Team_Model->add_team($data))
            {
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('team_added')));           
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }
                
            redirect('employees/teams', 'refresh');
        }
        
        $data['title']          =   'Add Team';
        $data['icon']           =   $this->icon; 
        $data['employees']      =   $this->Employee_Model->get_employees();        
        $this->load->view($this->path.'/add-team', $data);
    }  


	public function edit($team_id = '')
	{   
        if(!is_numeric($team_id))
        {
            redirect('login/four_zero_four', 'refresh');
        }
        
		if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['team_name']          =   $this->input->post('team_name');
            $data['team_leader']        =   $this->input->post('team_leader');
            $data['team_members']       =   implode(',', $this->input->post('team_members'));
	        $data['last_updated_by']    =	$this->session->userdata['id'];
			$data['last_updated_at']    =	date('Y-m-d H:i:s');

	    	if($this->Team_Model->update_team($team_id, $data))
        	{
            	$this->session->set_flashdata('notification', get_success_message($this->lang->line('team_updated')));           
        	}
        	else
        	{
            	$this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        	}
                
        	redirect('employees/teams', 'refresh');
	    }
	    
        $data['title']          =   'Edit Team';
        $data['icon']		    =	$this->icon; 
        $data['employees']      =   $this->Employee_Model->get_employees();  
        $data['team']           =   $this->Team_Model->get_team_details($team_id);      
        $this->load->view($this->path.'/add-team', $data);
	}   


	public function delete($team_id = '')
	{  
        if(!is_numeric($team_id))
        {
            redirect('login/four_zero_four', 'refresh');
        }

        $data['status']				= 	'deleted';
        $data['last_updated_by'] 	=	$this->session->userdata['id'];
		$data['last_updated_at'] 	=	date('Y-m-d H:i:s');

    	if($this->Team_Model->update_team($team_id, $data))
        {
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('team_deleted')));           
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }
            
        redirect('employees/teams', 'refresh');
	}  

	
	
}