<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Trainings_reports extends CI_Controller {
	
	private $icon = 'fa fa-users';
	private $path = 'trainings';
	
	function __construct()
    {
        parent::__construct();
        
        # CHECKS THE CONTROLLERS'S USER ACCESSIBILITY
        if($this->session->userdata['designation'] !== 'Admin')
            redirect('login/four_zero_four', 'refresh');
            
        $this->load->model('Employee_Model');
        $this->load->model('Training_Report_Model');
    }


    public function index()
	{
        $data['title']      =   'Training Reports';
        $data['icon']       =   $this->icon; 
        $data['employees']  =   $this->Employee_Model->get_employees();
        $this->load->view($this->path.'/training-reports', $data);
	} 

  
    public function generate_report()
    {  
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['type']               =       $this->input->post('type');
            $data['employee_id']        =       $this->input->post('employee_id');
            $data['training_start']     =       date('Y-m-d', strtotime($this->input->post('startdate')));
            $data['training_end']       =       date('Y-m-d', strtotime($this->input->post('enddate')));
        }

        if($data['type'] == 'trainings_attended') 
            $title  =   " Attended Trainings";                                        
        elseif($data['type'] == 'trainings_recommended')
            $title  =   " Recommended Trainings";
        else
            $title  =   " Requested Trainings";
        
        $data['icon']       =   $this->icon;
        $data['title']      =   $title;
        $data['report']     =   $this->Training_Report_Model->get_training_report($data);
        $this->load->view($this->path.'/report', $data);
    } 

}
