<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signature_Model extends CI_Model {
	
	function __construct(){
        parent::__construct();

    }
    

    function insert_custom_signatures($data)
    {
        if($this->db->insert('customized_signatures', $data))
            return $this->db->insert_id();
        else
            return false;
    }


    function update_custom_signatures($id, $data)
    { 
        $this->db->where(array('id' => $id));
        if($this->db->update('customized_signatures', $data))
            return true;
        else
            return false;
    }


    function get_custom_employees()
    {
        $employees       =   $this->db->query("SELECT * FROM customized_signatures WHERE status = 'active' ORDER BY name")->result_array();
        return $employees;
    }
    
    function get_custom_employees_details($id)
    {
        $employee       =   $this->db->query("SELECT * FROM customized_signatures WHERE id = $id")->row_array();
        return $employee;
    }


    function get_custom_signature($employee_id){

        $employee       =   $this->db->query("SELECT * FROM customized_signatures WHERE id = $employee_id")->row_array();
        $txt            =   "<p>With Regards, <br /><br /> <strong>". $employee['name'] . "</strong>&nbsp;<br />". $employee['designation'] ."</p>
                            <table width='600' border='0' cellspacing='0' cellpadding='0'>
                            <tbody>
                            <tr>
                            <td height='12'>&nbsp;</td>
                            </tr>
                            <tr>
                            <td align='left' width='215'><a href='http://insightsdubai.com/'> <img style='margin: -18px 5px;' title='InsightsDubai' src='http://insights.website/insight-sign/images/insights-logo.png' alt='InsightsDubai' width='215px' height='57px' /> </a></td>
                            <td><a href='http://insightsdubai.com/google-partner'> <img title='google-partner' src='http://insights.website/insight-sign/images/partner.png' alt='google-partner' width='' height='57' /> </a></td>
                            </tr>
                            </tbody>
                            </table>
                            <table width='400'>
                            <tbody>
                            <tr>
                            <td height='11'>&nbsp;</td>
                            </tr>
                            <tr>
                            <td style='font-size: 11pt; color: #555;'>Google says 'Insights is a badged agency'</td>
                            </tr>
                            <tr>
                            <td height='2'>&nbsp;</td>
                            </tr>
                            </tbody>
                            </table>
                            <table style='border-top: 1px solid #ddd; border-right: 1px solid #ddd; border-bottom: 1px solid #ddd;' width='593px' cellspacing='0' cellpadding='0'>
                            <tbody>
                            <tr>
                            <td style='background: green;' width='8' height='110'>&nbsp;</td>
                            <td width='585' height='110'>
                            <table border='0' cellspacing='0' cellpadding='0'>
                            <tbody>
                            <tr>
                            <td width='585' height='10'>&nbsp;</td>
                            </tr>
                            <tr>
                            <td width='585' height='90'>
                            <table border='0' cellspacing='0' cellpadding='0'>
                            <tbody>
                            <tr>
                            <td width='10' height='90'>&nbsp;</td>
                            <td style='font-size: 10pt; color: #58585b; text-align: left;' width='565' height='90'>
                            <table border='0' cellspacing='0' cellpadding='0'>
                            <tbody>
                            <tr>
                            <td width='565' height='51'><strong>You are a badged agency</strong> <br /> Your Partner badge tells potential clients that we trust your agency and they can, too. You've earned it, so show it off on your website and marketing materials. You're also listed on Google Partner Search.</td>
                            </tr>
                            <tr>
                            <td>
                            <table border='0' cellspacing='0' cellpadding='0'>
                            <tbody>
                            <tr>
                            <td width='565' height='39'>
                            <table border='0' cellspacing='0' cellpadding='0'>
                            <tbody>
                            <tr>
                            <td height='10'>&nbsp;</td>
                            </tr>
                            <tr style='font-size: 10pt; color: #58585b;'>
                            <td width='5'>&nbsp;</td>
                            <td width='185'><img class='round' src='http://insights.website/insight-sign/images/round.png' alt='' /> &nbsp; CERTIFICATION <br /> You've passed your exams</td>
                            <td width='185'><img class='round' src='http://insights.website/insight-sign/images/round.png' alt='' /> &nbsp; BEST PRACTICES <br /> You follow Google guidelines</td>
                            <td width='185'><img class='round' src='http://insights.website/insight-sign/images/round.png' alt='' /> &nbsp; SPEND <br /> You meet spend requirements</td>
                            <td width='5'>&nbsp;</td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            <td width='10' height='90'>&nbsp;</td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            <tr>
                            <td width='585' height='10'>&nbsp;</td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            <table border='0' cellspacing='0' cellpadding='0'>
                            <tbody>
                            <tr>
                            <td height='10'>&nbsp;</td>
                            </tr>
                            <tr>
                            <td style='font-size: 11pt; color: #58585b;'>T: ".$employee['contact']." | M: ".$employee['mobile']."</td>
                            </tr>
                            <tr>
                            <td style='font-size: 11pt; color: #58585b;'><a style='color: #00adef;' href='mailto:".$employee['email']."'>".$employee['email']."</a> | <a style='color: #00adef;' href='http://insightsdubai.com/'>insightsdubai.com</a></td>
                            </tr>
                            </tbody>
                            </table>";
        return $txt;
    }



    function get_company_signature($employee_id)
    {
        $employee       =   $this->db->query("SELECT * FROM employees WHERE id = $employee_id")->row_array();
        $txt            =   "<p>With Regards, <br /><br /> <strong>". $employee['first_name'] . ' ' . $employee['last_name'] . 
                            "</strong>&nbsp;<br />". $employee['designation'] ."</p>
                            <table width='600' border='0' cellspacing='0' cellpadding='0'>
                            <tbody>
                            <tr>
                            <td height='12'>&nbsp;</td>
                            </tr>
                            <tr>
                            <td align='left' width='215'><a href='http://insightsdubai.com/'> <img style='margin: -18px 5px;' title='InsightsDubai' src='http://insights.website/insight-sign/images/insights-logo.png' alt='InsightsDubai' width='215px' height='57px' /> </a></td>
                            <td><a href='http://insightsdubai.com/google-partner'> <img title='google-partner' src='http://insights.website/insight-sign/images/partner.png' alt='google-partner' width='' height='57' /> </a></td>
                            </tr>
                            </tbody>
                            </table>
                            <table width='400'>
                            <tbody>
                            <tr>
                            <td height='11'>&nbsp;</td>
                            </tr>
                            <tr>
                            <td style='font-size: 11pt; color: #555;'>Google says 'Insights is a badged agency'</td>
                            </tr>
                            <tr>
                            <td height='2'>&nbsp;</td>
                            </tr>
                            </tbody>
                            </table>
                            <table style='border-top: 1px solid #ddd; border-right: 1px solid #ddd; border-bottom: 1px solid #ddd;' width='593px' cellspacing='0' cellpadding='0'>
                            <tbody>
                            <tr>
                            <td style='background: green;' width='8' height='110'>&nbsp;</td>
                            <td width='585' height='110'>
                            <table border='0' cellspacing='0' cellpadding='0'>
                            <tbody>
                            <tr>
                            <td width='585' height='10'>&nbsp;</td>
                            </tr>
                            <tr>
                            <td width='585' height='90'>
                            <table border='0' cellspacing='0' cellpadding='0'>
                            <tbody>
                            <tr>
                            <td width='10' height='90'>&nbsp;</td>
                            <td style='font-size: 10pt; color: #58585b; text-align: left;' width='565' height='90'>
                            <table border='0' cellspacing='0' cellpadding='0'>
                            <tbody>
                            <tr>
                            <td width='565' height='51'><strong>You are a badged agency</strong> <br /> Your Partner badge tells potential clients that we trust your agency and they can, too. You've earned it, so show it off on your website and marketing materials. You're also listed on Google Partner Search.</td>
                            </tr>
                            <tr>
                            <td>
                            <table border='0' cellspacing='0' cellpadding='0'>
                            <tbody>
                            <tr>
                            <td width='565' height='39'>
                            <table border='0' cellspacing='0' cellpadding='0'>
                            <tbody>
                            <tr>
                            <td height='10'>&nbsp;</td>
                            </tr>
                            <tr style='font-size: 10pt; color: #58585b;'>
                            <td width='5'>&nbsp;</td>
                            <td width='185'><img class='round' src='http://insights.website/insight-sign/images/round.png' alt='' /> &nbsp; CERTIFICATION <br /> You've passed your exams</td>
                            <td width='185'><img class='round' src='http://insights.website/insight-sign/images/round.png' alt='' /> &nbsp; BEST PRACTICES <br /> You follow Google guidelines</td>
                            <td width='185'><img class='round' src='http://insights.website/insight-sign/images/round.png' alt='' /> &nbsp; SPEND <br /> You meet spend requirements</td>
                            <td width='5'>&nbsp;</td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            <td width='10' height='90'>&nbsp;</td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            <tr>
                            <td width='585' height='10'>&nbsp;</td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            <table border='0' cellspacing='0' cellpadding='0'>
                            <tbody>
                            <tr>
                            <td height='10'>&nbsp;</td>
                            </tr>
                            <tr>
                            <td style='font-size: 11pt; color: #58585b;'>T: ".$employee['contact_no']." | M: ".$employee['mobile_no']."</td>
                            </tr>
                            <tr>
                            <td style='font-size: 11pt; color: #58585b;'><a style='color: #00adef;' href='mailto:".$employee['email']."'>".$employee['email']."</a> | <a style='color: #00adef;' href='http://insightsdubai.com/'>insightsdubai.com</a></td>
                            </tr>
                            </tbody>
                            </table>";
        return $txt;
    }

}