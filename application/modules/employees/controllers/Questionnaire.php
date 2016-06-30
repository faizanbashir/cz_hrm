<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Questionnaire extends CI_Controller {

    private $icon   =   'fa fa-pencil';
    private $path   =   'evaluation';

	function __construct()
    {
        parent::__construct();

        # CHECKS THE CONTROLLERS'S USER ACCESSIBILITY
        if($this->session->userdata['designation'] !== 'Admin')
            redirect('login/four_zero_four', 'refresh');

        $this->load->model('Questionnaire_Model');

    }


	public function index()
    { 
        $data['title']      =   'Questionnaire'; 
        $data['icon']       =   $this->icon;
        $data['questions']  =   $this->Questionnaire_Model->get_questions();
        $this->load->view($this->path.'/questionnaire', $data);
	}
    
    
    public function add()
    { 
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['question']             =      $this->input->post('question');
            $data['created_by']           =      $this->session->userdata['id'];
            $data['created_at'] 	      =	     date('Y-m-d H:i:s');
            
            if($this->Questionnaire_Model->add_question($data))
            {
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('question_added')));           
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }
                
            redirect('employees/questionnaire', 'refresh');          
        }
            
        $data['title']      =   'Add Question';
        $data['icon']       =   $this->icon; 
        $this->load->view($this->path.'/add-question', $data);
    }
     
    
    public function edit($question_id = '')
    {  
        if(!is_numeric($question_id))
		{
			redirect('login/four_zero_four', 'refresh');
		}
         
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['question']             =      $this->input->post('question');
            $data['last_updated_by']      =      $this->session->userdata['id'];
            $data['last_updated_at'] 	  =	     date('Y-m-d H:i:s');
            
            if($this->Questionnaire_Model->update_question($question_id, $data))
            {
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('question_updated')));   
                   
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }
                
            redirect('employees/questionnaire', 'refresh');          
        }
            
        $data['title']      =   'Edit Question';
        $data['icon']       =   $this->icon; 
        $data['question']   =	$this->Questionnaire_Model->get_question_details($question_id);
        $this->load->view($this->path.'/add-question', $data);
    }
    
    
    public function delete($question_id = '')
    {
        if(!is_numeric($question_id))
        {
            redirect('login/four_zero_four', 'refresh');
        }
        
        $data['last_updated_by']    =   $this->session->userdata['id'];
        $data['last_updated_at']    =   date('Y-m-d H:i:s');
        $data['status']             =   "deleted";
        
        if($this->Questionnaire_Model->update_question($question_id, $data))
        {
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('question_deleted')));   
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }

        redirect('employees/questionnaire', 'refresh');
    }


    public function settings()
    {   
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $evaluation_months['attribute_value']   =   implode(',', $this->input->post('evaluation_months'));
            $evaluation_months['last_updated_by']   =   $this->session->userdata['id'];
            $evaluation_months['last_updated_at']   =   date('Y-m-d H:i:s');

            $evaluation_authority['attribute_value']=   implode(',', $this->input->post('evaluation_authority'));
            $evaluation_authority['last_updated_by']=   $this->session->userdata['id'];
            $evaluation_authority['last_updated_at']=   date('Y-m-d H:i:s');
            
            if($this->Questionnaire_Model->update_questionarie_settings($evaluation_months, $evaluation_authority))
            {
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('qr_settings_deleted')));              
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }
                
            redirect('employees/questionnaire/settings', 'refresh');          
        }
        
        $this->load->model('Designation_Model');

        $data['title']                  =   'Questionarie Settings';
        $data['icon']                   =   $this->icon; 
        $data['evaluation_months']      =   $this->Questionnaire_Model->get_evaluation_months();
        $data['evaluation_authority']   =   $this->Questionnaire_Model->get_evaluation_authority();
        $data['designations']           =   $this->Designation_Model->get_designations();
        $this->load->view($this->path.'/settings', $data);
    }
    
    
}