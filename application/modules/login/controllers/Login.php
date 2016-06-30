<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        
        $this->load->model('employees/Employee_Model');   
        $this->load->model('employees/Attendance_Model');         
    }


	public function index()
	{
        
        if( isset( $this->session->userdata['id'] ) )
        {
            if($this->session->userdata['designation'] == 'Admin')
            {
                redirect('employees/hr', 'refresh');
            }
            else
            {
                redirect('dashboard', 'refresh');
            };
        }

		$data['title'] 	=	"Login";
		$this->load->view('login', $data);
	}


	public function validate_user()
	{
        if($this->input->post('user_name') || $this->input->post('user_password'))
		{

	        if($this->Login_Model->check_authentication($this->input->post('user_name'), md5($this->input->post('user_password'))))
	        {
                $this->load->model('user/Evaluation_Model');

                if($this->session->userdata['designation'] == 'Reporting Officer' && $this->Evaluation_Model->is_evaluation_month())
                {
                    redirect('user/personal/evaluation', 'refresh');
                }

                if($this->session->userdata['designation'] == 'Admin')
                {
                    redirect('employees/hr', 'refresh');
                }
                else
                {
                    redirect('dashboard', 'refresh');
                }
	            
	        }
	        else
	        {	        	
	        	redirect('/', 'refresh');
	        }
		}
		else
		{
            redirect('login/four_zero_four', 'refresh');
		}
	}


    public function reset_password()
    {
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $user   		=   $this->Login_Model->get_user_details($this->input->post('email'));     

            if(count($user))
            {
                $time       =   time();
                $link       =   base_url().'login/login/activate_account/'.$user['id'].'/'.$time;

                $to         =   $user['email'];
                $subject    =   'BMS - Password Reset';                
                $message    =   "Dear ".$user['user_name'].",<br><br>You have requested password restore for your BMS Account. Please click on the link below to restore your account,<br><br> ".$link ." <br><br>Sincerly,<br>Technical Team - BMS+";

                if($this->general_model->send_email($to, $subject, $message))
                {
                    $data['link_value']     =   $time;
                    $data['status']         =   'link_send';
                    $this->Employee_Model->update_employee($user['id'], $data);

                    if($user['user_password'])
                    {
                        $this->session->set_flashdata('notification', get_success_message($this->lang->line('email_reset')));
                    }
                }
                else
                {
                    $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
                }
                
                redirect('/', 'refresh');               
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('email_not_registered')));
                redirect('/', 'refresh');  
            }
        }
        else
        {
            redirect('login/four_zero_four', 'refresh');
        }        
    }


    public function activate_account($user_id = '', $link_value = '')
    {
        if( isset( $this->session->userdata['id'] ) )
        {
            redirect('dashboard', 'refresh');
        }
        
        if($this->input->post('password1') && $this->input->post('password2') && is_numeric($user_id))
        {
            $data['user_password']      =   md5($this->input->post('password1'));
            $data['last_updated_by']    =   $user_id;            
            $data['last_updated_at']    =   date('Y-m-d H:i:s');
            $data['link_value']         =   NULL;
            $data['status']             =   'active';

            if($this->Employee_Model->update_employee($user_id, $data))
            {
                $user   =   $this->Employee_Model->get_employee_details($user_id);

                if($this->Login_Model->check_authentication($user['user_name'], md5($this->input->post('password1'))))
                {
                    //$this->session->set_flashdata('notification', get_success_message($this->lang->line('password_changed')));
                    redirect('dashboard', 'refresh');
                }
                else
                {
                    $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));
                    redirect('login', 'refresh');
                } 
            }
            else
            {
                 $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }    

            redirect('login', 'refresh');        
        }

        if(is_numeric($user_id) && is_numeric($link_value))
        {
            $user   =   $this->Employee_Model->get_employee_details($user_id);

            if($user['link_value'] == $link_value && $user['status'] == 'link_send')
            {
                $data['title']  =   'Activate Account';
                $data['id']     =   $user_id;
                $this->load->view('activate-account', $data);
            }
            else
            {
                redirect('login/four_zero_four', 'refresh');
            }
        }
        else
        {
            redirect('login/four_zero_four', 'refresh');
        }
    }


	public function do_logout()
    {
        $user_data = $this->session->all_userdata();    
        foreach ($user_data as $key => $value) 
        {
            $this->session->unset_userdata($key);
        }
        $this->session->sess_destroy();
        $this->session->set_flashdata('notification', get_success_message($this->lang->line('logout_success')));
        redirect('/', 'refresh');
    }


    function four_zero_four()
    {
        $this->load->view('errors/html/error_404.php');
    }


    public function timein()
    {
        $data['employee_id']    =   $this->session->userdata['id'];
        $data['logged_in_at']   =   date('Y-m-d H:i:s');    
        $data['created_by']     =   $this->session->userdata['id'];

        if($login_id = $this->Attendance_Model->insert_login($data))
        {
            $this->session->set_userdata('login_id', $login_id);
            $this->session->set_userdata('login_at', $data['logged_in_at']);
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('attendance_added')));           
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }

        redirect('/', 'refresh');
    } 


    public function timeout()
    {
        $data['logged_out_at']      =   date('Y-m-d H:i:s');    
        $data['last_updated_by']    =   $this->session->userdata['id'];
        $data['last_updated_at']    =   date('Y-m-d H:i:s');

        if($this->Attendance_Model->update_login($this->session->userdata['login_id'], $data))
        {
            $this->session->set_userdata('logout_at', $data['logged_out_at']);
            $this->session->unset_userdata('login_at');
            $this->session->unset_userdata('login_id');
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('attendance_updated')));           
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }
        redirect('/', 'refresh');
    }    


}
