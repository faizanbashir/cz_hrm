<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Performance_Report extends CI_Controller {

	
	private $icon  =   'fa fa-calculator';
	private $path  =   'performance';

	
	function __construct()
    {
        parent::__construct();

        # CHECKS THE CONTROLLERS'S USER ACCESSIBILITY
        if($this->session->userdata['designation'] !== 'Admin')
            redirect('login/four_zero_four', 'refresh');

        $this->load->model('Performance_Report_Model');
        $this->load->model('Employee_Model');
    }


    public function index()
    { 
       
        $data['title']      =   'Employee Performance';
        $data['icon']       =   $this->icon; 
        $data['employees']  =   $this->Performance_Report_Model->get_employees();
        $this->load->view($this->path.'/employees', $data);
    }  


    public function employee_performance($employee_id = '')
    { 
        if(!is_numeric($employee_id))
        {
            redirect('login/four_zero_four', 'refresh');
        }

        $data['title']      =   'Performance Reports';
        $data['icon']       =   $this->icon; 
        $data['reports']    =   $this->Performance_Report_Model->get_performance_reports($employee_id);
        $this->load->view($this->path.'/employee-performance', $data);
    }  

    

    public function add_report()
    { 

        if($this->input->server('REQUEST_METHOD') == 'POST' && !empty($_FILES['report']['name']))
        {
          
            $data['employee_id']            =   $this->input->post('employee_id');
            $data['submitted_by']           =   $this->input->post('submitted_by');
            $data['submitted_to']           =   $this->session->userdata['id'];
            $data['submitted_on']           =   date('Y-m-d', strtotime($this->input->post('submitted_on')));
            $data['created_by']             =   $this->session->userdata['id'];
        //print_r($this->input->post()); die();
           
            if($id=$this->Performance_Report_Model->insert_report($data))
            {
                $fname                      =   'Report_'.$id.".pdf";
                move_uploaded_file($_FILES['report']['tmp_name'],"./file-uploads/user-account-files/performance-reports/".$fname);
                            
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('report_uploaded')));
                        
            }

            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }
            
            redirect('employees/performance_report/employee_performance/'.$this->input->post('employee_id'), 'refresh');
        }
        $data['title']         =   'Add Employee Performance Report';
        $data['icon']          =   $this->icon; 
        $data['employees']     =   $this->Employee_Model->get_employees();
        $this->load->view($this->path.'/add-performance-report', $data);
    } 


    public function delete($emp_id = '', $rep_id = '')
    {      
        if(!is_numeric($emp_id) || !is_numeric($rep_id))
        {
            redirect('login/four_zero_four', 'refresh');
        }

        $data['status']             =   'deleted';
        $data['last_updated_by']    =   $this->session->userdata['id'];
        $data['last_updated_at']    =   date('Y-m-d H:i:s');
        //unlink('file-uploads/user-account-files/performance-reports/Report_'.$rep_id); die();

        if($this->Performance_Report_Model->update_report($rep_id, $data))
        {
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('report_deleted')));           
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }
                
        redirect('employees/performance_report/employee_performance/'.$emp_id, 'refresh');
    } 


}