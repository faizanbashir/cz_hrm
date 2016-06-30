<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    private $icon   =   'fa fa-wrench';

	function __construct()
    {
        parent::__construct();

        if(!isset($this->session->userdata['id']))
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('not_loggedin_msg')));   
            redirect('/', 'refresh');
        }

        $this->load->model('Settings_Model');
    }


	public function personal_profile()
	{   
        $data['title']      =   'Personal Profile'; 
        $data['icon']       =   $this->icon; 
        $data['user']       =   $this->Settings_Model->get_personal_profile($this->session->userdata['id']);
        $this->load->view('personal-profile', $data);
	}


    public function update_personal_profile()
    {
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['first_name']         =   $this->input->post('first_name'); 
            $data['last_name']          =   $this->input->post('last_name'); 
            $data['mobile_no']          =   $this->input->post('mobile_no');
            $data['email']              =   $this->input->post('email');
            $data['email_password']     =   $this->input->post('email_password');
            $data['contact_no']         =   $this->input->post('contact_no');
            $data['country']            =   $this->input->post('country');
            $data['state']              =   $this->input->post('state');            
            $data['city']               =   $this->input->post('city');
            $data['address']            =   $this->input->post('address');
            $data['last_updated_by']    =   $this->session->userdata['id'];            
            $data['last_updated_at']    =   date('Y-m-d H:i:s');

            if($this->Settings_Model->update_personal_profile($this->session->userdata['id'], $data))
            {
                $this->session->set_userdata('name', $data['first_name'].' '.$data['last_name']);
                $this->session->set_userdata('email', $data['email']);
                $this->session->set_userdata('email_password', $data['email_password']);

                $this->session->set_flashdata('profile_notification', get_success_message($this->lang->line('profile_updated')));  
            }
            else
            {
                 $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }     

            redirect('settings/user/personal_profile', 'refresh');                   
        }
        else
        {
           redirect('login/four_zero_four', 'refresh'); 
        }
    }


    public function update_profile_pic()
    {
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $name_exploded      =   explode('.', $_FILES['avatar']['name']);
            $file_ext           =   end($name_exploded);
            $filename           =   'avatar_'.$this->session->userdata['id'].'.'.$file_ext; 
            move_uploaded_file($_FILES['avatar']['tmp_name'], './file-uploads/user-account-files/avatars/'.$filename);
            $data['avatar']             =   $filename;
            $data['last_updated_by']    =   $this->session->userdata['id'];            
            $data['last_updated_at']    =   date('Y-m-d H:i:s');

            if($this->Settings_Model->update_personal_profile($this->session->userdata['id'], $data))
            {
                $this->session->set_userdata('avatar', $data['avatar']);
                $this->session->set_flashdata('image_notification', get_success_message($this->lang->line('user_avatar_updated')));  
            }
            else
            {
                 $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }     

            redirect('settings/user/personal_profile', 'refresh');                   
        }
        else
        {
           redirect('login/four_zero_four', 'refresh'); 
        }
    }


    public function company_profile()
    {   
        $data['title']      =   'Company Profile'; 
        $data['icon']       =   $this->icon;
        $data['company']    =   $this->Settings_Model->get_company_details();
        $this->load->view('company-profile', $data);
    }


    public function update_company_details($company_id='')
    {
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['company_name']       =   $this->input->post('company_name'); 
            $data['tag_line']           =   $this->input->post('tag_line'); 
            $data['website_url']        =   $this->input->post('website_url');         
            $data['about_company']      =   $this->input->post('about_company'); 
            $data['contact_no']         =   $this->input->post('contact_no');
            $data['fax_no']             =   $this->input->post('fax_no');
            $data['email']              =   $this->input->post('email');               
            $data['country']            =   $this->input->post('country');
            $data['state']              =   $this->input->post('state');            
            $data['city']               =   $this->input->post('city');
            $data['address']            =   $this->input->post('address');
            $data['last_updated_by']    =   $this->session->userdata['id'];            
            $data['last_updated_at']    =   date('Y-m-d H:i:s');

            if($this->Settings_Model->update_company_details($company_id, $data))
            {
                $this->session->set_flashdata('profile_notification', get_success_message($this->lang->line('company_details_updated')));  
            }
            else
            {
                 $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }     

            redirect('settings/user/company_profile', 'refresh');                   
        }
        else
        {
           redirect('login/four_zero_four', 'refresh'); 
        }
    }


    public function update_company_logo($company_id)
    {
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $name_exploded          =   explode('.', $_FILES['logo']['name']);
            $file_ext               =   end($name_exploded);
            $filename               =   'avatar_'.$company_id.'.'.$file_ext; 

            if( move_uploaded_file($_FILES['logo']['tmp_name'], './file-uploads/user-account-files/logos/'.$filename))
            {
                $data['logo']               =   $filename;
                $data['last_updated_by']    =   $this->session->userdata['id'];            
                $data['last_updated_at']    =   date('Y-m-d H:i:s');
                $this->Settings_Model->update_company_details($company_id, $data);
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('company_logo_updated')));  
            }
            else
            {
                 $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }     

            redirect('settings/user/company_profile', 'refresh');                   
        }
        else
        {
           redirect('login/four_zero_four', 'refresh'); 
        }
    }


    public function change_password()
    {
        $data['title']      =   'Change Password'; 
        $data['icon']       =   $this->icon;
        $this->load->view('change-password', $data);
    }


    public function update_password()
    {
        if($this->input->post('old_password') && $this->input->post('password1'))
        {
            $user   =   $this->Settings_Model->get_personal_profile($this->session->userdata['id']);
            
            if($user['user_password'] == md5($this->input->post('old_password')))
            {
                $data['user_password']      =   md5($this->input->post('password1'));
                $data['last_updated_by']    =   $this->session->userdata['id'];            
                $data['last_updated_at']    =   date('Y-m-d H:i:s');
                
                if($this->Settings_Model->update_personal_profile($this->session->userdata['id'], $data))
                {
                    $this->session->set_flashdata('notification', get_success_message($this->lang->line('password_changed')));  
                }
                else
                {
                     $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
                }            
            }
            else
            { 
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('old_pass_donot_match')));                 
            }

            redirect('settings/user/change_password', 'refresh'); 
        }
        else
        {
           redirect('login/four_zero_four', 'refresh'); 
        }
    }
	
}
