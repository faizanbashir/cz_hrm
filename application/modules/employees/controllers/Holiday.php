<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Holiday extends CI_Controller {

	
	private $icon  =   'fa fa-meh-o';
    private $path   =  'holidays';
	
	function __construct()
    {
        parent::__construct();

        # CHECKS THE CONTROLLERS'S USER ACCESSIBILITY
        if($this->session->userdata['designation'] !== 'Admin')
            redirect('login/four_zero_four', 'refresh');

        $this->load->model('Holiday_Model');
    }

     public function index()
    { 
       
        $data['title']      =   'View Holidays';
        $data['icon']       =   $this->icon; 
        $data['holidays']   =   $this->Holiday_Model->get_holidays();
        $this->load->view($this->path.'/holidays', $data);
    }  


    public function add()
    {   
       
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['title']              =   $this->input->post('title');
            $data['description']        =   $this->input->post('description');
            $data['date']               =   date('y-m-d', strtotime($this->input->post('date')));
            $data['created_by']         =   $this->session->userdata['id'];
            if($this->Holiday_Model->insert($data))
            {
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('holiday_added')));           
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }
                
            redirect('employees/holiday', 'refresh');
        }
        
        $data['title']      =   'Add Holiday';
        $data['icon']       =   $this->icon; 
        $this->load->view($this->path.'/add-holiday', $data);
    }  


    public function edit($id='')
    {   
       
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['title']              =   $this->input->post('title');
            $data['description']        =   $this->input->post('description');
            $data['date']               =   date('y-m-d', strtotime($this->input->post('date')));
            $data['last_updated_by']    =   $this->session->userdata['id'];
            $data['last_updated_at']    =   date('Y-m-d H:i:s');
            if($this->Holiday_Model->update($id,$data))
            {
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('holiday_updated')));           
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }
                
            redirect('employees/holiday', 'refresh');
        }
        
        $data['title']              =   'Edit Holiday';
        $data['icon']               =   $this->icon; 
        $data['holiday']            =   $this->Holiday_Model->get_holiday_details($id);
        $this->load->view($this->path.'/add-holiday', $data);
    }


    public function delete($id = '')
    {   
         
        $data['status']             =   'deleted';
        $data['last_updated_by']    =   $this->session->userdata['id'];
        $data['last_updated_at']    =   date('Y-m-d H:i:s');

        if($this->Holiday_Model->update($id, $data))
        {
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('holiday_deleted')));           
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }
                
        redirect('employees/holiday', 'refresh');
    }    

}
