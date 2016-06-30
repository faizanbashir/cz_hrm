<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Leave_Model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }

    
    function add_leave($data)
    {    
        
        if($this->db->insert('leaves', $data))
            return $this->db->insert_id();
        else
            return false;
    }


    function update_leave($id, $data)
    {
        $this->db->where(array('id' => $id));
        if($this->db->update('leaves', $data))
            return true;
        else
            return false;
    }
    

    function get_leave_details($id)
    {
        $leave       =   $this->db->query("SELECT * FROM leaves WHERE id = $id")->row_array();
        return $leave;
    }
   
    
    public function get_leaves()
    {
        $leaves  =   $this->db->query("SELECT * FROM leaves WHERE status != 'deleted'")->result_array();
        return $leaves;
    }


    function request($data)
    {    
        if($this->db->insert('employee_leaves', $data))
            return $this->db->insert_id();
        else
            return false;
    }


    public function get_employee_leaves($employee_id = '')
    {
        $query  =   " ";
        if($employee_id && $employee_id !== 'all')
        {
            $query .= " A.employee_id = $employee_id ";
        }
        else
        {
            $query .= " A.status != 'deleted' ";
        }
        
        $requests   =   $this->db->query("SELECT A.*, B.first_name, B.last_name, B.designation, C.leave_name FROM employee_leaves AS A LEFT JOIN employees AS B ON A.employee_id = B.id LEFT JOIN leaves AS C ON A.leave_id= C.id WHERE ".$query." ORDER BY A.id DESC")->result_array();
        return $requests;
    }


    function get_employee_leave_details($id)
    {
        $leave      =   $this->db->query("SELECT A.*, B.first_name, B.last_name, B.designation, C.leave_name FROM employee_leaves AS A LEFT JOIN employees AS B ON A.employee_id = B.id LEFT JOIN leaves AS C ON A.leave_id= C.id WHERE A.id = $id")->row_array();
        return $leave;
    }


    function update($id, $data)
    {
        $this->db->where(array('id' => $id));
        if($this->db->update('employee_leaves', $data))
            return true;
        else
            return false;
    }

}