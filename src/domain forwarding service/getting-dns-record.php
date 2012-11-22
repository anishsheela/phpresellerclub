<?php

require '../core/parameter.php';

/* function domain_getting_order_id
 * returns DNS Record
 * arguments:
 * domain_name
 * module: domainforward function: dns-records
 */

$domain_name =["domain-name" => 'sidhu.com'];

function getting_the_dns_record($domain_name) {
    $url = geturl("domainforward", "dns-records", $domain_name);
    $json = getjson($url);
   echo $url;
        return $json;
   
}

getting_the_dns_record($domain_name);

?>
