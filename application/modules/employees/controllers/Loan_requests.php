<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Loan_requests extends CI_Controller {
	
	private $icon = 'fa fa-money';
    private $path = 'salary';
	
	function __construct()
    {
        parent::__construct();

        # CHECKS THE CONTROLLERS'S USER ACCESSIBILITY
        if($this->session->userdata['designation'] !== 'Admin')
            redirect('login/four_zero_four', 'refresh');

        $this->load->model('Employee_Model');
        $this->load->model('Loan_Request_Model');
    }


	public function index($status = '', $employee_id = '')
    {  
        $data['title']      =   'Loan Requests';
        $data['icon']       =   $this->icon; 
        $data['requests']   =   $this->Loan_Request_Model->get_loan_requests();
        $this->load->view($this->path.'/loan-requests', $data);
    }

    
    public function add()
    {  

        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['loan_description']     =      $this->input->post('loan_description');
            $data['loan_amount']          =      $this->input->post('loan_amount');
            $data['created_by']           =      $this->session->userdata['id'];
            $data['created_at'] 	      =	     date('Y-m-d H:i:s');
            
            if($this->Loan_Request_Model->add_loan_request($data))
            {
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('loan_request_added')));           
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }
                
        redirect('employees/loan_requests', 'refresh');      
          
        }
            
        $data['title']      =   'Add Loan Request';
        $data['icon']       =   $this->icon; 
        $this->load->view($this->path.'/add-loan-request', $data);
    }
    
    
    public function edit($request_id = '')
    {  
        
        if(!is_numeric($request_id))
		{
			redirect('login/four_zero_four', 'refresh');
		}
         
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['loan_description']     =      $this->input->post('loan_description');
            $data['loan_amount']          =      $this->input->post('loan_amount');
            $data['last_updated_by']      =      $this->session->userdata['id'];
            $data['last_updated_at'] 	  =	     date('Y-m-d H:i:s');
            
            if($this->Loan_Request_Model->update_loan_request($request_id,$data))
            {
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('loan_request_updated')));                      
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }
                
            redirect('employees/loan_requests', 'refresh');          
        }
            
        $data['title']      =   'Edit Pay Request';
        $data['icon']       =   $this->icon; 
        $data['request'] 	=	$this->Loan_Request_Model->get_loan_request_details($request_id);
        $this->load->view($this->path.'/add-loan-request', $data);
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
        
        if($this->Loan_Request_Model->update_loan_request($request_id, $data))
        {
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('loan_request_approved')));  
            $loan_request        =   $this->Loan_Request_Model->get_loan_request_details($request_id);

            # Notification Code Starts

            $notification['sender_id']      =   $this->session->userdata['id'];
            $notification['reciever_id']    =   $loan_request['employee_id'];
            $notification['text']           =   'Your Loan request has been approved by '.$this->session->userdata['name'].' ['.$this->session->userdata['designation'].'].';
            $notification['url']            =   'user/personal/loan_requests';

            $this->Notifications_Model->add_notification($notification);

            # Notification Code Ends    
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }

        redirect('employees/loan_requests', 'refresh');      
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
        
        if($this->Loan_Request_Model->update_loan_request($request_id, $data))
        {
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('loan_request_rejected')));   
            $loan_request        =   $this->Loan_Request_Model->get_loan_request_details($request_id);

            # Notification Code Starts

            $notification['sender_id']      =   $this->session->userdata['id'];
            $notification['reciever_id']    =   $loan_request['employee_id'];
            $notification['text']           =   'Your Loan request has been rejected by '.$this->session->userdata['name'].' ['.$this->session->userdata['designation'].'].';
            $notification['url']            =   'user/personal/loan_requests';

            $this->Notifications_Model->add_notification($notification);

            # Notification Code Ends    
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }

        redirect('employees/loan_requests', 'refresh');      
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
        
        if($this->Loan_Request_Model->update_loan_request($request_id, $data))
        {
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('loan_request_deleted')));   
            $loan_request        =   $this->Loan_Request_Model->get_loan_request_details($request_id);

            # Notification Code Starts

            $notification['sender_id']      =   $this->session->userdata['id'];
            $notification['reciever_id']    =   $loan_request['employee_id'];
            $notification['text']           =   'Your Loan request has been deleted by '.$this->session->userdata['name'].' ['.$this->session->userdata['designation'].'].';
            $notification['url']            =   'user/personal/loan_requests';

            $this->Notifications_Model->add_notification($notification);

            # Notification Code Ends    
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }

        redirect('employees/loan_requests', 'refresh');      
    }
    
    
}
