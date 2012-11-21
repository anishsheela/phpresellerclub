<?php

require '../core/parameter.php';

/* function searching_archived_action
 * returns Execution Details
 * arguments:
 * action_details
 * module: actions function: search-archived
 */

$action_details = [
                   "eaq-id" =>['1,2,3'],
                   "order-id" =>['1,2,3'],
                   "entity-type-id" =>['1,2,3'],
                   "action-status" =>['1,2,3'],
                   "action-type" =>['1,2,3'],
                   "no-of-records" =>'1',
                   "page-no" =>'1'
                 ];

function searching_archived_action($action_details) {
    $url = geturl("actions", "search-archived", $action_details);
    $json = getjson($url);
    echo $url;
    return $json;
}

searching_archived_action($action_details);

?>
