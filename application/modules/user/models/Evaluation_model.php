<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Evaluation_Model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }

    
    function add_question($data)
    {    
        
        if($this->db->insert('employee_evaluation', $data))
            return $this->db->insert_id();
        else
            return false;
    }
    
    
    function update_question($id, $data)
    {
        $this->db->where(array('id' => $id));
        if($this->db->update('employee_evaluation', $data))
            return true;
        else
            return false;
    }


    function is_evaluation_month()
    {
        $evaluation     =   $this->db->query("SELECT * FROM questionnaire_settings WHERE questionnaire_attribute = 'evaluation_months' AND status = 'active'")->row_array();
        $evaluation_months  =   explode(',', $evaluation['attribute_value']);  
        if(in_array(date('n'), $evaluation_months))
        {
            if($this->is_evaluation_done(date('m')))
                return false;
            else
                return true;
        }
        else
        {
            return false;
        }
    }


    function is_evaluation_done($month)
    {
        $questions      =   $this->db->query("SELECT id FROM employee_evaluation WHERE employee_id = ".$this->session->userdata['id']." AND YEAR(created_at) = '".date('Y')."' AND MONTH(created_at) = '".$month."'")->num_rows();
        return $questions;
    }


    function get_employees_feedback($year)
    {
        $query  =   "";
        if(is_numeric($year))
            $query      =   "WHERE YEAR(created_at) = '".$year."'";
        $feedback       =   $this->db->query("SELECT * FROM employee_evaluation ".$query." GROUP BY created_at")->result_array();
        return $feedback;
    }


    function get_employee_rating($created_at)
    {
        $feedback       =   $this->db->query("SELECT COUNT(id) AS total_questions, SUM(employee_rating) AS employee_ratings FROM employee_evaluation WHERE created_at = '".$created_at."'")->row_array();
        return number_format($feedback['employee_ratings']/$feedback['total_questions'], 2, '.', ''); 
    }


    function get_others_rating($created_at)
    {
        $feedback       =   $this->db->query("SELECT concerned_head_ratings FROM employee_evaluation WHERE created_at = '".$created_at."'")->result_array();

        $ratings        =   array();  
        $count          =   0;
        foreach($feedback as $row)
        {
            $heads  =   explode(',', $row['concerned_head_ratings']);
            if(!empty($heads[0]))
            {
                foreach($heads as $head)
                {
                    $items  =   explode('-', $head);
                    if(!empty($ratings[$items[0]]))
                        $ratings[$items[0]]    +=   $items[1];
                    else
                        $ratings[$items[0]]     =   $items[1];
                }
            }
            $count++;
        }

        $ratings['count']    =   $count;
        return $ratings;
    }


    function get_employee_feedback($timestamp)
    {
        $timestamp      =   urldecode($timestamp);
        $feedback       =   $this->db->query("SELECT * FROM employee_evaluation WHERE created_at = '".$timestamp."'")->result_array();
        return $feedback;
    }
         

}