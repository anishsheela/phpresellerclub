<?php



require '../core/parameter.php';


/* function search_order
 * returns Domain details
 * arguments:
 * order_details
 * module: domains function: search
 */

$order_details = [
"no-of-records" => '10',
"page-no" => '1',
"order-by"=>['',''],
"order-id" =>['',''],
"reseller-id" => ['',''], 
"customer-id" =>['',''],
"show-child-orders" => TRUE,    
"product-key" => ['',''],
"status" => 'Active',
"domain-name" =>'', 
"creation-date-start" => '',
"creation-date-end" => '',
"expiry-date-start" => '',
"expiry-date-end" => ''    
];


function search_order($order_details) {
    $url = geturl("domains", "search", $order_details);
    $json = getjson($url);
   echo $url;
        return $json;
 
   
}

/*
 * 
 */

 search_order($order_details);

?>
