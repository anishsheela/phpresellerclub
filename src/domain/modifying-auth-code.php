<?php

require '../core/parameter.php';

/* function modiying_auth_code
 * returns  status
 * arguments:
 * auth_code_details
 * module: domains function: modify-auth-code
 */

$auth_code_details =[
    
    "order-id" => '',
    "auth-code" => ''
  ];

function modiying_auth_code($auth_code_details) {
    $url = geturl("domains", "modify-auth-code", $auth_code_details);
    $json = getjson($url);
    echo $url;
        return $json;
   
}



modiying_auth_code($auth_code_details);
?>
