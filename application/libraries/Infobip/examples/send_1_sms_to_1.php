<?php
// Begin script


require_once '../Infobip_sms_api.php';

$infobip = new Infobip_sms_api();
$infobip->setUsername('mshoaib');
$infobip->setPassword('shoaib123');

// Send 1 SMS to 1 --------------------------------------------------------

//$infobip->setMethod(Infobip_sms_api::OUTPUT_XML); // With xml method
$infobip->setMethod(Infobip_sms_api::OUTPUT_JSON); // OR With json method
//$infobip->setMethod(Infobip_sms_api::OUTPUT_PLAIN); // OR With plain method

$message = new Infobip_sms_message();

$message->setSender('INFOBIP'); // Sender name
$message->setText('test text'); // Message
$message->setRecipients('00919018297589');
//$message->setRecipients('phone1', 'messageID'); // With custom message id

$infobip->addMessages(array(
    $message
));

$results = $infobip->sendSMS();

echo '<pre>';
print_r($results);
echo '</pre>';

// Return

/*      
Array
(
    [0] => stdClass Object
        (
            [status] => 0
            [messageid] => messageID
            [destination] => phone1
        )

)        
 */
