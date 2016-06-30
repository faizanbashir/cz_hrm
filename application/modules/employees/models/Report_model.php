<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_Model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }

    
	function attendance_reports($data, $start, $end)
	{
		$employee_id	=	$data['single_employee_id'];
		if($employee_id)
		{
			$query 		=	"A.employee_id = $employee_id AND";
		}
		else
		{
			$query 		=	"";
		}

		$reports['attendance']       		=   $this->db->query("SELECT A.*, B.first_name, B.last_name, B.designation FROM employee_login AS A LEFT JOIN employees AS B ON A.employee_id = B.id WHERE ".$query." DATE(A.`created_at`) BETWEEN '".$start."' AND '".$end."'")->result_array();

		$reports['average_logged_in']   	=   $this->db->query("SELECT SEC_TO_TIME(AVG(TIME_TO_SEC(`logged_in_at`))) AS logged_in_at FROM employee_login WHERE employee_id = $employee_id AND DATE(`created_at`) BETWEEN '".$start."' AND '".$end."'")->row_array();

		$reports['average_logged_out_in']	=   $this->db->query("SELECT SEC_TO_TIME(AVG(TIME_TO_SEC(`logged_out_at`))) AS logged_out_at FROM employee_login  WHERE employee_id = $employee_id AND logged_out_at IS NOT NULL AND DATE(`last_updated_at`) BETWEEN '".$start."' AND '".$end."'")->row_array();

		return $reports;
	}

	function get_weekends($start, $end)
	{
		$office 	=	$this->db->query("SELECT * FROM office_settings WHERE ('".$start."' BETWEEN applicable_from AND IFNULL(applicable_to, '".$end."')) AND status != 'deleted' ")->row_array();
		
		$days_array     =   explode(',', $office['weekends']);
       	$weekends       =   0;
       	while(strtotime($start) <= strtotime($end))
       	{
           $date   =   date('N', strtotime($start));
           if(in_array($date, $days_array))
           {
               $weekends++;    
           }
           $start  = date('Y-m-d', strtotime("+1 day", strtotime($start)));
       	}
		return $weekends;
	}

	function get_approved_leaves($employee_id, $start, $end)
	{
		$leaves 	=	0;		

		while (strtotime($start) <= strtotime($end)) 
		{
			$query 	=   $this->db->query("SELECT employee_leaves.id, leaves.leave_type FROM employee_leaves INNER JOIN leaves ON employee_leaves.leave_id = leaves.id WHERE employee_leaves.employee_id = $employee_id AND (employee_leaves.leave_from BETWEEN '".$start."' AND '".$start."' OR employee_leaves.leave_to BETWEEN '".$start."' AND '".$start."') AND employee_leaves.status = 'approved' AND leaves.leave_type = 'full_day'")->num_rows();
			if($query)
		    	$leaves++;

		    $start = date("Y-m-d", strtotime("+1 day", strtotime($start)));

		}
		
		return $leaves;
	}


	function get_holidays($start, $end)
	{
		$holidays 	=   $this->db->query("SELECT id FROM company_holidays WHERE DATE(date) BETWEEN '".$start."' AND '".$end."' AND status = 'active'")->num_rows();
		return $holidays;
	}


	function get_off_day_requests($employee_id, $start, $end)
	{
		$offdays 	=   $this->db->query("SELECT id FROM off_day WHERE employee_id = $employee_id AND (DATE(date) BETWEEN '".$start."' AND '".$end."') AND status = 'approved'")->num_rows();
		
		return $offdays;
	}


	function get_extra_time_requests($employee_id, $start, $end)
	{
		$late_sittings 	=   $this->db->query("SELECT SUM(hours) AS total_hours FROM late_sitting WHERE employee_id = $employee_id AND (DATE(date) BETWEEN '".$start."' AND '".$end."') AND status = 'approved'")->row_array();
		
		return $late_sittings['total_hours'];
	}

	function get_half_days($employee_id, $start, $end)
	{
		$half_days 	=	0;	
		while(strtotime($start) <= strtotime($end)) 
		{
           	$query 	=   $this->db->query("SELECT A.leave_from FROM employee_leaves AS A INNER JOIN leaves AS B ON A.leave_id = B.id WHERE A.employee_id = $employee_id AND (DATE(A.leave_from) BETWEEN '".$start."' AND '".$start."' OR DATE(A.leave_to) BETWEEN '".$start."' AND '".$start."') AND A.status = 'approved' AND B.leave_type = 'half_day'")->row_array();
		    if($query['leave_from'])
		    	//$half_days[] 	=	$query['leave_from'];
		    	$half_days++;
		    $start = date("Y-m-d", strtotime("+1 day", strtotime($start)));
		}
		
		return $half_days;
	}

    
    function leave_reports($data)
	{
		$employee_id	=	$data['employee_id'];
		
		if($employee_id)
		{
			$emp 		=	implode($employee_id, ',');
			$query 		=	"A.employee_id IN(".$emp.") AND";
		}
		else
		{
			$query 		=	"";
		}

		$start			=	$data['start'];
		$end 			=	$data['end'];
		$reports     	=   $this->db->query("SELECT A.*, B.first_name, B.last_name, B.designation, C.leave_name FROM employee_leaves AS A LEFT JOIN employees AS B ON A.employee_id = B.id LEFT JOIN leaves AS C ON A.leave_id= C.id WHERE ".$query." DATE(A.`created_at`) BETWEEN '".$start."' AND '".$end."'")->result_array();
		return $reports;
	}
 
 	function travelling_reports($data)
	{
		$employee_id	=	$data['employee_id'];
		
		if($employee_id)
		{
			$emp 		=	implode($employee_id, ',');
			$query 		=	"A.employees IN(".$emp.") AND";
		}
		else
		{
			$query 		=	"";
		}

		$start			=	$data['start'];
		$end 			=	$data['end'];
		$reports        =   $this->db->query("SELECT A.*, B.id, B.first_name, B.last_name, B.designation FROM travel_plans AS A LEFT JOIN employees AS B ON A.employees = B.id WHERE ".$query." A.`travel_from_date` BETWEEN '".$start."' AND '".$end."' OR A.`travel_to_date` BETWEEN '".$start."' AND '".$end."'")->result_array();
		return $reports;
	}   

	function late_sitting_reports($data)
	{
		$employee_id	=	$data['employee_id'];
		
		if($employee_id)
		{
			$emp 		=	implode($employee_id, ',');
			$query 		=	"A.employee_id IN(".$emp.") AND";
		}
		else
		{
			$query 		=	"";
		}

		$start			=	$data['start'];
		$end 			=	$data['end'];

		$reports        =   $this->db->query("SELECT A.*, B.id, B.first_name, B.last_name, B.designation FROM late_sitting AS A LEFT JOIN employees AS B ON A.employee_id = B.id WHERE ".$query." DATE(A.`date`) BETWEEN '".$start."' AND '".$end."'")->result_array();
		return $reports;
	}  


	function off_day_reports($data)
	{
		$employee_id	=		$data['employee_id'];

		if($employee_id)
		{
			$emp 		=	implode($employee_id, ',');
			$query 		=	"A.employee_id IN(".$emp.") AND";
		}
		else
		{
			$query 		=	"";
		}

		$start			=	$data['start'];
		$end 			=	$data['end'];
		$reports        =   $this->db->query("SELECT A.*, B.id, B.first_name, B.last_name, B.designation FROM off_day AS A LEFT JOIN employees AS B ON A.employee_id = B.id WHERE ".$query." DATE(A.`date`) BETWEEN '".$start."' AND '".$end."'")->result_array();
		return $reports;
	}   


	function missing_time_reports($data)
	{
		$employee_id	=		$data['employee_id'];
		
		if($employee_id)
		{
			$emp 		=	implode($employee_id, ',');
			$query 		=	"A.employee_id IN(".$emp.") AND";
		}
		else
		{
			$query 		=	"";
		}

		$start			=		$data['start'];
		$end 			=		$data['end'];
		$reports        =       $this->db->query("SELECT A.*, B.id, B.first_name, B.last_name, B.designation FROM employee_login AS A LEFT JOIN employees AS B ON A.employee_id = B.id WHERE ".$query." DATE(A.`created_at`) BETWEEN '".$start."' AND '".$end."' AND (logged_in_at IS NULL OR logged_out_at IS NULL)")->result_array();
		return $reports;

	}       

}