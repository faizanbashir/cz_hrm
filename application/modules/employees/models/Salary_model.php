<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Salary_Model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }


    function add_salary($employee_id, $data)
    {
        $salary = $this->get_employee_salary($employee_id);

        if($salary['basic_salary'] !== $data['basic_salary'] || $salary['house_allowance'] !== $data['house_allowance'] || $salary['travelling_allowance'] !== $data['travelling_allowance'] || $salary['other_allowance'] !== $data['other_allowance'] || $salary['salary'] !== $data['salary'])
        {
            if($this->delete_salary($salary['id']))
            {
                if($this->db->insert('employee_salary', $data))
                    return $this->db->insert_id();
                else
                    return false;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return true;
        }
    }


    function update_salary($id, $data)
    {
        $this->db->where(array('id' => $id));
        if($this->db->update('employee_salary', $data))
            return true;
        else
            return false;
    }


    function delete_salary($salary_id)
    {
        $data['status']             =   'deleted';
        $data['last_updated_by']    =   $this->session->userdata['id'];
        $data['last_updated_at']    =   date('Y-m-d H:i:s');
        $this->db->where(array('id' => $salary_id));
        if($this->db->update('employee_salary', $data))
            return true;
        else
            return false;
    }


    function get_employee_salary($employee_id)
    {
        $salary         =   $this->db->query("SELECT * FROM employee_salary WHERE employee_id = $employee_id AND status = 'active' ORDER BY id DESC")->row_array();
        return $salary;
    }


    function get_employees_salaries()
    {
        $salaries       =   $this->db->query("SELECT A.*, B.first_name, B.last_name, B.designation FROM employee_salary AS A INNER JOIN employees AS B ON A.employee_id = B.id WHERE A.status = 'active' ORDER BY B.first_name")->result_array();
        return $salaries;
    }


    function get_employee_salary_timeline($employee_id)
    {
        $salaries       =   $this->db->query("SELECT * FROM employee_salary WHERE employee_id = $employee_id")->result_array();
        return $salaries;
    }
    

}