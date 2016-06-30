<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notifications_Model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }

    
    function add_notification($data)
    {    
        
        if($this->db->insert('notifications', $data))
            return $this->db->insert_id();
        else
            return false;
    }
    
    
    function update_notification($id, $data)
    {
        $this->db->where(array('id' => $id));
        if($this->db->update('notifications', $data))
            return true;
        else
            return false;
    }


    function get_unread_notifications($reciever_id)
    {
        $notifications       =   $this->db->query("SELECT A.*, B.first_name, B.last_name, B.avatar FROM notifications AS A INNER JOIN employees AS B ON A.sender_id = B.id WHERE A.reciever_id = $reciever_id AND A.status = 'unread'")->result_array();
        return $notifications;
    }


    function get_all_notifications($reciever_id)
    {
        $notifications       =   $this->db->query("SELECT A.*, B.first_name, B.last_name, B.avatar FROM notifications AS A INNER JOIN employees AS B ON A.sender_id = B.id WHERE A.reciever_id = $reciever_id AND A.status != 'deleted'")->result_array();
        return $notifications;
    }


    function get_notification_recievers($controller)
    {
        $designations       =   $this->db->query("SELECT employee_designations FROM roles WHERE controller = '$controller'")->row_array();
        $query  =   "";
        if($designations['employee_designations'])
            $query  =   "designation_id IN (".$designations['employee_designations'].") OR";
        $users       =   $this->db->query("SELECT id FROM employees WHERE ".$query." designation = 'Admin' AND status = 'active'")->result_array();
        return $users;
    }

}