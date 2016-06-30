<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {
	
	private $icon = 'fa fa-calendar';
	
	function __construct()
    {
        parent::__construct();

        if(!isset($this->session->userdata['id']))
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('not_loggedin_msg')));   
            redirect('/', 'refresh');
        }

        $this->load->model('employees/Employee_Model');
        $this->load->model('employees/Attendance_Model');        
    }


    public function attendance_calendar($employee_id = '')
    {
        if(!$employee_id)
        {
            $employee_id    =   $this->session->userdata['id'];
        }

        $data['title']          =   'Attendance Calendar';
        $data['icon']           =   $this->icon; 
        $data['employee_id']    =   $employee_id; 
        $data['doj']            =   $this->Employee_Model->get_employee_doj($employee_id);
        $this->load->view('attendance-calendar', $data);
    }

    
}
