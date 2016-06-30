<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Letter extends CI_Controller {
	
	private $icon = 'fa fa-envelope';
    private $path = 'letters';
	
	function __construct()
    {
        parent::__construct();

        # CHECKS THE CONTROLLERS'S USER ACCESSIBILITY
        if($this->session->userdata['designation'] !== 'Admin')
            redirect('login/four_zero_four', 'refresh');

        $this->load->model('Letter_Model');
        $this->load->model('settings/Settings_Model');
        $this->load->model('employees/Employee_Model');
    }

	public function index()
    {      
        $data['title']      =       'Company Letters';
        $data['icon']       =       $this->icon;
        $data['letters']    =       $this->Letter_Model->get_letters();
        $this->load->view($this->path.'/company-letters', $data);    
    }

    
    public function add()
    {  
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['category_title']             =      $this->input->post('category_title');
            $data['category_description']       =      $this->input->post('category_description');
            $data['created_by']                 =      $this->session->userdata['id'];
            $data['created_at']                 =      date('Y-m-d H:i:s');
            
            if($this->Letter_Model->add_letter($data))
            {
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('letter_added')));           
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }
                
            redirect('employees/letter', 'refresh');          
        }
            
        $data['title']      =   'Add Letter';
        $data['icon']       =   $this->icon; 
        $this->load->view($this->path.'/add-letter', $data);
    }


    public function edit($letter_id = '')
    {  

        if(!is_numeric($letter_id))
        {
            redirect('login/four_zero_four', 'refresh');
        }
         
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['category_title']             =      $this->input->post('category_title');
            $data['category_description']       =      $this->input->post('category_description');
            $data['last_updated_by']            =      $this->session->userdata['id'];
            $data['last_updated_at']            =      date('Y-m-d H:i:s');
            
            if($this->Letter_Model->update_letter($letter_id,$data))
            {
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('letter_updated')));   
                   
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }
                
            redirect('employees/letter', 'refresh');          
        }
            
        $data['title']      =   'Edit Letter';
        $data['icon']       =   $this->icon; 
        $data['letter']      =   $this->Letter_Model->get_letter_details($letter_id);
        $this->load->view($this->path.'/add-letter', $data);
    }


    public function delete($letter_id = '')
    {       
        if(!is_numeric($letter_id))
        {
            redirect('login/four_zero_four', 'refresh');
        }
        
        $data['last_updated_by']    =   $this->session->userdata['id'];
        $data['last_updated_at']    =   date('Y-m-d H:i:s');
        $data['status']             =   "deleted";
        
        if($this->Letter_Model->update_letter($letter_id, $data))
        {
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('letter_deleted')));   
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }

        redirect('employees/letter', 'refresh');
    }


    public function create_letter()
    {      
        $data['title']      =       'Create Letter';
        $data['icon']       =       $this->icon;
        $data['categories'] =       $this->Letter_Model->get_letters();
        $data['employees']  =       $this->Employee_Model->get_employees();
        $this->load->view($this->path.'/create-letter', $data);    
    }


    public function create()
    {  

        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['category_id']                =      $this->input->post('letter_type');
            $data['recipient']                  =      $this->input->post('recipient');
            $data['letter_subject']             =      $this->input->post('letter_subject');
            $data['letter_body']                =      $this->input->post('letter_body');
            $data['created_by']                 =      $this->session->userdata['id'];
            $data['created_at']                 =      date('Y-m-d H:i:s');
            if($this->Letter_Model->insert_emp_letter($data))
            {   
                $this->load->view($this->path.'/show-letter', $data);
                  
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }
         redirect('employees/letter/employee_letters', 'refresh');          
        }
    
    }


    public function edit_letter($id='')
    {  
        if(!is_numeric($id))
        {
            redirect('login/four_zero_four', 'refresh');
        }

        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['category_id']                =      $this->input->post('letter_type');
            $data['recipient']                  =      $this->input->post('recipient');
            $data['letter_subject']             =      $this->input->post('letter_subject');
            $data['letter_body']                =      $this->input->post('letter_body');
            $data['last_updated_by']            =      $this->session->userdata['id'];
            $data['last_updated_at']            =      date('Y-m-d H:i:s');
            if($id=$this->Letter_Model->update_emp_letter($id, $data))
            {   
                
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('letter_updated'))); 
                  
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }

         redirect('employees/letter/employee_letters', 'refresh');        
        }

        $data['title']          =       'Edit Letter';
        $data['icon']           =       $this->icon;
        $data['letter']         =       $this->Letter_Model->get_emp_letter_details($id);
        $data['categories']     =       $this->Letter_Model->get_letters();
        $this->load->view($this->path.'/create-letter', $data);    
    }


    public function employee_letters()
    {  
    
        $data['title']          =       'Employee Letters';
        $data['icon']           =       $this->icon;
        $data['letters']        =       $this->Letter_Model->get_employee_letters();
        $this->load->view($this->path.'/employee-letters', $data);    
    }



    public function view_letter($id='')
    {  
        $data['title']          =       'View Letter';
        $data['icon']           =       $this->icon;
        $data['letter']         =       $this->Letter_Model->get_emp_letter_details($id);
        $data['company']        =       $this->Settings_Model->get_company_details();
        $this->load->view($this->path.'/view-letter', $data);    
    }


    public function delete_emp_letter($id = '')
    {
       
        if(!is_numeric($id))
        {
            redirect('login/four_zero_four', 'refresh');
        }
        
        $data['last_updated_by']    =   $this->session->userdata['id'];
        $data['last_updated_at']    =   date('Y-m-d H:i:s');
        $data['status']             =   "deleted";
        
        if($this->Letter_Model->update_emp_letter($id, $data))
        {
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('letter_deleted')));   
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }

        redirect('employees/letter/employee_letters', 'refresh');
    }

}
