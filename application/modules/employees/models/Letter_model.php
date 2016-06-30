<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Letter_Model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }

    
    function add_letter($data)
    {    
        
        if($this->db->insert('letter_categories', $data))
            return $this->db->insert_id();
        else
            return false;
    }


    function update_letter($id, $data)
    {
        $this->db->where(array('id' => $id));
        if($this->db->update('letter_categories', $data))
            return true;
        else
            return false;
    }
    

    function get_letter_details($id)
    {
        $letter       =   $this->db->query("SELECT * FROM letter_categories WHERE id = $id")->row_array();
        return $letter;
    }
   
    
    public function get_letters()
    {
        $letters  =   $this->db->query("SELECT * FROM letter_categories WHERE status != 'deleted' ORDER BY category_title ASC")->result_array();
        return $letters;
    }


    function insert_emp_letter($data)
    {    
        if($this->db->insert('company_letters', $data))
            return $this->db->insert_id();
        else
            return false;

    }


    public function get_emp_letter_details($id)
    {
        $letter  =   $this->db->query("SELECT A.*, B.*, C.category_title FROM company_letters AS A LEFT JOIN employees AS B ON A.recipient = B.id LEFT JOIN letter_categories AS C ON A.category_id= C.id  WHERE A.id= ".$id)->row_array();
        return $letter;
    }

     public function get_employee_letters()
    {
        $letters  =   $this->db->query("SELECT A.*, B.first_name, B.last_name FROM company_letters AS A LEFT JOIN employees AS B ON A.recipient = B.id WHERE  A.status='active'")->result_array();
        return $letters;
    }
    

     function update_emp_letter($id, $data)
    {
        $this->db->where(array('id' => $id));
        if($this->db->update('company_letters', $data))
            return true;
        else
            return false;
    }
}