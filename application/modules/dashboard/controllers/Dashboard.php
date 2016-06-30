<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	private $icon   =   'fa fa-th-large';

	function __construct()
    {
        parent::__construct();

        if(!isset($this->session->userdata['id']))
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('not_loggedin_msg')));   
            redirect('/', 'refresh');
        }

        $this->load->model('Dashboard_Model');
        $this->load->model('employees/Employee_Model');
    }


	public function index()
	{		
		/* CODE TO CHECK HAS USER PRIVELIDGES TO ACCESS THE FUNCTION
		if(!isset($this->session->userdata[$this->router->fetch_module().'@'.$this->router->fetch_class().'@'.$this->router->fetch_method()]));
		{
			redirect('login/four_zero_four', 'refresh');
		}
		*/
	    $data['title']     	=   "Dashboard";
        $data['icon']      	=   $this->icon; 
		$this->load->view('dashboard', $data);        
	}


	
}
