<?php

require '../src/index.php';

$domain = new \Resellerclub\Domain;

$orderId = '12345678';

$apiOut = $domain->setNameServer($orderId, array('ns1.example.com, ns2.example.com'));

var_dump($apiOut);
