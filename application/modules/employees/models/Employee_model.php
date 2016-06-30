<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee_Model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }


    function add_employee($data)
    {
        if($this->db->insert('employees', $data))
            return $this->db->insert_id();
        else
            return false;
    }


    function update_employee($id, $data)
    {
        $this->db->where(array('id' => $id));
        if($this->db->update('employees', $data))
            return true;
        else
            return false;
    }

	
    function get_employees()
    {
        $employees       =   $this->db->query("SELECT * FROM employees WHERE designation != 'admin' AND status = 'active' ORDER BY first_name")->result_array();
        return $employees;
    }


    function get_employee_details($employee_id)
    {
        $employee       =   $this->db->query("SELECT * FROM employees WHERE id = $employee_id")->row_array();
        return $employee;
    }


    function get_employee_doj($employee_id)
    {
        $employee       =   $this->db->query("SELECT doj FROM employees WHERE id = $employee_id")->row_array();
        return $employee['doj'];
    }


    function get_employee_mobile_no($employee_id)
    {
        $employee       =   $this->db->query("SELECT mobile_no FROM employees WHERE id = $employee_id")->row_array();
        return $employee['mobile_no'];
    }


    function get_employee_name_designation($employee_id)
    {
        $employee       =   $this->db->query("SELECT * FROM employees WHERE id = $employee_id")->row_array();
        return $employee['first_name'].' '.$employee['last_name'].' ['.$employee['designation'].']';
    }

}