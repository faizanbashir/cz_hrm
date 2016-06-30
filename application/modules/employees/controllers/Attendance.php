<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends CI_Controller {
	
	
    private $icon   =  'fa fa-users';
	private $path   =  'attendance';

	
	function __construct()
    {   
        parent::__construct();

        # CHECKS THE CONTROLLERS'S USER ACCESSIBILITY
        if($this->session->userdata['designation'] !== 'Admin')
            redirect('login/four_zero_four', 'refresh');

        $this->load->library('session');
        $this->load->model('Attendance_Model');
        $this->load->model('settings/Settings_Model');
        $this->load->library('user_agent');
    }


    public function index($date = '')
	{  
        
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {            
            $date   =   date('Y-m-d', strtotime($this->input->post('date')));
        }

        $data['title']      =   'Employees Attendance';
        $data['icon']	    =	$this->icon;
        $data['login']      =   $this->Attendance_Model->get_logins($date); 
        $this->load->view($this->path.'/attendance', $data);
	}     


    public function update_login($login_id = '')
    {   
        
        $data['logged_in_at']       =   date('Y-m-d H:i:s', strtotime($this->input->post('time_in'))); 
        $data['logged_out_at']      =   date('Y-m-d H:i:s', strtotime($this->input->post('time_out'))); 
        $data['last_updated_by']    =   $this->session->userdata['id'];
        $data['last_updated_at']    =   date('Y-m-d H:i:s');

        if($this->Attendance_Model->update_login($login_id, $data))
        {
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('attendance_updated')));           
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }
        
        redirect('employees/attendance/index/'.$this->input->post('attendance_date'), 'refresh');
    }    


    public function extra_hours()
    {   
        
        $data['title']          =   'Employees Extra Hours';
        $data['icon']           =   $this->icon;
        $data['extra']          =   $this->Attendance_Model->get_extra_hours();
        $this->load->view($this->path.'/extra-hours', $data);
    }


    public function edit_extra_hours($id='')
    {   
        
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['date']               =   date('Y-m-d', strtotime($this->input->post('date')));
            $data['hours']              =   $this->input->post('hours');
            $data['last_updated_by']    =   $this->session->userdata['id'];
            $data['last_updated_at']    =   date('Y-m-d H:i:s');
            
            if($this->Attendance_Model->update_extra_hours($id, $data))
            {
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('extra_hours_updated')));           
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }
                    
            redirect('employees/attendance/extra_hours', 'refresh');
        } 

        $data['title']          =   'Edit Extra Hours';
        $data['icon']           =   $this->icon;
        $data['extra']          =   $this->Attendance_Model->extra_hours_details($id);
        $this->load->view('user/request-late-sitting', $data);
    }


    public function approve_extra_hours($id = '')
    {   
       
        if(!is_numeric($id))
        {
            redirect('login/four_zero_four', 'refresh');
        }
        
        $data['last_updated_by']    =   $this->session->userdata['id'];
        $data['last_updated_at']    =   date('Y-m-d H:i:s');
        $data['status']             =   "approved";
        $data['approved_by']        =   $this->session->userdata['id'];
        
        if($this->Attendance_Model->update_extra_hours($id, $data))
        {
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('extra_hours_approved')));   
            $extra_hours    =   $this->Attendance_Model->extra_hours_details($id);

            # Notification Code Starts

            $notification['sender_id']      =   $this->session->userdata['id'];
            $notification['reciever_id']    =   $extra_hours['employee_id'];
            $notification['text']           =   'Your Extra Hours request has been approved by '.$this->session->userdata['name'].' ['.$this->session->userdata['designation'].'].';
            $notification['url']            =   'user/personal/late_sitting';

            $this->Notifications_Model->add_notification($notification);

            # Notification Code Ends 

        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }

        redirect('employees/attendance/extra_hours', 'refresh');
    }


    public function reject_extra_hours($id = '')
    {   
       
        if(!is_numeric($id))
        {
            redirect('login/four_zero_four', 'refresh');
        }
        
        $data['last_updated_by']    =   $this->session->userdata['id'];
        $data['last_updated_at']    =   date('Y-m-d H:i:s');
        $data['status']             =   "rejected";
        $data['rejected_by']        =   $this->session->userdata['id'];
        
        if($this->Attendance_Model->update_extra_hours($id, $data))
        {
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('extra_hours_rejected')));   
            $extra_hours    =   $this->Attendance_Model->extra_hours_details($id);

            # Notification Code Starts

            $notification['sender_id']      =   $this->session->userdata['id'];
            $notification['reciever_id']    =   $extra_hours['employee_id'];
            $notification['text']           =   'Your Extra Hours request has been rejected by '.$this->session->userdata['name'].' ['.$this->session->userdata['designation'].'].';
            $notification['url']            =   'user/personal/late_sitting';

            $this->Notifications_Model->add_notification($notification);

            # Notification Code Ends 
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }

        redirect('employees/attendance/extra_hours', 'refresh');
    }

   
    public function delete_extra_hours($id = '')
    {   
        
        if(!is_numeric($id))
        {
            redirect('login/four_zero_four', 'refresh');
        }
        
        $data['status']             =   "deleted";
        $data['last_updated_by']    =   $this->session->userdata['id'];
        $data['last_updated_at']    =   date('Y-m-d H:i:s');
        
        if($this->Attendance_Model->update_extra_hours($id, $data))
        {
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('extra_hours_deleted')));   
            $extra_hours    =   $this->Attendance_Model->extra_hours_details($id);

            # Notification Code Starts

            $notification['sender_id']      =   $this->session->userdata['id'];
            $notification['reciever_id']    =   $extra_hours['employee_id'];
            $notification['text']           =   'Your Extra Hours request has been deleted by '.$this->session->userdata['name'].' ['.$this->session->userdata['designation'].'].';
            $notification['url']            =   'user/personal/late_sitting';

            $this->Notifications_Model->add_notification($notification);

            # Notification Code Ends 
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }

        redirect('employees/attendance/extra_hours', 'refresh');
    }


    public function off_days()
    {  
       
        $data['title']          =   'Employees Off Days';
        $data['icon']           =   $this->icon;
        $data['days']           =   $this->Attendance_Model->get_off_days();
        $this->load->view($this->path.'/off-days', $data);
    }


    public function edit_off_day($id='')
    {   
        
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['date']               =   date('Y-m-d', strtotime($this->input->post('date')));
            $data['last_updated_by']    =   $this->session->userdata['id'];
            $data['last_updated_at']    =   date('Y-m-d H:i:s');
            
            if($this->Attendance_Model->update_of_day($id, $data))
            {
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('off_day_updated')));           
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }
                    
            redirect('employees/attendance/off_days', 'refresh');
        }  

        $data['title']      =   'Edit Off Day';
        $data['icon']       =   $this->icon;
        $data['day']        =   $this->Attendance_Model->off_day_details($id);
        $this->load->view('user/request-off-day', $data);
    }


    public function approve_off_day($id = '')
    {
        
        if(!is_numeric($id))
        {
            redirect('login/four_zero_four', 'refresh');
        }
        
        $data['last_updated_by']    =   $this->session->userdata['id'];
        $data['last_updated_at']    =   date('Y-m-d H:i:s');
        $data['status']             =   "approved";
        $data['approved_by']        =   $this->session->userdata['id'];
        
        if($this->Attendance_Model->update_of_day($id, $data))
        {
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('off_day_approved')));   
            $off_day        =   $this->Attendance_Model->off_day_details($id);

            # Notification Code Starts

            $notification['sender_id']      =   $this->session->userdata['id'];
            $notification['reciever_id']    =   $off_day['employee_id'];
            $notification['text']           =   'Your Off Day request has been approved by '.$this->session->userdata['name'].' ['.$this->session->userdata['designation'].'].';
            $notification['url']            =   'user/personal/off_days';

            $this->Notifications_Model->add_notification($notification);

            # Notification Code Ends 
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }

        redirect('employees/attendance/off_days', 'refresh');
    }

    
    public function reject_off_day($id = '')
    {   
       
        if(!is_numeric($id))
        {
            redirect('login/four_zero_four', 'refresh');
        }
        
        $data['last_updated_by']    =   $this->session->userdata['id'];
        $data['last_updated_at']    =   date('Y-m-d H:i:s');
        $data['status']             =   "rejected";
        $data['rejected_by']        =   $this->session->userdata['id'];
        
        if($this->Attendance_Model->update_of_day($id, $data))
        {
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('off_day_rejected')));   
            $off_day        =   $this->Attendance_Model->off_day_details($id);

            # Notification Code Starts

            $notification['sender_id']      =   $this->session->userdata['id'];
            $notification['reciever_id']    =   $off_day['employee_id'];
            $notification['text']           =   'Your Off Day request has been rejected by '.$this->session->userdata['name'].' ['.$this->session->userdata['designation'].'].';
            $notification['url']            =   'user/personal/off_days';

            $this->Notifications_Model->add_notification($notification);

            # Notification Code Ends 
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }

        redirect('employees/attendance/off_days', 'refresh');
    }

    
    public function delete_off_day($id = '')
    {   
        
        if(!is_numeric($id))
        {
            redirect('login/four_zero_four', 'refresh');
        }
        
        $data['status']             =   "deleted";
        $data['last_updated_by']    =   $this->session->userdata['id'];
        $data['last_updated_at']    =   date('Y-m-d H:i:s');
        
        if($this->Attendance_Model->update_of_day($id, $data))
        {
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('off_day_deleted')));   
            $off_day        =   $this->Attendance_Model->off_day_details($id);

            # Notification Code Starts

            $notification['sender_id']      =   $this->session->userdata['id'];
            $notification['reciever_id']    =   $off_day['employee_id'];
            $notification['text']           =   'Your Off Day request has been deleted by '.$this->session->userdata['name'].' ['.$this->session->userdata['designation'].'].';
            $notification['url']            =   'user/personal/off_days';

            $this->Notifications_Model->add_notification($notification);

            # Notification Code Ends 
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }

        redirect('employees/attendance/off_days', 'refresh');
    }


    public function missing_time()
    {   
        
        $data['title']          =   'Employees Missing Time-In/Time-Out';
        $data['icon']           =   $this->icon;
        $data['time']           =   $this->Attendance_Model->get_missing_time();
        $this->load->view($this->path.'/missing-time', $data);
    }

    
    public function edit_missing_time($id='')
    {   
       
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {   
            $data['date']                   =   date('Y-m-d', strtotime($this->input->post('date')));
            $data['missed']                 =   $this->input->post('time');
            $data['last_updated_by']        =   $this->session->userdata['id'];
            $data['last_updated_at']        =   date('Y-m-d H:i:s');
            
            if($this->Attendance_Model->update_missing($id, $data))
            {
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('missing_time_updated')));           
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }
                    
            redirect('employees/attendance/missing_time', 'refresh');
        }  

        $data['title']              =   'Edit Missing Time-In/Time-Out';
        $data['icon']               =   $this->icon;
        $data['time']               =   $this->Attendance_Model->missing_details($id);
        $this->load->view('user/request-missing-time', $data);
    }

    public function approve_missing_time($id = '')
    {
       
        if(!is_numeric($id))
        {
            redirect('login/four_zero_four', 'refresh');
        }

        $data['last_updated_by']        =   $this->session->userdata['id'];
        $data['last_updated_at']        =   date('Y-m-d H:i:s');
        $data['status']                 =   "approved";
        $data['approved_by']            =   $this->session->userdata['id'];
        
        if($this->Attendance_Model->approve_missing($id, $data))
        {
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('missing_time_approved')));  
            $missing_time               =   $this->Attendance_Model->missing_details($id);

            # Notification Code Starts

            $notification['sender_id']      =   $this->session->userdata['id'];
            $notification['reciever_id']    =   $missing_time['employee_id'];
            $notification['text']           =   'Your Missing Time request has been approved by '.$this->session->userdata['name'].' ['.$this->session->userdata['designation'].'].';
            $notification['url']            =   'user/personal/missing_time';

            $this->Notifications_Model->add_notification($notification);

            # Notification Code Ends  
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }

        redirect('employees/attendance/missing_time', 'refresh');
    }
    
    public function reject_missing_time($id = '')
    {
        
        if(!is_numeric($id))
        {
            redirect('login/four_zero_four', 'refresh');
        }
        
        $data['last_updated_by']    =   $this->session->userdata['id'];
        $data['last_updated_at']    =   date('Y-m-d H:i:s');
        $data['status']             =   "rejected";
        $data['rejected_by']        =   $this->session->userdata['id'];
        
        if($this->Attendance_Model->update_missing($id, $data))
        {
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('missing_time_rejected')));  
            $missing_time        =   $this->Attendance_Model->missing_details($id);

            # Notification Code Starts

            $notification['sender_id']      =   $this->session->userdata['id'];
            $notification['reciever_id']    =   $missing_time['employee_id'];
            $notification['text']           =   'Your Missing Time request has been rejected by '.$this->session->userdata['name'].' ['.$this->session->userdata['designation'].'].';
            $notification['url']            =   'user/personal/missing_time';

            $this->Notifications_Model->add_notification($notification);

            # Notification Code Ends   
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }

        redirect('employees/attendance/missing_time', 'refresh');
    }
    
    public function delete_missing_time($id = '')
    {
          
        if(!is_numeric($id))
        {
            redirect('login/four_zero_four', 'refresh');
        }
        
        $data['status']             =   "deleted";
        $data['last_updated_by']    =   $this->session->userdata['id'];
        $data['last_updated_at']    =   date('Y-m-d H:i:s');
        
        if($this->Attendance_Model->update_missing($id, $data))
        {
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('missing_time_deleted')));   
            $missing_time        =   $this->Attendance_Model->missing_details($id);

            # Notification Code Starts

            $notification['sender_id']      =   $this->session->userdata['id'];
            $notification['reciever_id']    =   $missing_time['employee_id'];
            $notification['text']           =   'Your Missing Time request has been deleted by '.$this->session->userdata['name'].' ['.$this->session->userdata['designation'].'].';
            $notification['url']            =   'user/personal/missing_time';

            $this->Notifications_Model->add_notification($notification);

            # Notification Code Ends  
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }

        redirect('employees/attendance/missing_time', 'refresh');
    }
	

}

