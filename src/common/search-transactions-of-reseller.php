<?php



require '../core/parameter.php';


/* function search_transactions_of_resellers
 * returns transaction_details
 * arguments:
 * reseller_details
 * module: reseller-transactions function: search
 */

$reseller_details = [
"no-of-records" => '1',
"page-no" => '1',
"reseller-id"=>['433246'],
"username" => ['sidu@helloinfinity.com'],    
"transaction-type" => ['invoice'],
"transaction-key" => 'systemgenerated',
"transaction-id" => [''],  
"transaction-description" => '',    
"amt-range-start" => '',
"amt-range-end" => '',
"transaction-date-start" => '',
"transaction-date-end" => '',



];


function search_transactions_of_resellers($reseller_details) {
    $url = geturl("billing/reseller-transactions", "search", $reseller_details);
    $json = getjson($url);
   echo $url;
        return $json;
 
   
}

/*
 * 
 */

 search_transactions_of_resellers($reseller_details);

?>
