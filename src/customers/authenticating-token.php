<?php

require '../core/parameter.php';

/* function authenticate_token
 * returns Success or Failure 
 * arguments:
 * token_details
 * module: customers function: authenticate-token
 */

$token_details = [
    
    "token" => 'jiuit'
        
    ];



function authenticating_token($token_details) {
    $url = geturl("customers", "authenticate-token", $token_details);
    $json = getjson($url);
    echo $url;
    return $json;
}

 authenticating_token($token_details);
?>


