<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Roles_Model extends CI_Model
    {
    
    function __construct()
    {
        parent::__construct();
    }


    function update_role($id, $data)
    {   
        $this->db->where(array('id' => $id));
        if($this->db->update('roles', $data))
            return true;
        else
            return false;
    }


    function get_roles()
    {
        $roles  =   $this->db->query("SELECT * FROM roles")->result_array();
        return $roles;
    }


    function get_employee_roles($designation)
    {
        $roles  =   $this->db->query("SELECT * FROM roles WHERE employee_designations LIKE '%".$designation."%' AND status = 'active'")->result_array();
        return $roles;
    }
    
}