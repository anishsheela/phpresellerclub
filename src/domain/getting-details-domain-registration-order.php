<?php

require '../core/parameter.php';

/* function getting_details_domain_reg_order
 * returns details of the Domain Registration Order
 * arguments:
 * domain_details
 * module: domains function: details
 */

$domain_details =["domain-name" => 'sidhu.com',
                   "order-id" =>'484548',
                "options" => ['All']
    
    ];

function getting_details_domain_reg_order($domain_details) {
    $url = geturl("domains", "details", $domain_details);
    $json = getjson($url);
   echo $url;
        return $json;
   
}



getting_details_domain_reg_order($domain_details);
?>
