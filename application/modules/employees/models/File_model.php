<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class File_Model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }


    function add_file($data)
    {
        if($this->db->insert('employee_files', $data))
            return $this->db->insert_id();
        else
            return false;
    }


    function update_file($id, $data)
    {
        $this->db->where(array('id' => $id));
        if($this->db->update('employee_files', $data))
            return true;
        else
            return false;
    }


    function delete_files($employee_id)
    {
        $data['status']             =   'deleted';
        $data['last_updated_by']    =   $this->session->userdata['id'];
        $data['last_updated_at']    =   date('Y-m-d H:i:s');
        $this->db->where(array('employee_id' => $employee_id));
        if($this->db->update('employee_files', $data))
            return true;
        else
            return false;
    }


    function get_files($employee_id)
    {
        $files          =   $this->db->query("SELECT * FROM employee_files WHERE employee_id = $employee_id AND status = 'active'")->result_array();
        return $files;
    }
    

}