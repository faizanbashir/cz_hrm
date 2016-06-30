<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Training_Attended_Model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }


	function add_training_attended($data)
    {
        if($this->db->insert('trainings_attended', $data))
            return $this->db->insert_id();
        else
            return false;
    }


    function update_training_attended($id, $data)
    {
        $this->db->where(array('id' => $id));
        if($this->db->update('trainings_attended', $data))
            return true;
        else
            return false;
    }


    function get_trainings_attended()
    {
        $trainings_attended       =   $this->db->query("SELECT * FROM trainings_attended WHERE status = 'active' ORDER BY id DESC")->result_array();
        return $trainings_attended;
    }    

    
    function get_training_attended_details($id)
    {
        $training   =   $this->db->query("SELECT * FROM trainings_attended WHERE id = $id")->row_array();
        return $training;
    }
    
   
      
}