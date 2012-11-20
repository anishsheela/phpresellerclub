<?php

require '../core/parameter.php';


/* function adding_debit_note_into_reseller
 * returns debit note ID 
 * arguments:
 * debit_note
 * module: billing function: add-reseller-debit-note
 */

$debit_note = [
    "no-of-records" => '1',
    "page-no" => '1',
    "reseller-id" => '433246',
    "selling-amount" => '100.50',
    "description" => 'ghh',
    "debit-note-date" => '12454455',
    "transaction-key" => 'xdfsdgf',
    "update-total-receipt" => 'TRUE',
    "accounting-amount" => '',
    "conversion-rate" => '',
    "payment-reminder-days" => '',
    "greedy" => 'FALSE'
];

function adding_debit_note_into_reseller($debit_note) {
    $url = geturl("billing", "add-reseller-debit-note", $debit_note);
    $json = getjson($url);
    echo $url;
    return $json;
}

adding_debit_note_into_reseller($debit_note);
?>
