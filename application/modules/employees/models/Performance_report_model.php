<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Performance_Report_Model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }

    function insert_report($data)
    {
        if($this->db->insert('employee_performance_reports', $data))
            return $this->db->insert_id();
        else
            return false;
    }


    function update_report($id, $data)
    {
        $this->db->where(array('id' => $id));
        if($this->db->update('employee_performance_reports', $data))
            return true;
        else
            return false;
    }


    function get_employees()
    {
        $employees        =   $this->db->query("SELECT A.*, B.first_name, B.last_name, B.designation FROM employee_performance_reports AS A INNER JOIN employees AS B ON A.employee_id = B.id  WHERE A.status = 'active' GROUP BY A.employee_id")->result_array();
        return $employees;
    }


    function get_performance_reports($id)
    {
        $reports        =   $this->db->query("SELECT * FROM employee_performance_reports WHERE employee_id = $id AND status = 'active'")->result_array();
        return $reports;
    }


}