<?php



require '../core/parameter.php';


/* function search_archived_transactions_of_customers
 * returns transaction_details
 * arguments:
 * customer_details
 * module: customer-archived-transactions function: search
 */

$customer_details = [
"no-of-records" => '1',
"page-no" => '1',
"customer-id"=>['9011832'],
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


function search_archived_transactions_of_customers($customer_details) {
    $url = geturl("billing/customer-archived-transactions", "search", $customer_details);
    $json = getjson($url);
   echo $url;
        return $json;
 
   
}



 search_archived_transactions_of_customers($customer_details);

?>
