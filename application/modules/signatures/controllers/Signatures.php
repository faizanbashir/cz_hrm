<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Signatures extends CI_Controller {

    private $icon   =   'fa fa-wechat';

	function __construct()
    {
        parent::__construct();
        $this->load->model('Signature_Model');
        $this->load->Model('employees/Employee_Model');
        
        # CHECKS THE CONTROLLERS'S USER ACCESSIBILITY
        if(!is_controller_accessible('signatures'))
            redirect('login/four_zero_four', 'refresh');
    }


	public function index()
    {   
        $data['title']      =   'Company Signatures'; 
        $data['icon']       =   $this->icon;
        $data['contacts']   =   $this->Contact_Model->get_contacts();
        $data['employees'] 	=	$this->Employee_Model->get_employees();
        $this->load->view('company-signatures', $data);
        
	}

    public function custom_signatures()
    {   
        $data['title']      =   'Customized Signatures'; 
        $data['icon']       =   $this->icon;
        $data['employees']  =   $this->Signature_Model->get_custom_employees();
        $this->load->view('custom-signatures', $data);
        
    }


    public function create_custom_signature()
    {   
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['name']           =   $this->input->post('name');
            $data['designation']    =   $this->input->post('designation');
            $data['email']          =   $this->input->post('email');
            $data['contact']        =   $this->input->post('contact');
            $data['mobile']         =   $this->input->post('mobile');

            if($this->Signature_Model->insert_custom_signatures($data))
            {
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('signature_created')));           
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }
                
            redirect('signatures/signatures/custom_signatures', 'refresh');

        }
        $data['title']      =   'Create Signature'; 
        $data['icon']       =   $this->icon;
        $this->load->view('create-sign', $data);
        
    }


    public function edit_custom_signature($id='')
    {   
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data['name']           =   $this->input->post('name');
            $data['designation']    =   $this->input->post('designation');
            $data['email']          =   $this->input->post('email');
            $data['contact']        =   $this->input->post('contact');
            $data['mobile']         =   $this->input->post('mobile');

            if($this->Signature_Model->update_custom_signatures($id, $data))
            {
                $this->session->set_flashdata('notification', get_success_message($this->lang->line('signature_updated')));           
            }
            else
            {
                $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
            }
                
            redirect('signatures/signatures/custom_signatures', 'refresh');

        }
        $data['title']      =   'Edit Signature'; 
        $data['icon']       =   $this->icon;
        $data['employee']   =   $this->Signature_Model->get_custom_employees_details($id);
        $this->load->view('create-sign', $data);
        
    }


    public function delete($id = '')
    {   
        $data['status']             =   'deleted';
        $data['last_updated_by']    =   $this->session->userdata['id'];
        $data['last_updated_at']    =   date('Y-m-d H:i:s');

        if($this->Signature_Model->update_custom_signatures($id, $data))
        {
            $this->session->set_flashdata('notification', get_success_message($this->lang->line('signature_updated')));           
        }
        else
        {
            $this->session->set_flashdata('notification', get_error_message($this->lang->line('gen_error_msg')));  
        }
                
        redirect('signatures/signatures/custom_signatures', 'refresh');
    }    

    
    public function company_sign()
    {
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $id             =   $this->input->post('id');
            $output         =   $this->Signature_Model->get_company_signature($id);
            if(!empty($output))
            {
                echo $output;
            }
        }
    }


    public function custom_sign()
    {
        if($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $id             =   $this->input->post('id');
            $output         =   $this->Signature_Model->get_custom_signature($id);
            if(!empty($output))
            {
                echo $output;
            }
        }
    }

    public function download_signature($signature_type = '', $employee_id = '')
   {
       if(!is_numeric($employee_id))
       {
           redirect('login/four_zero_four', 'refresh');
       }

       if($signature_type=='company_signature')
       {
            $data         =   $this->Signature_Model->get_company_signature($employee_id);
       }
       else
       {
            $data         =   $this->Signature_Model->get_custom_signature($employee_id);
       }
       
       if(!empty($data))
       {
           $this->load->helper('download');
           $name = 'signature.html';
           force_download($name, $data);
           exit;
       }
       else
       {
           redirect('login/four_zero_four', 'refresh');
       }
   }
	
}
