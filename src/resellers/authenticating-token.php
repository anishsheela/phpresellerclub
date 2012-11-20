<?php

require '../core/parameter.php';

/* function authenticate_token
 * returns Details if authenticated
 * arguments:
 * token_details
 * module: resellers function: authenticate-token
 */

$token_details = [
    
    "token" => 'jiuit'
        
    ];



function authenticating_token($token_details) {
    $url = geturl("resellers", "authenticate-token", $token_details);
    $json = getjson($url);
    echo $url;
    return $json;
}

 authenticating_token($token_details);
?>


