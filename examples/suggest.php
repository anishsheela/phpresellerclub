<?php

require '../src/index.php';

$domain = new \Resellerclub\Domain;

// According to http://cp.onlyfordemo.net/kb/answer/1085 , us and cc 2nd and
// 3rd level is supported.
$apiOut = $domain->domainSuggestions('resellerclub', 'us');

var_dump($apiOut);
