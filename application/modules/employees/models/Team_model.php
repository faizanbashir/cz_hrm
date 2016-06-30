<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Team_Model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }


    function add_team($data)
    {
        if($this->db->insert('employee_teams', $data))
            return $this->db->insert_id();
        else
            return false;
    }


    function update_team($id, $data)
    {
        $this->db->where(array('id' => $id));
        if($this->db->update('employee_teams', $data))
            return true;
        else
            return false;
    }


    function get_team_details($team_id)
    {
        $team        =   $this->db->query("SELECT * FROM employee_teams WHERE id = '$team_id' AND status = 'active'")->row_array();
        return $team;
    }


    function get_teams()
    {
        $teams       =   $this->db->query("SELECT * FROM employee_teams WHERE status != 'deleted'")->result_array();
        return $teams;
    }


}