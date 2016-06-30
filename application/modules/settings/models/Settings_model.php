<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings_Model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }
    
    
    function get_personal_profile($user_id)
    {
        $profile        =   $this->db->query("SELECT * FROM employees WHERE id = $user_id")->row_array();
        return $profile;
    }


    function get_company_details()
    {
        $company        =   $this->db->query("SELECT * FROM company_details ORDER BY id DESC LIMIT 0,1")->row_array();
        return $company;
    }


    function update_personal_profile($id, $data)
    {
        $this->db->where(array('id' => $id));
        if($this->db->update('employees', $data))
            return true;
        else
            return false;
    }


    function update_company_details($id, $data)
    {
        $this->db->where(array('id' => $id));
        if($this->db->update('company_details', $data))
            return true;
        else
            return false;
    }

    
}

