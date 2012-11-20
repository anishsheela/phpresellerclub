<?php

require '../core/parameter.php';


/* function adding_debit_note_into_customer
 * returns debit note ID 
 * arguments:
 * debit_note
 * module: billing function: add-customer-debit-note
 */

$debit_note = [
    "no-of-records" => '1',
    "page-no" => '1',
    "customer-id" => '9011832',
    "selling-amount" => '100.50',
    "description" => 'ghh',
    "debit-note-date" => '12454455',
    "transaction-key" => 'xdgjfsdgf',
    "update-total-receipt" => 'TRUE',
    "accounting-amount" => '',
    "conversion-rate" => '',
    "payment-reminder-days" => '',
    "greedy" => 'FALSE'
];

function adding_debit_note_into_customer($debit_note) {
    $url = geturl("billing", "add-customer-debit-note", $debit_note);
    $json = getjson($url);
    echo $url;
    return $json;
}

adding_debit_note_into_customer($debit_note);
?>
