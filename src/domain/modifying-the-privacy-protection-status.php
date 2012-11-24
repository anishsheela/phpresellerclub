<?php

require '../core/parameter.php';

/* function modifying_privacy_protection
 * returns  status
 * arguments:
 * modifying_details
 * module: domains function: modify-privacy-protection
 */

$modifying_details =[
    
    "order-id" => '',
    "protect-privacy" => TRUE,
    "reason" =>''
    
    
    ];

function modifying_privacy_protection($modifying_details) {
    $url = geturl("domains", "modify-privacy-protection", $modifying_details);
    $json = getjson($url);
    echo $url;
        return $json;
   
}



modifying_privacy_protection($modifying_details);
?>
