<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Qualification_Model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }


    function add_qualification($data)
    {
        if($this->db->insert('employee_qualification', $data))
            return $this->db->insert_id();
        else
            return false;
    }


    function update_qualification($id, $data)
    {
        $this->db->where(array('id' => $id));
        if($this->db->update('employee_qualification', $data))
            return true;
        else
            return false;
    }


    function delete_qualification($employee_id)
    {
        $data['status']             =   'deleted';
        $data['last_updated_by']    =   $this->session->userdata['id'];
        $data['last_updated_at']    =   date('Y-m-d H:i:s');
        $this->db->where(array('employee_id' => $employee_id));
        if($this->db->update('employee_qualification', $data))
            return true;
        else
            return false;
    }


    function get_qualifications($employee_id)
    {
        $experience       =   $this->db->query("SELECT * FROM employee_qualification WHERE employee_id = $employee_id AND status = 'active'")->result_array();
        return $experience;
    }
    

}