<?php

require '../core/parameter.php';

/*
 * function domain_availability
 *
 * Checks whether the domains are available and returns available domain names
 * 
 * Input  : domain name, including tld, string
 * Output : TRUE => available FALSE => Not available
 */
$domain_name='helloinfinity.com';

function domain_availability($domain_name) {
    $domain_name_array = explode('.', $domain_name);
    $domain = $domain_name_array[0];
    $tld = $domain_name_array[1];
    $parameter = array("domain-name" => $domain, "tlds" => $tld);
    $url = geturl("domains", "available", $parameter);
    echo $url;
    $json = getjson($url);
    
    if ($json[$domain_name]["status"] == "available"){
      
        return TRUE;
    }
    else{
       
        return FALSE;
    }
}



if (domain_availability($domain_name)){
    echo 'yes';
} else {
    echo 'no';
}

?>
