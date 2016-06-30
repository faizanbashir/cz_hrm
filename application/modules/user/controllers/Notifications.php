<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications extends CI_Controller {
	
	private $icon = 'fa fa-bell';
	
	function __construct()
    {
        parent::__construct();

        if(!isset($this->session->userdata['id']))
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('not_loggedin_msg')));   
            redirect('/', 'refresh');
        }

    }


    public function update_notification()
    {
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['status']             =   'read'; 
            $data['last_updated_by']    =   $this->session->userdata['id'];
            $data['last_updated_at']    =   date('Y-m-d H:i:s'); 
            $this->Notifications_Model->update_notification($this->input->post('id'), $data);
            return true;
        }
        else
        {
            redirect('login/four_zero_four', 'refresh');
        }
    }

    
}
