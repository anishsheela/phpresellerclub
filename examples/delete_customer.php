<?php

require '../src/index.php';

$customer = new \Resellerclub\Customer;

$customerId = '13620823';

$apiOut = $customer->deleteCustomer($customerId);

var_dump($apiOut);
