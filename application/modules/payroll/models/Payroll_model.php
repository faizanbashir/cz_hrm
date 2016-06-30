<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payroll_Model extends CI_Model {
	
	function __construct(){
        parent::__construct();

    }

    function add_monthly_earnings($month)
    {
        if($this->db->insert('monthly_earnings', $month))
            return $this->db->insert_id();
        else
            return false;
    }

    function get_employee_salary($employee_id)
    {
        $salary         =   $this->db->query("SELECT * FROM  employee_salary WHERE employee_id = $employee_id AND status = 'active' ORDER BY id DESC")->row_array();
       return $salary;
    }

    function get_monthly_earnings($employee_id, $date)
    {
        $earnings         =   $this->db->query("SELECT * FROM  monthly_earnings WHERE employee_id = $employee_id AND status = 'active' ORDER BY id DESC")->row_array();
       return $earnings;
    }


}
