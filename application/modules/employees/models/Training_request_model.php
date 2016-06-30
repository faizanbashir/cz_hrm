<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Training_Request_Model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }


	function add_training_request($data)
    {
        if($this->db->insert('trainings_requests', $data))
            return $this->db->insert_id();
        else
            return false;
    }


    function update_training_request($id, $data)
    {
        $this->db->where(array('id' => $id));
        if($this->db->update('trainings_requests', $data))
            return true;
        else
            return false;
    }


    function get_trainings_requested($employee_id = '')
    {
        $query      =   "";
        if($employee_id)
        {
            $query  =   "A.requested_by = $employee_id AND";
        }

        $trainings_requests     =   $this->db->query("SELECT A.*, B.first_name, B.last_name, B.designation FROM trainings_requests AS A INNER JOIN employees AS B ON A.requested_by = B.id WHERE ".$query." A.status != 'deleted' ORDER BY A.id DESC")->result_array();
        return $trainings_requests;
    }    

    
    function get_training_request_details($id)
    {
        $training               =   $this->db->query("SELECT * FROM trainings_requests WHERE id = $id")->row_array();
        return $training;
    }
    
}