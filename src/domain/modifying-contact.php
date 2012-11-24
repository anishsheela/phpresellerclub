<?php

require '../core/parameter.php';

/* function modifying_contact
 * returns  status
 * arguments:
 * contact_details
 * module: domains function: modify-contact
 */

$contact_details =[
    
    "order-id" => '',
    "reg-contact-id" => '',
    "admin-contact-id" =>'',
    "tech-contact-id" =>'',
    "billing-contact-id" =>''
    
    
    ];

function modifying_contact($contact_details) {
    $url = geturl("domains", "modify-contact", $contact_details);
    $json = getjson($url);
    echo $url;
        return $json;
   
}



modifying_contact($contact_details);
?>
