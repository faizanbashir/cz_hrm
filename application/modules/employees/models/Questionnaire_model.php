<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Questionnaire_Model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }

    
    function add_question($data)
    {    
        
        if($this->db->insert('questionnaire', $data))
            return $this->db->insert_id();
        else
            return false;
    }
    
    
    function update_question($id, $data)
    {
        $this->db->where(array('id' => $id));
        if($this->db->update('questionnaire', $data))
            return true;
        else
            return false;
    }


    function get_questions()
    {
        $questions       =   $this->db->query("SELECT * FROM questionnaire WHERE status = 'active'")->result_array();
        return $questions;
    }
         

    function get_question_details($id)
    {
        $question       =   $this->db->query("SELECT * FROM questionnaire WHERE id = $id")->row_array();
        return $question;
    }


    function update_questionarie_settings($evaluation_months, $evaluation_authority)
    {
        $this->db->where(array('questionnaire_attribute' => 'evaluation_months'));
        $this->db->update('questionnaire_settings', $evaluation_months);
        
        $this->db->where(array('questionnaire_attribute' => 'evaluation_authority'));
        $this->db->update('questionnaire_settings', $evaluation_authority);

        return true;
    }

    
    function get_evaluation_months()
    {
        $settings       =   $this->db->query("SELECT * FROM questionnaire_settings WHERE questionnaire_attribute = 'evaluation_months' AND status = 'active'")->row_array();
        return $settings;
    }


    function get_evaluation_authority()
    {
        $settings       =   $this->db->query("SELECT * FROM questionnaire_settings WHERE questionnaire_attribute = 'evaluation_authority' AND status = 'active'")->row_array();
        return $settings;
    }
      
}