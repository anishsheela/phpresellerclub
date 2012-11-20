<?php

require '../core/parameter.php';


/* function search_reseller
 * returns Treseller_details
 * arguments:
 * reseller_details
 * module: resellers function: search
 */

$reseller_details = [
    "no-of-records" => '10',
    "page-no" => '1',
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

function search_reseller($reseller_details) {
    $url = geturl("resellers", "search", $reseller_details);
    $json = getjson($url);
    echo $url;
    return $json;
}

/*
 * 
 */

search_reseller($reseller_details);
?>
