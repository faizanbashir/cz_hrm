<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Salary extends CI_Controller {
	
	private $icon = 'fa fa-users';
    private $path = 'salary';
	
	function __construct()
    {
        parent::__construct();

        # CHECKS THE CONTROLLERS'S USER ACCESSIBILITY
        if($this->session->userdata['designation'] !== 'Admin')
            redirect('login/four_zero_four', 'refresh');

        $this->load->model('Salary_Model');
        $this->load->model('Employee_Model');
    }

	
    public function index()
	{
        $data['title']      =   'Employees Salary';
        $data['icon']		=	$this->icon; 
        $data['salaries']   =   $this->Salary_Model->get_employees_salaries();
        $this->load->view($this->path.'/employees-salary', $data);
	}


    public function edit_salary($employee_id = '')
    { 
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $salary['employee_id']          =   $employee_id;
            $salary['basic_salary']         =   $this->input->post('basic_salary');
            $salary['house_allowance']      =   $this->input->post('house_allowance');
            $salary['travelling_allowance'] =   $this->input->post('travelling_allowance');
            $salary['other_allowance']      =   $this->input->post('other_allowance');
            $salary['salary']               =   $this->input->post('salary');
            $salary['created_by']           =   $this->session->userdata['id'];

            if($this->Salary_Model->add_salary($employee_id, $salary))
            {
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('salary_updated')));   
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }

            redirect('employees/salary', 'refresh');
        }

        $data['title']      =   'Edit Salary';
        $data['icon']       =   $this->icon; 
        $data['employee']   =   $this->Employee_Model->get_employee_details($employee_id);
        $data['salary']     =   $this->Salary_Model->get_employee_salary($employee_id);
        $this->load->view($this->path.'/edit-salary', $data);
    }


    public function timeline($employee_id = '')
    {    
        $data['title']      =   'Salary Timeline';
        $data['icon']       =   $this->icon; 
        $data['salaries']   =   $this->Salary_Model->get_employee_salary_timeline($employee_id);
        $this->load->view($this->path.'/salary-timeline', $data);
    }


}
