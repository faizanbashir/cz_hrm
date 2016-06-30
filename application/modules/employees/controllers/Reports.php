<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {
	
	private $icon = 'fa fa-calculator';
	private $path = 'reports';
	
	function __construct()
    {
        parent::__construct();
        
        # CHECKS THE CONTROLLERS'S USER ACCESSIBILITY
       if($this->session->userdata['designation'] !== 'Admin')
            redirect('login/four_zero_four', 'refresh');

        $this->load->model('Employee_Model');
        $this->load->model('Report_Model');
        $this->load->model('settings/Settings_Model');
    }

    public function index()
	{  
        $data['title']      =   'Generate Reports';
        $data['icon']       =   $this->icon; 
        $data['employees']  =   $this->Employee_Model->get_employees();
        $this->load->view($this->path.'/generate-report', $data);
	} 

    
    public function generate_report()
    {  
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['type']               =       $this->input->post('type');
            $data['employee_id']        =       $this->input->post('employee_id');
            $data['single_employee_id'] =       $this->input->post('single_employee_id');
            $data['start']              =       date('Y-m-d', strtotime($this->input->post('startdate')));
            $data['end']                =       date('Y-m-d', strtotime($this->input->post('enddate')));
            $start                      =       date('Y-m-01', strtotime($this->input->post('date')));
        }
        
        $data['icon']       =   $this->icon; 
        if($data['type'] == 'attendance_report')
        {
            $data['title']              =       "Attendance Report";
            $end                        =       date('Y-m-t', strtotime($start));
            $data['report']             =       $this->Report_Model->attendance_reports($data, $start, $end);
            $data['weekends']           =       $this->Report_Model->get_weekends($start);

            $data['approved_leaves']    =       $this->Report_Model->get_approved_leaves
                                                ($data['single_employee_id'], $start, $end);

            $data['holidays']           =       $this->Report_Model->get_holidays($start, $end);

            $data['off_days']           =       $this->Report_Model->get_off_day_requests($data['single_employee_id'],$start, $end);

            $data['extra_hours']        =       $this->Report_Model->get_extra_time_requests($data['single_employee_id'], $start, $end);

            $data['half_days']          =       $this->Report_Model->get_half_days($data['single_employee_id'], 
                                                $start, $end);
           
            $this->load->view($this->path.'/attendance-report', $data);
        }
        elseif($data['type'] == 'leaves_report')
        {
            $data['title']              =       "Leaves Report";
            $data['report']             =       $this->Report_Model->leave_reports($data);
            $this->load->view($this->path.'/leaves-report', $data);
        }
        elseif($data['type'] == 'travelling_report')
        {
            $data['title']              =       "Travelling Report";
            $data['report']             =       $this->Report_Model->travelling_reports($data);
            $this->load->view($this->path.'/travelling-report', $data);      
        }
        elseif($data['type'] == 'late_sitting_report')
        {
            $data['title']              =       "Late Sitting Report";
            $data['report']             =       $this->Report_Model->late_sitting_reports($data);
            $this->load->view($this->path.'/late-sitting-report', $data);
        }
        elseif($data['type'] == 'off_day_report')
        {
            $data['title']              =       "Off Day Report";
            $data['report']             =       $this->Report_Model->off_day_reports($data);
            $this->load->view($this->path.'/off-day-report', $data);
        }
        elseif($data['type'] == 'missing_time_report')
        {
            $data['title']             =   "Missing Time Report";
            $data['report']            =   $this->Report_Model->missing_time_reports($data);
            $this->load->view($this->path.'/missing-time-report', $data);
        }
        else
        {   
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('select_type'))); 
            redirect('employees/reports','refresh');
            
        }
    } 
}
