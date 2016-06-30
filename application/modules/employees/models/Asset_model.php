<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Asset_Model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }


    function issue_asset($data)
    {
        if($this->db->insert('employee_assets', $data))
            return $this->db->insert_id();
        else
            return false;
    }


    function update_asset($id, $data)
    {
        $this->db->where(array('id' => $id));
        if($this->db->update('employee_assets', $data))
            return true;
        else
            return false;
    }


    function get_asset_details($id)
    {
        $asset       =   $this->db->query("SELECT * FROM employee_assets WHERE id = $id")->row_array();
        return $asset;
    }


    function get_assets()
    {
        $assets         =   $this->db->query("SELECT A.*, B.first_name, B.last_name, B.designation FROM employee_assets AS A LEFT JOIN employees AS B ON A.employee_id = B.id WHERE A.status!='deleted' ORDER BY first_name")->result_array();
        return $assets;
    }

}