<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General_Model extends CI_Model {
	
	function __construct()
    {
        parent::__construct();
    }


    function send_email($to, $subject, $message)
    {
        $this->load->library('email');
        $this->email->from('technical-team@insightsdubai.com', 'Technical Team - BMS');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->set_mailtype("html");
        $message    .=   $this->lang->line('email_footer_msg');
        $this->email->message( $message);                 
        if($this->email->send())
            return true;
        else
            return false;
    }    


    function send_sms($receivers,$text)
    {
        $this->config->load('sms_gateway');
        $this->load->library('Infobip/Infobip_sms_api');
        $infobip = new Infobip_sms_api();
        $infobip->setUsername($this->config->item('user_name'));
        $infobip->setPassword($this->config->item('user_password'));
        $infobip->setMethod(Infobip_sms_api::OUTPUT_JSON);
        $message = new Infobip_sms_message();
        $message->setSender('971557501653'); // Sender name
        $message->setText($text); // Message
        foreach($receivers as $receiver)
        {
            $message->setRecipients($receiver);
        }
        $infobip->addMessages(array(
            $message
        ));

        $result = $infobip->sendSMS();
        return $result;
    }


    function dateDiff($date)
    {
        $seconds  = strtotime(date('Y-m-d H:i:s')) - strtotime($date);

        if(strtotime(date('Y-m-d H:i:s')) > strtotime($date))
        {
            if($seconds < 60)
            {
                $time = $seconds." seconds ago";
            }
            elseif($seconds < 60*60 )
            {
                $minutes    =   intval($seconds/60);
                if($minutes == 1)
                    $time   =   $minutes." minute ago";
                else
                    $time   =   $minutes." minutes ago";
            }
            else             
            {
                $hour   =   intval($seconds/(60*60)); 
                if($hour == 1)  
                    $time   =   $hour." hour ago";
                else
                    $time   =   $hour." hours ago";
            }
            return $time;
        }
        else
            return false;
        
    }

    
}

