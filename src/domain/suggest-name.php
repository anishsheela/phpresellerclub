<?php 

require 'check-availability.php';

/*
 * function domain_suggestion
 * returns suggestions of a domain in an assosiated array
 * arguments:
 * keyword (string)
 * tlds (array)
 * no_of_results (positive int)
 * hyphens (boolean)
 * related (boolean)
 * module: domains function: suggest-names
 */
$keyword = 'sidhu';
$tlds =['com','in'];
$no_of_results='1';


function domain_suggestion($keyword, $tlds, $no_of_results, $hyphens = FALSE, $related = FALSE) {
    $parameter = array("keyword" => $keyword, "tlds" => $tlds,
        "no-of-results" => $no_of_results, "hyphen-allowed" => $hyphens,
        "add-related" => $related);
    $url = geturl("domains", "suggest-names", $parameter);
    $json = getjson($url);
    $domains_available = array();
    foreach ($json as $domain => $value) {
        foreach ($value as $tld => $status) {
            if (domain_availability(strtolower($domain) . "." . $tld)) {
                array_push($domains_available, strtolower($domain) . "." . $tld);
            }
        }
    }
    return $domains_available;
}

print_r(domain_suggestion($keyword, $tlds, $no_of_results, $hyphens = FALSE, $related = FALSE));


?>