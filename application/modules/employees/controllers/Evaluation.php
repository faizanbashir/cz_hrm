<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluation extends CI_Controller {
	
	private $icon  =   'fa fa-users';
    private $path  =   'evaluation';
	
	function __construct()
    {
        parent::__construct();

        # CHECKS THE CONTROLLERS'S USER ACCESSIBILITY
        if($this->session->userdata['designation'] !== 'Admin')
            redirect('login/four_zero_four', 'refresh');

        $this->load->model('Employee_Model');
        $this->load->model('Questionnaire_Model');
        $this->load->model('user/Evaluation_Model');
    }


    public function feedback($year = '')
    {
        $data['title']                  =   'Employees Feedback';  
        $data['icon']                   =   $this->icon;      
        $data['employees_feedback']     =   $this->Evaluation_Model->get_employees_feedback($year);
        $evaluation_settings            =   $this->Questionnaire_Model->get_evaluation_authority();
        $evaluation_authority           =   explode(',', $evaluation_settings['attribute_value']);
        if(in_array($this->session->userdata['designation_id'], $evaluation_authority))
            $data['evaluation_authority']   =   TRUE;
        else
            $data['evaluation_authority']   =   FALSE;
        $this->load->view($this->path.'/employees-feedback', $data);
    }


    public function employee($timestamp = '')
    {
        $data['title']      =   'Employee Feedback';  
        $data['icon']       =   $this->icon;      
        $data['questions']  =   $this->Evaluation_Model->get_employee_feedback($timestamp);
        $this->load->view($this->path.'/employee-feedback', $data);
    }


    public function rating($timestamp = '')
    {
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {            
            $evaluation_id          =   $this->input->post('evaluation_id');
            $concerned_head_rating  =   $this->input->post('concerned_head_rating');
            $concerned_head_ratings =   $this->input->post('concerned_head_ratings');

            foreach($evaluation_id as $key => $value)
            {
                if(!empty($concerned_head_ratings[$key]))
                    $concerned_head_ratings[$key]  .=   ',';
                $data['concerned_head_ratings']     =   $concerned_head_ratings[$key].$this->session->userdata['id'].'-'.$concerned_head_rating[$key];
                
                $this->Evaluation_Model->update_question($value, $data);
            }

            $this->session->set_flashdata('notification', get_success_message($this->lang->line('evaluation_recieved')));  
            redirect('employees/evaluation/feedback', 'refresh');   
        }

        $data['title']      =   'Employee Feedback';  
        $data['icon']       =   $this->icon;      
        $data['questions']  =   $this->Evaluation_Model->get_employee_feedback($timestamp);
        $this->load->view($this->path.'/give-rating', $data);
    }

    
}
