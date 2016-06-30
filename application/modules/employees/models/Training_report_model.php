<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Training_Report_Model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }

	function get_training_report($data)
	{
		$type			=	$data['type'];
		$start 			=	$data['training_start'];
		$end 			=	$data['training_end'];
		$employee_id	=	$data['employee_id'];		

		if($type == 'trainings_attended')
		{
			$emp_id 	=	"attended_by";
		}
		elseif($type == 'trainings_recommended')
		{
			$emp_id 	=	"recommended_for";
		}
		else
		{
			$emp_id 	=	"requested_by";
		}

		if($employee_id)
		{
			$emp 			=	implode($employee_id, ',');
			$query 		=	"A.`".$emp_id."` IN(".$emp.") AND";
		}
		else
			$query 		=	"";

		$reports        =  	$this->db->query("SELECT A.*, B.first_name, B.last_name, B.designation FROM `".$type."` AS A LEFT JOIN employees AS B ON A.`".$emp_id."` = B.id WHERE ".$query." A.`training_start`>= '".$start."' AND A.`training_end`<= '".$end."'")->result_array();
		return $reports;
	}
    
}