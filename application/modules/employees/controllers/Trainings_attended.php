<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Trainings_attended extends CI_Controller {
	
	private $icon = 'fa fa-users';
	private $path = 'trainings';
	
	function __construct()
    {
        parent::__construct();
        
        # CHECKS THE CONTROLLERS'S USER ACCESSIBILITY
        if($this->session->userdata['designation'] !== 'Admin')
            redirect('login/four_zero_four', 'refresh');

        $this->load->model('Employee_Model');
        $this->load->model('Training_Attended_Model');
    }


    public function index()
	{
        $data['title']                  =   'Employees Attended Trainings';
        $data['icon']		            =	$this->icon; 
        $data['trainings_attended'] 	=	$this->Training_Attended_Model->get_trainings_attended();
        $this->load->view($this->path.'/trainings-attended', $data);
	}    

 
    public function add()
	{
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['attended_by']            =      $this->input->post('attended_by');
            $data['training_name']          =      $this->input->post('training_name');
            $data['training_description']   =      $this->input->post('training_description');
            $data['training_location']      =      $this->input->post('training_location');
            $data['created_by']             =      $this->session->userdata['id'];
            
            if($this->Training_Attended_Model->add_training_attended($data))
            {
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('attended_training_added')));   
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }

            redirect('employees/trainings_attended', 'refresh');        
        }

        $data['title']          =   'Add Attended Training'; 
        $data['icon']           =   $this->icon; 
        $data['employees']      =   $this->Employee_Model->get_employees();
        $this->load->view($this->path.'/add-training-attended', $data);
    }

    
    function edit($training_id = '')
	{
		if(!is_numeric($training_id))
		{
			redirect('login/four_zero_four', 'refresh');
		}

        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['attended_by']            =      $this->input->post('attended_by');
            $data['training_name']          =      $this->input->post('training_name');
            $data['training_description']   =      $this->input->post('training_description');
            $data['training_location']      =      $this->input->post('training_location');
            $data['last_updated_by']        =      $this->session->userdata['id'];
            $data['last_updated_at'] 	    =	   date('Y-m-d H:i:s');
            
            if($this->Training_Attended_Model->update_training_attended($training_id, $data))
            {
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('attended_training_updated')));   
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }

            redirect('employees/trainings_attended', 'refresh');        
        }

        $data['title']          =   'Edit Attended Training'; 
        $data['icon']           =   $this->icon; 
        $data['training']       =   $this->Training_Attended_Model->get_training_attended_details($training_id);
        $data['employees']      =   $this->Employee_Model->get_employees();
        $this->load->view($this->path.'/add-training-attended', $data);
    } 

    
    public function delete($training_id = '')
    {
        if(!is_numeric($training_id))
        {
            redirect('login/four_zero_four', 'refresh');
        }
        
        $data['status']             =   "deleted";
        $data['last_updated_by']    =   $this->session->userdata['id'];
        $data['last_updated_at']    =   date('Y-m-d H:i:s');
        
        if($this->Training_Attended_Model->update_training_attended($id, $data))
        {
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('attended_training_deleted')));   
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }

        redirect('employees/trainings_attended', 'refresh');
    }
  
}
