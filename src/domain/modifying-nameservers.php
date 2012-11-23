<?php

require '../core/parameter.php';

/* function modifying_name_servers
 * returns status
 * arguments:
 * domain_details
 * module: domains function: modify-ns
 */

$domain_details =["domain-name" => 'sidhu.com',
                "ns" => ['','']
    
    ];

function modifying_name_servers($domain_details) {
    $url = geturl("domains", "modify-ns", $domain_details);
    $json = getjson($url);
   
        return $json;
   
}



modifying_name_servers($domain_details);
?>
