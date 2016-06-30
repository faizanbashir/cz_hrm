<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Office_Model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }


    function insert($data)
    {
        if($this->db->insert('office_settings', $data))
            return $this->db->insert_id();
        else
            return false;
    }


    function update($id, $update)
    {
        $this->db->where(array('id' => $id));
        if($this->db->update('office_settings', $update))
            return true;
        else
            return false;
    }


    /*function get_last_row()
    {
        $last      	=   $this->db->query("SELECT id FROM office_settings WHERE id=(SELECT MAX(id) FROM `office_settings`); ")->row_array();
        $id 		=	$last['id'];
        return $id;
    }*/


   function get_history_details($id)
    {
        $history       =   $this->db->query("SELECT * FROM office_settings WHERE id = $id ")->row_array();
        return $history;
    }

    function get_office_settings()
    {
        $office       =   $this->db->query("SELECT * FROM office_settings WHERE id=(SELECT MAX(id) FROM `office_settings`); ")->row_array();
        return $office;
    }

    function get_history()
    {
        $history       =   $this->db->query("SELECT * FROM office_settings WHERE status != 'deleted'")->result_array();
        return $history;
    }


}