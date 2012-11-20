<?php



require '../core/parameter.php';


/* function search_transactions_of_customers
 * returns transaction_details
 * arguments:
 * customer_details
 * module: customer-transactions function: search
 */

$customer_details = [
"no-of-records" => '1',
"page-no" => '1',
"customer-id"=>'9011832',
"username" => 'sidu@helloinfinity.com',    
"transaction-type" => 'invoice',
"transaction-key" => 'systemgenerated',
"transaction-id" => '',  
"transaction-description" => '',    
"amt-range-start" => '',
"amt-range-end" => '',
"transaction-date-start" => '',
"transaction-date-end" => '',
"order-by" => 'no-of-records ',


];


function search_transactions_of_customers($customer_details) {
    $url = geturl("billing/customer-transactions", "search", $customer_details);
    $json = getjson($url);
   echo $url;
        return $json;
 
   
}

/*
 * 
 */

 search_transactions_of_customers($customer_details);

?>
