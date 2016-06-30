<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Experience_Model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }


    function add_experience($data)
    {
        if($this->db->insert('employee_experience', $data))
            return $this->db->insert_id();
        else
            return false;
    }


    function update_experience($id, $data)
    {
        $this->db->where(array('id' => $id));
        if($this->db->update('employee_experience', $data))
            return true;
        else
            return false;
    }


    function delete_experience($employee_id)
    {
        $data['status']             =   'deleted';
        $data['last_updated_by']    =   $this->session->userdata['id'];
        $data['last_updated_at']    =   date('Y-m-d H:i:s');
        $this->db->where(array('employee_id' => $employee_id));
        if($this->db->update('employee_experience', $data))
            return true;
        else
            return false;
    }


    function get_experience($employee_id)
    {
        $experience       =   $this->db->query("SELECT * FROM employee_experience WHERE employee_id = $employee_id AND status = 'active'")->result_array();
        return $experience;
    }
    

}