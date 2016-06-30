<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

    private $icon   =   'fa fa-users';

	function __construct()
    {
        parent::__construct();
        $this->load->Model('employees/Employee_Model');
        
        # CHECKS THE CONTROLLERS'S USER ACCESSIBILITY
        if(!isset($this->session->userdata['id']))
            redirect('login/four_zero_four', 'refresh');
    }


	public function index()
	{   
        $data['title']      =   'Our Team';
        $data['icon']		=	$this->icon; 
        $data['employees'] 	=	$this->Employee_Model->get_employees();
        $this->load->view('team', $data);
	}
	
}

	