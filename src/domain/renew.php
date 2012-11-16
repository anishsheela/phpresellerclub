<?php
require '../core/parameter.php';

/* function domain_renew
 * returns Success or Failure 
 * arguments:
 * domain_renew_details
 * module: domains function: renew
 */

$domain_renew__details = [
    "order-id" => '46918368',
    "years" => '5',
    "exp-date" => '1384540200',
    "invoice-option" => 'KeepInvoice',
    
];

function domain_renew($domain_renew__details) {
    $url = geturl("domains", "renew", $domain_renew__details);
  
   // $json = file_get_contents($url);
    
    $json = getjson($url);

    return $json;
}


?>
