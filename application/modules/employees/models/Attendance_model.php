<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Attendance_Model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }

    
    function insert_login($data)
    {
        if($this->db->insert('employee_login', $data))
            return $this->db->insert_id();
        else
            return false; 
    }


    function update_login($id, $data)
    {
        $this->db->where(array('id' => $id));
        if($this->db->update('employee_login', $data))
            return true;
        else
            return false;
    }


    function get_logins($date)
    {        
        if($date)
            $query      =   "DATE(A.created_at) = '".$date."' AND";
        else
            $query      =   "DATE(A.created_at) = '".date('Y-m-d')."' AND";

        $login          =   $this->db->query("SELECT A.*, B.first_name, B.last_name, B.designation FROM employee_login AS A LEFT JOIN employees AS B ON A.employee_id = B.id WHERE ".$query." A.status != 'deleted'")->result_array();
        return $login;
    }


    function get_user_logged_in_details($employee_id)
    {        
        $login          =   $this->db->query("SELECT * FROM employee_login WHERE employee_id = $employee_id AND DATE(created_at) = '".date('y-m-d')."' AND status != 'deleted'")->row_array();
        return $login;
    }


    function request_extra_hours($data)
    {    
        if($this->db->insert('late_sitting', $data))
            return $this->db->insert_id();
        else
            return false;
    }

   
    function update_extra_hours($id, $data)
    {
        $this->db->where(array('id' => $id));
        if($this->db->update('late_sitting', $data))
            return true;
        else
            return false;
    }
    
    
    function get_extra_hours($employee_id = '')
    {
        $query      =   "";
        if($employee_id)
        {
            $query  =   "A.employee_id = $employee_id AND";
        }

        $result= $this->db->query("SELECT A.*, B.first_name, B.last_name, B.designation FROM late_sitting AS A LEFT JOIN employees AS B ON A.employee_id = B.id WHERE ".$query." A.status != 'deleted'")->result_array();
        return $result;
    }
    
    
    function extra_hours_details($id)
    {
        $result     =   $this->db->query("SELECT * FROM late_sitting WHERE id = $id")->row_array();
        return $result;
    }   
    
    
    function get_off_days($employee_id = '')
    {
        $query      =   "";
        if($employee_id)
        {
            $query  =   "A.employee_id = $employee_id AND";
        }

        $result     =   $this->db->query("SELECT A.*, B.first_name, B.last_name, B.designation FROM off_day AS A LEFT JOIN employees AS B ON A.employee_id = B.id WHERE ".$query." A.status != 'deleted'")->result_array();
        return $result;
    }
    
    
    function off_day_details($id)
    {
        $result     =   $this->db->query("SELECT * FROM off_day WHERE id = $id")->row_array();
        return $result;
    }
    
    
    function request_of_day($data)
    {    
        if($this->db->insert('off_day', $data))
            return $this->db->insert_id();
        else
            return false;
    }
    
    
    function update_of_day($id, $data)
    {
        $this->db->where(array('id' => $id));
        if($this->db->update('off_day', $data))
            return true;
        else
            return false;
    }     

    
    function get_employee_login_details($employee_id, $date)
    {
        $login  =   $this->db->query("SELECT * FROM employee_login WHERE employee_id = $employee_id AND DATE(created_at) = '".$date."' AND status = 'active'")->row_array();
        return $login;
    }  


    function request_missing($data)
    {    
        if($this->db->insert('miss_attendance', $data))
            return $this->db->insert_id();
        else
            return false;
    }


    function update_missing($id, $data)
    {
        $this->db->where(array('id' => $id));
        if($this->db->update('miss_attendance', $data))
            return true;
        else
            return false;
    }
    
    function approve_missing($id, $data)
    {
        $updated_by     =   $data['last_updated_by'];
        $updated_at     =   $data['last_updated_at'];
        
        $this->load->model('settings/Settings_Model');
        $company        =   $this->Settings_Model->get_company_details();
        
        $time_details   =   $this->missing_details($id);
        $timein         =   $company['office_timing_from'];
        $timeout        =   $company['office_timing_to'];
       
        if($time_details['missed'] == 'time-in')
        {
            
            $exists     =   $this->db->query("SELECT id FROM employee_login  WHERE DATE(created_at) = '".$time_details['date']."' AND employee_id = ".$time_details['employee_id']." AND status = 'active'")->num_rows();
            
             if(!$exists)
                return false;

            $executed   =   $this->db->query("UPDATE employee_login SET logged_in_at = '$timein', last_updated_by = '$updated_by', last_updated_at = '$updated_at' WHERE DATE(created_at) = '".$time_details['date']."' AND employee_id = ".$time_details['employee_id']." AND status = 'active'"); 
                      
        }
        elseif($time_details['missed'] == 'time-out')
        {
           
            $exists     =   $this->db->query("SELECT id FROM employee_login  WHERE DATE(created_at) = '".$time_details['date']."' AND employee_id = ".$time_details['employee_id']." AND status = 'active'")->num_rows();

             if(!$exists)
                return false;
            
            $executed   =   $this->db->query("UPDATE employee_login SET logged_out_at = '$timeout' , last_updated_by = '$updated_by', last_updated_at = '$updated_at' WHERE DATE(created_at) = '".$time_details['date']."' AND employee_id = ".$time_details['employee_id']." AND status = 'active'");
            
        }
        else
        {   
            $login_data['employee_id']      =   $time_details['employee_id'];
            $login_data['logged_in_at']     =   $timein;
            $login_data['logged_out_at']    =   $timeout;
            $login_data['created_by']       =   $this->session->userdata['id'];
            $login_data['created_at']       =   $time_details['date'];

            if(!$this->db->insert('employee_login', $login_data))
                return false;
        }  

        $this->db->where(array('id' => $id));
        if($this->db->update('miss_attendance', $data))
            return true;
        else
            return false;

    }  


    function get_missing_time($employee_id = '')
    {
        $query      =   "";
        if($employee_id)
        {
            $query  =   "A.employee_id = $employee_id AND";
        }

        $result =   $this->db->query("SELECT A.*, B.first_name, B.last_name, B.designation FROM miss_attendance AS A LEFT JOIN employees AS B ON A.employee_id = B.id WHERE ".$query." A.status != 'deleted'")->result_array();
        return $result;
    }

    
    function missing_details($id)
    {
        $result =   $this->db->query("SELECT * FROM miss_attendance WHERE id = $id")->row_array();
        return $result;
    }  

  

}