<?php

require '../core/parameter.php';

/* function  getting_legal_agreements
 * returns legal-agreements
 * arguments:
 * legal_details
 * module: commons function: legal-agreements
 */

$legal_details = ["type" => ['customermasteragreement','resellerdomainagreement']  ];

function getting_legal_agreements($legal_details) {
    $url = geturl("commons", "legal-agreements", $legal_details);
    $json = getjson($url);
    echo $url;
    return $json;
}

getting_legal_agreements($legal_details);
?>
