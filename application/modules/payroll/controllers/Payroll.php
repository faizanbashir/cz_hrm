<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Payroll extends CI_Controller {
	
	private $icon = 'fa fa-calculator';
	
	function __construct()
    {
        parent::__construct();

        # CHECKS THE CONTROLLERS'S USER ACCESSIBILITY
       
        $this->load->model('employees/Designation_Model');
        $this->load->model('employees/Employee_Model');
        $this->load->model('employees/Salary_Model');
        $this->load->model('employees/Report_Model');
        $this->load->model('employees/Experience_Model');
        $this->load->model('employees/Qualification_Model');
        $this->load->model('Payroll_Model');
    }


    public function index()
	{   
		$data['title']              =   'Generate Pay Slip';
        $data['icon']               =	$this->icon; 
        $data['employees'] 	        =	$this->Employee_Model->get_employees();
        $this->load->view('generate-slip', $data);
	}

    public function generate()
    {

        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['date']           =   $this->input->post('date');
            if($this->session->userdata['designation']== 'Admin')
            {            
                $data['employee_id']=   $this->input->post('employee');
                
                $data['title']      =   'Confirm Pay Slip';
                $data['icon']       =   $this->icon;
                $data['employee']   =   $this->Employee_Model->get_employee_details($data['employee_id']);
                $data['salary']     =   $this->Salary_Model->get_employee_salary($data['employee_id']);
                
                $this->load->view('confirm-details', $data);
            }
            else
            {
                $employee_id        =   $this->session->userdata['id'];
                $data               =   $this->_calculate($data['date'], $employee_id);
                /*$data['employee']           =   $this->Employee_Model->get_employee_details($data['employee_id']);
                $data['salary']             =   $this->Salary_Model->get_employee_salary($data['employee_id']);
                $data['earnings']           =   $this->Payroll_Model->get_monthly_earnings($data['employee_id'], $data['date']);

                $data['total_earnings']     =   $data['salary']['basic_salary'] + $data['earnings']['hra'] + $data['earnings']['da'] + $data['earnings']['special_allowance'] + $data['earnings']['medical_allowance'] + $data['earnings']['performance'];*/
                
                $data['title']              =   'Pay Slip';
                $data['icon']               =    $this->icon; 
                $this->load->view('pay-slip', $data);

            }   
                 
        }
    
    } 

    public function confirm()
    {
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $employee_id                    =   $this->input->post('emp_id');
            $date                           =   $this->input->post('date'); 
            $month['hra']                           =   $this->input->post('hra');
            $month['da']                            =   $this->input->post('da');
            $month['special_allowance']             =   $this->input->post('special_allowance'); 
            $month['medical_allowance']             =   $this->input->post('medical_allowance');
            $month['performance']                   =   $this->input->post('performance');
            $this->Payroll_Model->add_monthly_earnings($month);

            $data       =   $this->_calculate($date, $employee_id);
            
            $data['title']              =   'Pay Slip';
            $data['icon']               =    $this->icon; 
            $this->load->view('pay-slip', $data);
        }
    } 

    private function _calculate($date, $employee_id)
    {   
        $start                      =       date('Y-m-01', strtotime($date));
        $end                        =       date('Y-m-t', strtotime($start));
        $data['std_working_days']   =       date('t', strtotime($end));
        $data['employee_id']        =       $employee_id;
        $data['date']               =       $date;
        $data['employee']           =       $this->Employee_Model->get_employee_details($employee_id);
        $data['salary']             =       $this->Salary_Model->get_employee_salary($employee_id);
        $data['earnings']           =       $this->Payroll_Model->get_monthly_earnings($employee_id, $date);

        $data['total_earnings']     =   $data['salary']['basic_salary'] + $data['earnings']['hra'] + $data['earnings']['da'] + $data['earnings']['special_allowance'] + $data['earnings']['medical_allowance'] + $data['earnings']['performance'];
        return $data;
    }

}