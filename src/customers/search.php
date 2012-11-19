<?php



require '../core/parameter.php';


/* function search_customer
 * returns Tcustomer_details
 * arguments:
 * customer_details
 * module: customers function: search
 */

$customer_details = [
"no-of-records" => '10',
"page-no" => '1',
"customer-id"=>'8997525',
"reseller-id" => '433246',  
"username" => 'sidu@helloinfinity.com',    
"name" => 'Abbobacker Siddique P. K.',
"company" => 'HelloInfinity',
"city" => 'Thiruvananthapuram',  
"state" => 'Kerala',    
"status" => 'Active',


"creation-date-start" => '',
"creation-date-end" => '',
"total-receipt-start" => '',
"total-receipt-end" => ''

];


function search_customer($customer_details) {
    $url = geturl("customers", "search", $customer_details);
    $json = getjson($url);
   echo $url;
        return $json;
 
   
}

/*
 * 
 */

 search_customer($customer_details);

?>
