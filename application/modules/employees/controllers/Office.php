<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Office extends CI_Controller
{
	private $icon  =   'fa fa-wrench';
	private $path  =   'office';

	function __construct()
    {
        parent::__construct();

        # CHECKS THE CONTROLLERS'S USER ACCESSIBILITY
        if($this->session->userdata['designation'] !== 'Admin')
            redirect('login/four_zero_four', 'refresh');

        $this->load->model('Office_Model');
        
    }

    public function index()
    {   
        $data['title']      =   'Office Settings'; 
        $data['icon']       =   $this->icon;
        $data['office']    	=   $this->Office_Model->get_office_settings();
        $this->load->view($this->path.'/office-settings', $data);
    }

    public function history()
    {   
        $data['title']      =   'History'; 
        $data['icon']       =   'fa fa-history';
        $data['history']    =   $this->Office_Model->get_history();
        $this->load->view($this->path.'/history', $data);
    }


	public function update_office_settings($id='')
	{
    	if($this->input->server('REQUEST_METHOD') == 'POST')
    	{
            $data['weekends']    		=   implode(',', $this->input->post('weekends'));
            $data['timing_from'] 		=   $this->input->post('timing_from');
            $data['timing_to']   		=   $this->input->post('timing_to');
            $data['applicable_from']	=	date('Y-m-01', strtotime($this->input->post('applicable_from')));
            $data['created_by']			=	$this->session->userdata['id'];
            $update['applicable_to']	=	date('Y-m-t', strtotime($data['applicable_from'] . ' -1 month'));
            $update['last_updated_by']  =   $this->session->userdata['id'];            
            $update['last_updated_at']  =   date('Y-m-d H:i:s');
            $update['status']			=	'changed';

            if($this->Office_Model->update($id, $update))
            {	
            	$this->Office_Model->insert($data);
                $this->session->set_flashdata('profile_notification', get_success_message($this->lang->line('office_settings_updated')));  
            }
            else
            {
                 $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }     

            redirect('employees/office', 'refresh');                   
        }
        else
        {
           redirect('login/four_zero_four', 'refresh'); 
        }
    }


    /*public function edit_history($id='')
	{
    	if($this->input->server('REQUEST_METHOD') == 'POST')
    	{
    		$data['weekends']    		=   implode(',', $this->input->post('weekends'));
            $data['timing_from'] 		=   $this->input->post('timing_from');
            $data['timing_to']   		=   $this->input->post('timing_to');
            $data['applicable_from']	=	date('Y-m-01', strtotime($this->input->post('applicable_from')));
            $data['last_updated_by']  	=   $this->session->userdata['id'];            
            $data['last_updated_at']  	=   date('Y-m-d H:i:s');
            $data['status']				=	'changed';

            if($this->Office_Model->update($id, $update))
            {	
            	$this->session->set_flashdata('profile_notification', get_success_message($this->lang->line('office_record_updated')));  
            }
            else
            {
                 $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }     

            redirect('employees/office/history', 'refresh');                   
        }
        
        $data['title']      =   'Edit History'; 
        $data['icon']       =   $this->icon;
        $data['history']    =   $this->Office_Model->get_history_details($id);
        $this->load->view($this->path.'/', $data);

    }*/

}