<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Designation_Model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }


    function add_designation($data)
    {
        if($this->db->insert('employee_designations', $data))
            return $this->db->insert_id();
        else
            return false;
    }


    function update_designation($id, $data)
    {
        $this->db->where(array('id' => $id));
        if($this->db->update('employee_designations', $data))
            return true;
        else
            return false;
    }


    function get_designation_details($id)
    {
        $designation        =   $this->db->query("SELECT * FROM employee_designations WHERE id = $id")->row_array();
        return $designation;
    }


    function get_designation_title($id)
    {
        $designation        =   $this->db->query("SELECT * FROM employee_designations WHERE id = $id")->row_array();
        return $designation['designation_title'];
    }


    function get_designations()
    {
        $designations       =   $this->db->query("SELECT * FROM employee_designations WHERE status != 'deleted' ORDER BY designation_title")->result_array();
        return $designations;
    }

}