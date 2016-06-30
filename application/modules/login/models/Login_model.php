<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_Model extends CI_Model {
	
	function __construct()
    {
        parent::__construct();
    }
    
	
	function check_authentication($user_name, $user_password)
	{	
        $query      =   $this->db->get_where('employees', array('user_name' => $user_name, 'user_password' => $user_password, 'status' => 'active')); 
		//$query            =   $this->db->query("SELECT * FROM employees WHERE user_name = '$user_name' AND user_password = '$user_password' AND ( status IN ('active', 'link_send'))");

		if($query->num_rows())
		{
            $user         =   $query->row_array();
            
            if($user['status'] == 'link_send')
            {
                $data['link_value']     =   NULL;
                $data['status']         =   'active';                
                $this->Employee_Model->update_employee($user['id'], $data);
            }

			$this->session->set_userdata('id', $user['id']);
            $this->session->set_userdata('name', $user['first_name'].' '.$user['last_name']);
			$this->session->set_userdata('user_name', $user['user_name']);
            $this->session->set_userdata('email', $user['email']);
            $this->session->set_userdata('email_password', $user['email_password']);
            $this->session->set_userdata('designation_id', $user['designation_id']);
            $this->session->set_userdata('designation', $user['designation']);
            $this->session->set_userdata('avatar', $user['avatar']);

            if($user['designation'] !== 'admin')
            {
                $login_details  =   $this->Attendance_Model->get_user_logged_in_details($user['id']);
                
                if(count($login_details))
                {
                    if($login_details['logged_out_at'] !== NULL)
                    {
                        $this->session->set_userdata('logout_at', $login_details['logged_out_at']);
                    }
                    else
                    {
                        $this->session->set_userdata('login_id', $login_details['id']);
                        $this->session->set_userdata('login_at', $login_details['logged_in_at']);
                    }
                }
            }            

			return true;
		}
		else
		{
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('login_error')));
			return false;
		}
	}


    function get_user_details($email)
    {
        $user_details       =   $this->db->query("SELECT * FROM employees WHERE email = '$email' AND status IN ('active', 'link_send')")->row_array();
        return $user_details;
    }


}

