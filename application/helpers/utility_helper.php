<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * get_success_message 
 *
 * Returns the success message
 *
 * @param string
 * @return  string
 */
if ( ! function_exists('get_success_message'))
{
    function get_success_message($message = FALSE)
    {
        if($message === FALSE) return '';
        return '<div class="alert alert-success helper"><button class="close" data-dismiss="alert">×</button>'.$message.'</div>';
    }
}

// ------------------------------------------------------------------------



/**
 * get_error_message 
 *
 * Returns the error message
 *
 * @param string
 * @return  string
 */
if ( ! function_exists('get_error_message'))
{
    function get_error_message($message = FALSE)
    {
        if($message === FALSE) return '';
        return '<div class="alert alert-danger helper"><button class="close" data-dismiss="alert">×</button>'.$message.'</div>';
    }
}

// ------------------------------------------------------------------------



/**
 * get_warning_message 
 *
 * Returns the warning message
 *
 * @param string
 * @return  string
 */
if ( ! function_exists('get_warning_message'))
{
    function get_warning_message($message = FALSE)
    {
        if($message === FALSE) return '';
        return '<div class="alert alert-warning helper"><button class="close" data-dismiss="alert">×</button>'.$message.'</div>';
    }
}



/* End of file utility_helper.php */
/* Location: ./application/helpers/utility_helper.php */