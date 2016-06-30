<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Holiday_Model extends CI_Model
 {
    
    function __construct()
    {
        parent::__construct();
    }


    function insert($data)
    {
        if($this->db->insert('company_holidays', $data))
            return $this->db->insert_id();
        else
            return false;
    }


    function update($id, $data)
    {
        $this->db->where(array('id' => $id));
        if($this->db->update('company_holidays', $data))
            return true;
        else
            return false;
    }


    function get_holiday_details($id)
    {
        $holiday       =   $this->db->query("SELECT * FROM company_holidays WHERE id = $id")->row_array();
        return $holiday;
    }


    function get_holidays()
    {
        $holidays         =   $this->db->query("SELECT * FROM company_holidays WHERE status!='deleted' ")->result_array();
        return $holidays;
    }
 }
