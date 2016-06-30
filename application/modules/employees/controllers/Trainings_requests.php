<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Trainings_requests extends CI_Controller {
	
	private $icon = 'fa fa-users';
	private $path = 'trainings';
	
	function __construct()
    {
        parent::__construct();
        
        # CHECKS THE CONTROLLERS'S USER ACCESSIBILITY
        if($this->session->userdata['designation'] !== 'Admin')
            redirect('login/four_zero_four', 'refresh');
            
        $this->load->model('Employee_Model');
        $this->load->model('Training_Request_Model');
    }


    public function index()
	{
        $data['title']                  =   'Training Requests';
        $data['icon']                   =   $this->icon; 
        $data['trainings_requested']    =   $this->Training_Request_Model->get_trainings_requested();
        $this->load->view($this->path.'/training-requests', $data);
	} 
  
    public function add()
	{
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['training_title']         =   $this->input->post('training_title');
            $data['training_description']   =   $this->input->post('training_description');
            $data['training_country']       =   $this->input->post('country');
            $data['training_state']         =   $this->input->post('state');
            $data['training_city']          =   $this->input->post('city');
            $data['training_start']         =   date('Y-m-d', strtotime($this->input->post('training_start')));
            $data['training_end']           =   date('Y-m-d', strtotime($this->input->post('training_end')));
            $data['requested_by']           =   $this->session->userdata['id'];
            
            if($this->Training_Request_Model->add_training_request($data))
            {
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('training_request_added')));   
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }

            redirect('employees/trainings_requests', 'refresh');        
        }

        $data['title']          =   'Add Training Request'; 
        $data['icon']           =   $this->icon; 
        $data['employees']      =   $this->Employee_Model->get_employees();
        $this->load->view($this->path.'/request-training', $data);
    }

    
    function edit($training_id = '')
	{
		if(!is_numeric($training_id))
		{
			redirect('login/four_zero_four', 'refresh');
		}

        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['training_title']         =   $this->input->post('training_title');
            $data['training_description']   =   $this->input->post('training_description');
            $data['training_country']       =   $this->input->post('country');
            $data['training_state']         =   $this->input->post('state');
            $data['training_city']          =   $this->input->post('city');
            $data['training_start']         =   date('Y-m-d', strtotime($this->input->post('training_start')));
            $data['training_end']           =   date('Y-m-d', strtotime($this->input->post('training_end')));
            $data['last_updated_by']        =   $this->session->userdata['id'];
            $data['last_updated_at'] 	    =   date('Y-m-d H:i:s');
            
            if($this->Training_Request_Model->update_training_request($training_id, $data))
            {
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('training_request_updated')));   
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }

            redirect('employees/trainings_requests', 'refresh');        
        }
        
        $data['title']      =   'Edit Training Request'; 
        $data['icon']       =   $this->icon; 
        $data['training']   =   $this->Training_Request_Model->get_training_request_details($training_id);
        $data['employees']  =   $this->Employee_Model->get_employees();
        $this->load->view($this->path.'/request-training', $data);
    } 


    public function approve($request_id = '')
    {
        if(!is_numeric($request_id))
        {
            redirect('login/four_zero_four', 'refresh');
        }
        
        $data['last_updated_by']    =   $this->session->userdata['id'];
        $data['last_updated_at']    =   date('Y-m-d H:i:s');
        $data['status']             =   "approved";
        $data['approved_by']        =   $this->session->userdata['id'];
        
        if($this->Training_Request_Model->update_training_request($request_id, $data))
        {
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('training_request_approved')));   
            $training        =   $this->Training_Request_Model->get_training_request_details($request_id);

            # Notification Code Starts

            $notification['sender_id']      =   $this->session->userdata['id'];
            $notification['reciever_id']    =   $training['requested_by'];
            $notification['text']           =   'Your Training request has been approved by '.$this->session->userdata['name'].' ['.$this->session->userdata['designation'].'].';
            $notification['url']            =   'user/personal/trainings';

            $this->Notifications_Model->add_notification($notification);

            # Notification Code Ends  
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }

        redirect('employees/trainings_requests', 'refresh');
    }


    public function reject($request_id = '')
    {
        if(!is_numeric($request_id))
        {
            redirect('login/four_zero_four', 'refresh');
        }
        
        $data['last_updated_by']    =   $this->session->userdata['id'];
        $data['last_updated_at']    =   date('Y-m-d H:i:s');
        $data['status']             =   "rejected";
        $data['rejected_by']        =   $this->session->userdata['id'];
        
        if($this->Training_Request_Model->update_training_request($request_id, $data))
        {
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('training_request_rejected')));   
            $training        =   $this->Training_Request_Model->get_training_request_details($request_id);

            # Notification Code Starts

            $notification['sender_id']      =   $this->session->userdata['id'];
            $notification['reciever_id']    =   $training['requested_by'];
            $notification['text']           =   'Your Training request has been rejected by '.$this->session->userdata['name'].' ['.$this->session->userdata['designation'].'].';
            $notification['url']            =   'user/personal/trainings';

            $this->Notifications_Model->add_notification($notification);

            # Notification Code Ends  
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }

        redirect('employees/trainings_requests', 'refresh');
    }


    public function attended($request_id = '')
    {
        if(!is_numeric($request_id))
        {
            redirect('login/four_zero_four', 'refresh');
        }
        
        $data['last_updated_by']    =   $this->session->userdata['id'];
        $data['last_updated_at']    =   date('Y-m-d H:i:s');
        $data['status']             =   "attended";
        $data['rejected_by']        =   $this->session->userdata['id'];
        
        if($this->Training_Request_Model->update_training_request($request_id, $data))
        {
            $this->load->model('Training_Attended_Model');
            
            $training   =   $this->Training_Request_Model->get_training_request_details($request_id);
            
            $training_data['training_title']            =   $training['training_title'];
            $training_data['training_description']      =   $training['training_description'];
            $training_data['training_country']          =   $training['training_country'];
            $training_data['training_state']            =   $training['training_state'];
            $training_data['training_city']             =   $training['training_city'];
            $training_data['training_start']            =   $training['training_start'];
            $training_data['training_end']              =   $training['training_end'];
            $training_data['attended_by']               =   $training['requested_by'];
            $training_data['recommended_requested_by']  =   $training['requested_by'];
            $training_data['created_by']                =   $this->session->userdata['id'];
            
            $this->Training_Attended_Model->add_training_attended($training_data);

            $this->session->set_flashdata('notification', get_success_message($this->lang->line('training_request_updated')));   
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }

        redirect('employees/trainings_requests', 'refresh');
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
        
        if($this->Training_Request_Model->update_training_request($training_id, $data))
        {
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('training_request_deleted')));   
            $training        =   $this->Training_Request_Model->get_training_request_details($request_id);

            # Notification Code Starts

            $notification['sender_id']      =   $this->session->userdata['id'];
            $notification['reciever_id']    =   $training['requested_by'];
            $notification['text']           =   'Your Training request has been deleted by '.$this->session->userdata['name'].' ['.$this->session->userdata['designation'].'].';
            $notification['url']            =   'user/personal/trainings';

            $this->Notifications_Model->add_notification($notification);

            # Notification Code Ends  
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }

        redirect('employees/trainings_requests', 'refresh');        
    }
  
}
