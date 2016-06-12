<?php

require '../src/index.php';

$domain = new \Resellerclub\Domain;

$apiOut = $domain->checkAvailability('resellerclub', 'com', TRUE);

var_dump($apiOut);
