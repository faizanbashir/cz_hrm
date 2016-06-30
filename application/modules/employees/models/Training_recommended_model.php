<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Training_Recommended_Model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }


	function add_training_recommended($data)
    {
        if($this->db->insert('trainings_recommended', $data))
            return $this->db->insert_id();
        else
            return false;
    }


    function update_training_recommended($id, $data)
    {
        $this->db->where(array('id' => $id));
        if($this->db->update('trainings_recommended', $data))
            return true;
        else
            return false;
    }


    function get_trainings_recommended()
    {
        $trainings_recommended       =   $this->db->query("SELECT A.*, B.first_name, B.last_name, B.designation FROM trainings_recommended AS A INNER JOIN employees AS B ON A.recommended_by = B.id WHERE A.status != 'deleted' ORDER BY A.id DESC")->result_array();
        return $trainings_recommended;
    }
    

    
    function get_training_recommended_details($id)
    {
        $training   =   $this->db->query("SELECT * FROM trainings_recommended WHERE id = $id")->row_array();
        return $training;
    }
    
   
      
}