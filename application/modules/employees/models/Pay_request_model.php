<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pay_Request_Model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }


    function add_pay_request($data)
    {
        if($this->db->insert('advance_pay_requests', $data))
            return $this->db->insert_id();
        else
            return false;
    }


    function update_pay_request($id, $data)
    {
        $this->db->where(array('id' => $id));
        if($this->db->update('advance_pay_requests', $data))
            return true;
        else
            return false;
    }

	
    function get_pay_requests($employee_id = '')
    {
        $query      =   "";
        if($employee_id)
        {
            $query  =   "employee_id = $employee_id AND";
        }

        $advance_pay_request       =   $this->db->query("SELECT * FROM advance_pay_requests WHERE ".$query." status != 'deleted' ORDER BY id DESC")->result_array();
        return $advance_pay_request;
    }


    function get_pay_request_details($request_id)
    {
        $advance_pay_requests       =   $this->db->query("SELECT * FROM advance_pay_requests WHERE id = $request_id")->row_array();
        return $advance_pay_requests;
    }


}