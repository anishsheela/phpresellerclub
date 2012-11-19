<?php

require '../core/parameter.php';

/* function paying_customer_transactions
 * returns Reseller Transaction List
 * arguments:
 * transaction_details
 * module: products function: customer-price
 */

$customer_details = ["invoice-ids" => ['1','2','3'],
                     "debit-ids"  => ['4','5']  
                    ];

function paying_customer_transactions($customer_details) {
    $url = geturl("billing", "customer-pay", $customer_details);
    $json = getjson($url);
    echo $url;
    return $json;
}

paying_customer_transactions($customer_details);
?>
