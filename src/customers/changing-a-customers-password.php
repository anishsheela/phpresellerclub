<?php

require '../core/parameter.php';

/* function changing_a_customers_password
 * returns True or False
 * arguments:
 * customer_details
 * module: customers function: change-password
 */

$customer_details = ["customer-id" => '8997525',
    
                     "new-passwd" => 'hello001'
                    ];

function changing_customers_password($customer_details) {
    $url = geturl("customers", "change-password", $customer_details);
    $json = getjson($url);
    
    return $json;
}

  echo changing_customers_password($customer_details);
?>
