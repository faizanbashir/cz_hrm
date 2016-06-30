<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Leaves extends CI_Controller {
	
	private $icon = 'fa fa-users';
    private $path = 'leaves';
	
	function __construct()
    {
        parent::__construct();

        # CHECKS THE CONTROLLERS'S USER ACCESSIBILITY
        if($this->session->userdata['designation'] !== 'Admin')
            redirect('login/four_zero_four', 'refresh');

        $this->load->model('Leave_Model');
        $this->load->model('Employee_Model');
    }

	public function index($status = '', $employee_id = '')
    { 

        $data['title']      =   'View Leaves';
        $data['icon']       =   $this->icon; 
        $data['leaves']     =   $this->Leave_Model->get_leaves();
        $this->load->view($this->path.'/employees-leaves', $data);
    }
    
    public function add()
    {  

        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['leave_name']           =      $this->input->post('leave_name');
            $data['leave_description']    =      $this->input->post('leave_description');
            $data['yearly_leaves']        =      $this->input->post('yearly_leaves');
            $data['created_by']           =      $this->session->userdata['id'];
            $data['created_at'] 	      =	     date('Y-m-d H:i:s');
            
            if($this->Leave_Model->add_leave($data))
            {
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('leave_added')));           
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }
                
            redirect('employees/leaves', 'refresh');          
        }
            
        $data['title']      =   'Add Leaves';
        $data['icon']       =   $this->icon; 
        $this->load->view($this->path.'/add-leave', $data);
    }
    
    
    public function edit($leave_id = '')
    {  

        if(!is_numeric($leave_id))
		{
			redirect('login/four_zero_four', 'refresh');
		}
         
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['leave_name']           =      $this->input->post('leave_name');
            $data['leave_description']    =      $this->input->post('leave_description');
            $data['yearly_leaves']        =      $this->input->post('yearly_leaves');
            $data['last_updated_by']      =      $this->session->userdata['id'];
            $data['last_updated_at'] 	  =	     date('Y-m-d H:i:s');
            
            if($this->Leave_Model->update_leave($leave_id,$data))
            {
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('leave_updated')));   
                   
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }
                
            redirect('employees/leaves', 'refresh');          
        }
            
        $data['title']      =   'Edit Leave';
        $data['icon']       =   $this->icon; 
        $data['leave'] 		=	$this->Leave_Model->get_leave_details($leave_id);
        $this->load->view($this->path.'/add-leave', $data);
    }
    
    
    public function delete($leave_id = '')
    {
       
        if(!is_numeric($leave_id))
        {
            redirect('login/four_zero_four', 'refresh');
        }
        
        $data['last_updated_by']    =   $this->session->userdata['id'];
        $data['last_updated_at']    =   date('Y-m-d H:i:s');
        $data['status']             =   "deleted";
        
        if($this->Leave_Model->update_leave($leave_id, $data))
        {
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('leave_deleted')));   
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }

        redirect('employees/leaves', 'refresh');
    }


    public function employee_leaves($employee_id='')
    {
        
        $data['title']              =   'View Employee Leaves';
        $data['icon']               =   $this->icon; 
        $data['employee_leaves']    =   $this->Leave_Model->get_employee_leaves($employee_id);
        $data['employees']          =   $this->Employee_Model->get_employees();
        $this->load->view($this->path.'/employee-leaves', $data);
    }

    
    public function edit_leave($id = '')
    {  
       
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['leave_id']           =       $this->input->post('leave_id');
            $data['leave_from']         =       date('Y-m-d', strtotime($this->input->post('leave_from')));
            $data['leave_to']           =       date('Y-m-d', strtotime($this->input->post('leave_to')));
            $data['subject']            =       $this->input->post('subject');
            $data['leave_description']  =       $this->input->post('leave_description');
            $data['last_updated_by']    =       $this->session->userdata['id'];
            $data['last_updated_at']    =       date('Y-m-d H:i:s');

            if($this->Leave_Model->update($id, $data))
            {
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('leave_request_updated')));   
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }

            redirect('employees/leaves/employee_leaves', 'refresh');        
        }

        $data['title']      =   'Edit Leave';
        $data['icon']       =   $this->icon;
        $data['leaves']     =   $this->Leave_Model->get_leaves();
        $data['leave']      =   $this->Leave_Model->get_employee_leave_details($id);
        $this->load->view('user/request-leave', $data); 
    }


    public function approve($id = '')
    {
       
        if(!is_numeric($id))
        {
            redirect('login/four_zero_four', 'refresh');
        }
        
        $data['last_updated_by']    =   $this->session->userdata['id'];
        $data['last_updated_at']    =   date('Y-m-d H:i:s');
        $data['status']             =   "approved";
        $data['approved_by']        =   $this->session->userdata['id'];
        
        if($this->Leave_Model->update($id, $data))
        {
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('leave_request_approved')));  

            $leave_details  =    $this->Leave_Model->get_employee_leave_details($id);

            # Notification Code Starts

            $notification['sender_id']      =   $this->session->userdata['id'];
            $notification['reciever_id']    =   $leave_details['employee_id'];
            $notification['text']           =   'Your Leave request has been approved by '.$this->session->userdata['name'].' ['.$this->session->userdata['designation'].'].';
            $notification['url']            =   'user/personal/leaves';

            $this->Notifications_Model->add_notification($notification);

            # Notification Code Ends 
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }

        redirect('employees/leaves/employee_leaves', 'refresh');
    }


    public function reject($id = '')
    {
        
        if(!is_numeric($id))
        {
            redirect('login/four_zero_four', 'refresh');
        }
        
        $data['last_updated_by']    =   $this->session->userdata['id'];
        $data['last_updated_at']    =   date('Y-m-d H:i:s');
        $data['status']             =   "rejected";
        $data['rejected_by']        =   $this->session->userdata['id'];
        
        if($this->Leave_Model->update($id, $data))
        {
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('leave_request_rejected')));   

             $leave_details  =    $this->Leave_Model->get_employee_leave_details($id);
            # Notification Code Starts

            $notification['sender_id']      =   $this->session->userdata['id'];
            $notification['reciever_id']    =   $leave_details['employee_id'];
            $notification['text']           =   'Your Leave request has been reject by '.$this->session->userdata['name'].' ['.$this->session->userdata['designation'].'].';
            $notification['url']            =   'user/personal/leaves';

            $this->Notifications_Model->add_notification($notification);

            # Notification Code Ends 
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }

        redirect('employees/leaves/employee_leaves', 'refresh');
    }

   
    public function delete_leave($id = '')
    {
       
        if(!is_numeric($id))
        {
            redirect('login/four_zero_four', 'refresh');
        }
        
        $data['status']             =   "deleted";
        $data['last_updated_by']    =   $this->session->userdata['id'];
        $data['last_updated_at']    =   date('Y-m-d H:i:s');
        
        if($this->Leave_Model->update($id, $data))
        {
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('leave_request_deleted')));  
             $leave_details  =    $this->Leave_Model->get_employee_leave_details($id);
            # Notification Code Starts

            $notification['sender_id']      =   $this->session->userdata['id'];
            $notification['reciever_id']    =   $leave_details['employee_id'];
            $notification['text']           =   'Your Leave request has been reject by '.$this->session->userdata['name'].' ['.$this->session->userdata['designation'].'].';
            $notification['url']            =   'user/personal/leaves';

            $this->Notifications_Model->add_notification($notification);

            # Notification Code Ends
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }

        redirect('employees/leaves/employee_leaves', 'refresh');
    }
    
    
}
