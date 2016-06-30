<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pay_requests extends CI_Controller {
	
	private $icon = 'fa fa-money';
    private $path = 'salary';
	
	function __construct()
    {
        parent::__construct();

        # CHECKS THE CONTROLLERS'S USER ACCESSIBILITY
        if($this->session->userdata['designation'] !== 'Admin')
            redirect('login/four_zero_four', 'refresh');

        $this->load->model('Employee_Model');
        $this->load->model('Pay_Request_Model');
    }


	public function index($status = '', $employee_id = '')
    {  
       
        $data['title']      =   'Advance Pay Requests';
        $data['icon']       =   $this->icon; 
        $data['requests']   =   $this->Pay_Request_Model->get_pay_requests();
        $this->load->view($this->path.'/advance-pay-requests', $data);
    }

    
    public function add()
    {  
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['request_description']    =      $this->input->post('request_description');
            $data['amount_requested']       =      $this->input->post('amount_requested');
            $data['created_by']             =      $this->session->userdata['id'];
            $data['created_at'] 	        =	   date('Y-m-d H:i:s');
            
            if($this->Pay_Request_Model->add_pay_request($data))
            {
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('pay_request_added')));           
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }
                
            redirect('employees/pay_requests', 'refresh');          
        }
            
        $data['title']      =   'Add Pay Request';
        $data['icon']       =   $this->icon; 
        $this->load->view($this->path.'/add-pay-request', $data);
    }
    
    
    public function edit($request_id = '')
    {  
        if(!is_numeric($request_id))
		{
			redirect('login/four_zero_four', 'refresh');
		}
         
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['request_description']    =      $this->input->post('request_description');
            $data['amount_requested']       =      $this->input->post('amount_requested');
            $data['last_updated_by']        =      $this->session->userdata['id'];
            $data['last_updated_at'] 	    =	     date('Y-m-d H:i:s');
            
            if($this->Pay_Request_Model->update_pay_request($request_id,$data))
            {
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('pay_request_updated')));          
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }
                
            redirect('employees/pay_requests', 'refresh');          
        }
            
        $data['title']      =   'Edit Pay Request';
        $data['icon']       =   $this->icon; 
        $data['request'] 	=	$this->Pay_Request_Model->get_pay_request_details($request_id);
        $this->load->view($this->path.'/add-pay-request', $data);
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
        
        if($this->Pay_Request_Model->update_pay_request($request_id, $data))
        {
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('pay_request_approved')));  
            $pay_request        =   $this->Pay_Request_Model->get_pay_request_details($request_id);

            # Notification Code Starts

            $notification['sender_id']      =   $this->session->userdata['id'];
            $notification['reciever_id']    =   $pay_request['employee_id'];
            $notification['text']           =   'Your Pay request has been approved by '.$this->session->userdata['name'].' ['.$this->session->userdata['designation'].'].';
            $notification['url']            =   'user/personal/advance_pay';

            $this->Notifications_Model->add_notification($notification);

            # Notification Code Ends   
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }

        redirect('employees/pay_requests', 'refresh');      
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
        
        if($this->Pay_Request_Model->update_pay_request($request_id, $data))
        {
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('pay_request_rejected')));   
            $pay_request        =   $this->Pay_Request_Model->get_pay_request_details($request_id);

            # Notification Code Starts

            $notification['sender_id']      =   $this->session->userdata['id'];
            $notification['reciever_id']    =   $pay_request['employee_id'];
            $notification['text']           =   'Your Pay request has been rejected by '.$this->session->userdata['name'].' ['.$this->session->userdata['designation'].'].';
            $notification['url']            =   'user/personal/advance_pay';

            $this->Notifications_Model->add_notification($notification);

            # Notification Code Ends   
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }

        redirect('employees/pay_requests', 'refresh');      
    }


    public function delete($request_id = '')
    { 
        if(!is_numeric($request_id))
        {
            redirect('login/four_zero_four', 'refresh');
        }
        
        $data['last_updated_by']    =   $this->session->userdata['id'];
        $data['last_updated_at']    =   date('Y-m-d H:i:s');
        $data['status']             =   "deleted";
        
        if($this->Pay_Request_Model->update_pay_request($request_id, $data))
        {
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('pay_request_deleted')));   
            $pay_request        =   $this->Pay_Request_Model->get_pay_request_details($request_id);

            # Notification Code Starts

            $notification['sender_id']      =   $this->session->userdata['id'];
            $notification['reciever_id']    =   $pay_request['employee_id'];
            $notification['text']           =   'Your Pay request has been deleted by '.$this->session->userdata['name'].' ['.$this->session->userdata['designation'].'].';
            $notification['url']            =   'user/personal/advance_pay';

            $this->Notifications_Model->add_notification($notification);

            # Notification Code Ends   
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }

        redirect('employees/pay_requests', 'refresh');      
    }

    
    
}
