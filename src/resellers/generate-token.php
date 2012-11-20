<?php

require '../core/parameter.php';

/* function getting_token_details
 * returns token details
 * arguments:
 * token_details
 * module: resellers function: generate-token
 */

$token_details = ["ip" => '127.0.0.1'];

function getting_token_details($token_details) {
    $url = geturl("resellers", "generate-token", $token_details);
    $json = getjson($url);
   
    return $json;
}

  getting_token_details($token_details);
?>
