<?php

require '../core/parameter.php';

/* function resending_transfer_approval_mail
 * returns   true if mail is sent successfully
 * arguments:
 * order_details
 * module: domains function: resend-rfa
 */

$order_details =[
    
    "order-id" => ''
    
  ];

function resending_transfer_approval_mail($order_details) {
    $url = geturl("domains", "resend-rfa", $order_details);
    $json = getjson($url);
    echo $url;
        return $json;
   
}



resending_transfer_approval_mail($order_details);
?>
