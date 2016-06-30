<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Hr extends CI_Controller {
	
	private $icon = 'fa fa-users';
	private $path = 'hr';
	
	function __construct()
    {
        parent::__construct();

        if($this->session->userdata['designation'] !== 'Admin')
            redirect('login/four_zero_four', 'refresh');
            
        if(!isset($this->session->userdata['id']))
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('not_loggedin_msg')));   
            redirect('/', 'refresh');
        }

    }


	public function index()
	{   
        $data['title']      =   'HR Management System'; 
        $data['icon']		=	$this->icon; 
        $this->load->view($this->path.'/hr-dashboard', $data);
	}


    public function download_file($filename)
    {
        $this->load->helper('download');
        $data = file_get_contents(base_url()."file-uploads/user-account-files/files/".$filename); 
        force_download($filename, $data);
    }
	
	
}
