<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Travel_plans extends CI_Controller {

    private $icon   =   'fa fa-plane';
    private $path   =   'travel-plan';

	function __construct()
    {
        parent::__construct();

        # CHECKS THE CONTROLLERS'S USER ACCESSIBILITY
        if($this->session->userdata['designation'] !== 'Admin')
            redirect('login/four_zero_four', 'refresh');

        $this->load->model('Employee_Model');
        $this->load->model('Travel_Plan_Model');
    }


	public function index()
    { 
        $data['title']              =   'View Travel Projects'; 
        $data['icon']               =   $this->icon;
        $data['travel_projects']    =   $this->Travel_Plan_Model->get_travel_plans();
        $this->load->view($this->path.'/travel-plans', $data);
	}
    
   
    public function add()
    { 
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['travel_purpose']         =   $this->input->post('travel_purpose');
            $data['employees']              =   implode(',', $this->input->post('employees'));
            $data['project_manager']        =   $this->input->post('project_manager');
            $data['alternate_support']      =   $this->input->post('alternate_support');
            $data['travel_summary']         =   $this->input->post('travel_summary');
            $data['success_rate']           =   $this->input->post('success_rate');
            $data['travel_from_country']    =   $this->input->post('travel_from_country');
            $data['travel_from_state']      =   $this->input->post('travel_from_state');
            $data['travel_from_city']       =   $this->input->post('travel_from_city');
            $data['travel_to_country']      =   $this->input->post('travel_to_country');
            $data['travel_to_state']        =   $this->input->post('travel_to_state');
            $data['travel_to_city']         =   $this->input->post('travel_to_city');
            $data['travel_through']         =   $this->input->post('travel_through');
            $data['travel_from_date']       =   date('Y-m-d', strtotime($this->input->post('travel_from_date')));
            $data['travel_to_date']         =   date('Y-m-d', strtotime($this->input->post('travel_to_date')));
            $data['travel_allowance']       =   $this->input->post('travel_allowance');
            $data['food_allowance']         =   $this->input->post('food_allowance');
            $data['living_allowance']       =   $this->input->post('living_allowance');           
            $data['created_by']             =   $this->session->userdata['id'];
            
            if($this->Travel_Plan_Model->add_travel_plan($data))
            {
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('travel_plan_added')));   
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }

            redirect('employees/travel_plans', 'refresh');        
        }

        $data['title']          =   'Add Travel Project'; 
        $data['icon']           =   $this->icon; 
        $data['employees']      =   $this->Employee_Model->get_employees();
        $this->load->view($this->path.'/add-travel-plan', $data);
    }

    
    function edit($project_id = '')
    {
        if(!is_numeric($project_id))
        {
            redirect('login/four_zero_four', 'refresh');
        }

        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['travel_purpose']         =   $this->input->post('travel_purpose');
            $data['employees']              =   implode(',', $this->input->post('employees'));
            $data['project_manager']        =   $this->input->post('project_manager');
            $data['alternate_support']      =   $this->input->post('alternate_support');
            $data['travel_summary']         =   $this->input->post('travel_summary');
            $data['success_rate']           =   $this->input->post('success_rate');
            $data['travel_from_country']    =   $this->input->post('travel_from_country');
            $data['travel_from_state']      =   $this->input->post('travel_from_state');
            $data['travel_from_city']       =   $this->input->post('travel_from_city');
            $data['travel_to_country']      =   $this->input->post('travel_to_country');
            $data['travel_to_state']        =   $this->input->post('travel_to_state');
            $data['travel_to_city']         =   $this->input->post('travel_to_city');
            $data['travel_through']         =   $this->input->post('travel_through');
            $data['travel_from_date']       =   date('Y-m-d', strtotime($this->input->post('travel_from_date')));
            $data['travel_to_date']         =   date('Y-m-d', strtotime($this->input->post('travel_to_date')));
            $data['travel_allowance']       =   $this->input->post('travel_allowance');
            $data['food_allowance']         =   $this->input->post('food_allowance');
            $data['living_allowance']       =   $this->input->post('living_allowance');           
            $data['last_updated_by']        =   $this->session->userdata['id'];
            $data['last_updated_at']        =   date('Y-m-d H:i:s');
            
            if($this->Travel_Plan_Model->update_travel_plan($project_id, $data))
            {
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('travel_plan_updated')));   
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }

            redirect('employees/travel_plans', 'refresh');        
        }
        
        $data['title']          =   'Edit Travel Project'; 
        $data['icon']           =   $this->icon; 
        $data['employees']      =   $this->Employee_Model->get_employees();
        $data['travel_plan']    =   $this->Travel_Plan_Model->get_travel_plan_details($project_id);        
        $this->load->view($this->path.'/add-travel-plan', $data);
    } 
    
    
    public function delete($project_id = '')
    { 
        if(!is_numeric($project_id))
        {
            redirect('login/four_zero_four', 'refresh');
        }
        
        $data['status']             =   "deleted";
        $data['last_updated_by']    =   $this->session->userdata['id'];
        $data['last_updated_at']    =   date('Y-m-d H:i:s');
        
        if($this->Travel_Plan_Model->update_travel_plan($project_id, $data))
        {
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('travel_plan_deleted')));   
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }

        redirect('employees/travel_plans', 'refresh');        
    }
   
  
}
