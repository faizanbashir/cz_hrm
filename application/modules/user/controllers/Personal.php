<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Personal extends CI_Controller {
	
	private $icon = 'fa fa-users';
	
	function __construct()
    {
        parent::__construct();

        if(!isset($this->session->userdata['id']))
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('not_loggedin_msg')));   
            redirect('/', 'refresh');
        }

        $this->load->model('employees/Employee_Model');
        $this->load->model('employees/Leave_Model');
        $this->load->model('employees/Training_Request_Model');
        $this->load->model('employees/Attendance_Model');   
        $this->load->model('employees/Pay_Request_Model');
        $this->load->model('employees/Loan_Request_Model');
        $this->load->model('employees/Questionnaire_Model');     
        $this->load->model('Evaluation_Model');
    }


    public function leaves($employee_id = '')
    {
        $data['title']                  =       'Leaves';  
         $data['icon']                  =       $this->icon;      
        $data['employee_leaves']        =       $this->Leave_Model->get_employee_leaves($this->session->userdata['id']);
        $this->load->view('my-leaves', $data);
    }


    public function request_leave()
    {  
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['leave_id']           =       $this->input->post('leave_id');
            $data['employee_id']        =       $this->session->userdata['id'];
            $data['leave_from']         =       date('Y-m-d', strtotime($this->input->post('leave_from')));
            $data['leave_to']           =       date('Y-m-d', strtotime($this->input->post('leave_to')));
            $data['day']                =       date('Y-m-d', strtotime($this->input->post('day')));
            $data['subject']            =       $this->input->post('subject');
            $data['leave_description']  =       $this->input->post('leave_description');
            $data['created_by']         =       $this->session->userdata['id'];
            $data['created_at']         =       date('Y-m-d H:i:s');

            
            if($this->Leave_Model->request($data))
            {
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('leave_request_added')));   
                
                $recievers        =   $this->Notifications_Model->get_notification_recievers('leaves');

                # Notification Code Starts

                foreach($recievers as $reciever)
                {
                    $notification['sender_id']      =   $this->session->userdata['id'];
                    $notification['reciever_id']    =   $reciever['id'];
                    $notification['text']           =   'Leave has been requested by '.$this->session->userdata['name'].' ['.$this->session->userdata['designation'].'].';
                    $notification['url']            =   'employees/leaves/employee_leaves';

                    $this->Notifications_Model->add_notification($notification);
                }
                
                # Notification Code Ends    
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }
            
            redirect('user/personal/leaves', 'refresh');
        }

        $data['title']      =   'Request Leave';
        $data['icon']       =   $this->icon;
        $data['leaves']     =   $this->Leave_Model->get_leaves(); 
        $this->load->view('request-leave', $data); 
    }


    public function trainings($employee_id = '')
    {
        $data['title']                      =   'Training Requests';  
        $data['icon']                       =   $this->icon;      
        $data['trainings_requested']        =   $this->Training_Request_Model->get_trainings_requested($this->session->userdata['id']);
        $this->load->view('training-requests', $data);
    }


    public function request_training()
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

                $recievers        =   $this->Notifications_Model->get_notification_recievers('trainings');

                # Notification Code Starts

                foreach($recievers as $reciever)
                {
                    $notification['sender_id']      =   $this->session->userdata['id'];
                    $notification['reciever_id']    =   $reciever['id'];
                    $notification['text']           =   'Training has been requested by '.$this->session->userdata['name'].' ['.$this->session->userdata['designation'].'].';
                    $notification['url']            =   'employees/trainings_requests';

                    $this->Notifications_Model->add_notification($notification);
                }
                
                # Notification Code Ends   
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }

            redirect('user/personal/trainings', 'refresh');        
        }

        $data['title']          =   'Add Training Request'; 
        $data['icon']           =   $this->icon; 
        $data['employees']      =   $this->Employee_Model->get_employees();
        $this->load->view('request-training', $data);
    }


    public function late_sitting($employee_id = '')
    {
        $data['title']          =   'Late Sittings';  
        $data['icon']           =   $this->icon;      
        $data['extra']          =   $this->Attendance_Model->get_extra_hours($this->session->userdata['id']);
        $this->load->view('late-sittings', $data);
    }


    public function request_late_sitting()
    {   
        
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['date']           =   date('Y-m-d', strtotime($this->input->post('date')));
            $data['hours']          =   $this->input->post('hours');
            $data['employee_id']    =   $this->session->userdata['id'];
            $data['created_by']     =   $this->session->userdata['id'];
            
            if($this->Attendance_Model->request_extra_hours($data))
            {
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('extra_hours_added')));   

                $recievers        =   $this->Notifications_Model->get_notification_recievers('attendance');

                # Notification Code Starts

                foreach($recievers as $reciever)
                {
                    $notification['sender_id']      =   $this->session->userdata['id'];
                    $notification['reciever_id']    =   $reciever['id'];
                    $notification['text']           =   'Extra Hours has been requested by '.$this->session->userdata['name'].' ['.$this->session->userdata['designation'].'].';
                    $notification['url']            =   'employees/attendance/extra_hours';

                    $this->Notifications_Model->add_notification($notification);
                }
                
                # Notification Code Ends           
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }
                    
            redirect('user/personal/late_sitting', 'refresh');    
        }  

        $data['title']      =   'Request Extra Hours';
        $data['icon']       =   $this->icon;
        $this->load->view('request-late-sitting', $data);
    }


    public function off_days($employee_id = '')
    {
        $data['title']      =   'Off Days';  
        $data['icon']       =   $this->icon;      
        $data['days']       =   $this->Attendance_Model->get_off_days($this->session->userdata['id']);
        $this->load->view('off-days', $data);
    }


    public function request_off_day()
    {   
       
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['date']           =   date('Y-m-d', strtotime($this->input->post('date')));
            $data['employee_id']    =   $this->session->userdata['id'];
            $data['created_by']     =   $this->session->userdata['id'];
            
            if($this->Attendance_Model->request_of_day($data))
            {
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('off_day_added')));  

                $recievers        =   $this->Notifications_Model->get_notification_recievers('attendance');

                # Notification Code Starts

                foreach($recievers as $reciever)
                {
                    $notification['sender_id']      =   $this->session->userdata['id'];
                    $notification['reciever_id']    =   $reciever['id'];
                    $notification['text']           =   'Off Day has been requested by '.$this->session->userdata['name'].' ['.$this->session->userdata['designation'].'].';
                    $notification['url']            =   'employees/attendance/off_days';

                    $this->Notifications_Model->add_notification($notification);
                }
                
                # Notification Code Ends         
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }
                    
            redirect('user/personal/off_days', 'refresh'); 
        }  

        $data['title']      =   'Request Off Day';
        $data['icon']       =   $this->icon;
        $this->load->view('request-off-day', $data);
    }


    public function missing_time($employee_id = '')
    {   

        $data['title']      =   'Missing Time-In/Time-Out';
        $data['icon']       =   $this->icon;
        $data['time']       =   $this->Attendance_Model->get_missing_time($this->session->userdata['id']);
        $this->load->view('missing-time', $data);
    }

    
    public function request_missing_time()
    {  
       
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['date']           =   date('Y-m-d', strtotime($this->input->post('date')));
            $data['missed']         =   $this->input->post('time');
            $data['employee_id']    =   $this->session->userdata['id'];
            $data['created_by']     =   $this->session->userdata['id'];
            
            if($this->Attendance_Model->request_missing($data))
            {
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('missing_time_added')));   
                $recievers        =   $this->Notifications_Model->get_notification_recievers('attendance');

                # Notification Code Starts

                foreach($recievers as $reciever)
                {
                    $notification['sender_id']      =   $this->session->userdata['id'];
                    $notification['reciever_id']    =   $reciever['id'];
                    $notification['text']           =   'Missing time has been requested by '.$this->session->userdata['name'].' ['.$this->session->userdata['designation'].'].';
                    $notification['url']            =   'employees/attendance/missing_time';

                    $this->Notifications_Model->add_notification($notification);
                }
                
                # Notification Code Ends        
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }
                    
            redirect('user/personal/missing_time', 'refresh'); 
        }  
        
        $data['title']      =   'Request Missing Time-In/Time-Out';
        $data['icon']       =   $this->icon;
        $this->load->view('request-missing-time', $data);
    }


    public function advance_pay()
    {  
       
        $data['title']      =   'Advance Pay Requests';
        $data['icon']       =   $this->icon; 
        $data['requests']   =   $this->Pay_Request_Model->get_pay_requests($this->session->userdata['id']);
        $this->load->view('advance-pay-requests', $data);
    } 


    public function request_advance_pay()
    {  
    
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['request_description']    =      $this->input->post('request_description');
            $data['amount_requested']       =      $this->input->post('amount_requested');
            $data['created_by']             =      $this->session->userdata['id'];
            $data['created_at']             =      date('Y-m-d H:i:s');
            
            if($this->Pay_Request_Model->add_pay_request($data))
            {
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('pay_request_added')));      
                $recievers        =   $this->Notifications_Model->get_notification_recievers('salary');

                # Notification Code Starts

                foreach($recievers as $reciever)
                {
                    $notification['sender_id']      =   $this->session->userdata['id'];
                    $notification['reciever_id']    =   $reciever['id'];
                    $notification['text']           =   'Advance Pay has been requested by '.$this->session->userdata['name'].' ['.$this->session->userdata['designation'].'].';
                    $notification['url']            =   'employees/pay_requests';

                    $this->Notifications_Model->add_notification($notification);
                }
                
                # Notification Code Ends             
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }
                
            redirect('user/personal/advance_pay', 'refresh');          
        }
            
        $data['title']      =   'Add Pay Request';
        $data['icon']       =   $this->icon; 
        $this->load->view('add-pay-request', $data);
    } 


    public function loan_requests()
    {  
       
        $data['title']      =   'Loan Requests';
        $data['icon']       =   $this->icon; 
        $data['requests']   =   $this->Loan_Request_Model->get_loan_requests();
        $this->load->view('loan-requests', $data);
    }


    public function request_loan()
    {  
       
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['loan_description']     =      $this->input->post('loan_description');
            $data['loan_amount']          =      $this->input->post('loan_amount');
            $data['created_by']           =      $this->session->userdata['id'];
            $data['created_at']           =      date('Y-m-d H:i:s');
            
            if($this->Loan_Request_Model->add_loan_request($data))
            {
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('loan_request_added')));    

                $recievers        =   $this->Notifications_Model->get_notification_recievers('salary');

                # Notification Code Starts

                foreach($recievers as $reciever)
                {
                    $notification['sender_id']      =   $this->session->userdata['id'];
                    $notification['reciever_id']    =   $reciever['id'];
                    $notification['text']           =   'Loan has been requested by '.$this->session->userdata['name'].' ['.$this->session->userdata['designation'].'].';
                    $notification['url']            =   'employees/loan_requests';

                    $this->Notifications_Model->add_notification($notification);
                }
                
                # Notification Code Ends        
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }
                
            redirect('user/personal/loan_requests', 'refresh');      
          
        }
            
        $data['title']      =   'Add Loan Request';
        $data['icon']       =   $this->icon; 
        $this->load->view('add-loan-request', $data);
    }


    public function evaluation()
    {
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {            
            $question_id            =   $this->input->post('question_id');
            $question_description   =   $this->input->post('question_description');
            $employee_rating        =   $this->input->post('employee_rating');
            $data['employee_id']    =   $this->session->userdata['id'];
            $data['created_at']     =   date('Y-m-d H:i:s');

            foreach($question_id as $key => $value)
            {
                $data['question_id']            =   $value;
                $data['question_description']   =   $question_description[$key];
                $data['employee_rating']        =   $employee_rating[$key];
                
                $this->Evaluation_Model->add_question($data);
            }

            $this->session->set_flashdata('notification', get_success_message($this->lang->line('evaluation_recieved')));   
            redirect('dashboard', 'refresh');   
        }

        $data['title']      =   'Questionnarie';
        $data['icon']       =   $this->icon; 
        $data['questions']  =   $this->Questionnaire_Model->get_questions();
        $this->load->view('evaluation-questionnaire', $data);
    }

    
}
