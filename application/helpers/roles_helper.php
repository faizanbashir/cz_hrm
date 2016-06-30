<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * get_user_access_permission 
 *
 * Returns True or False
 *
 * @param string
 * @return  string
 */
if ( ! function_exists('is_module_accessible'))
{
    function is_module_accessible($module)
    {
        $CI     =   & get_instance();
        if(!isset($CI->session->userdata['id']))
        {
            return false;
        }
        if($CI->session->userdata['designation'] == 'Admin')
        {
            return true;
        }
        else
        {
            if(in_array($module, $CI->session->userdata['accessible_modules']))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
}


// ------------------------------------------------------------------------


/**
 * get_user_access_permission 
 *
 * Returns True or False
 *
 * @param string
 * @return  string
 */
if ( ! function_exists('is_controller_accessible'))
{
    function is_controller_accessible($module)
    {
        $CI     =   & get_instance();
        if(!isset($CI->session->userdata['id']))
        {
            return false;
        }
        if($CI->session->userdata['designation'] == 'Admin')
        {
            return true;
        }
        else
        {
            if(in_array($module, $CI->session->userdata['accessible_controllers']))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
}


// ------------------------------------------------------------------------



/**
 * get_user_access_permission 
 *
 * Returns True or False
 *
 * @param string
 * @return  string
 */
if ( ! function_exists('is_function_accessible'))
{
    function is_function_accessible($module, $controller, $function)
    {
        $CI     =   & get_instance();
        if($CI->session->userdata['designation'] == 'Admin')
        {
            return true;
        }
        else
        {
            if(isset($CI->session->userdata[$module.'@'.$controller.'@'.$function]))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
}


/* End of file roles_helper.php */
/* Location: ./application/helpers/roles_helper.php */