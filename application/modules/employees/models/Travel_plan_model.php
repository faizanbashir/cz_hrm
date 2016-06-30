<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Travel_Plan_Model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }


	function add_travel_plan($data)
    {
        if($this->db->insert('travel_plans', $data))
            return $this->db->insert_id();
        else
            return false;
    }


    function update_travel_plan($id, $data)
    {
        $this->db->where(array('id' => $id));
        if($this->db->update('travel_plans', $data))
            return true;
        else
            return false;
    }


    function get_travel_plans()
    {
        $travel_plans 	=   $this->db->query("SELECT * FROM travel_plans WHERE status != 'deleted' ORDER BY id DESC")->result_array();
        return $travel_plans;
    }
    

    
    function get_travel_plan_details($id)
    {
        $travel_plan   	=   $this->db->query("SELECT * FROM travel_plans WHERE id = $id")->row_array();
        return $travel_plan;
    }
    
   
      
}