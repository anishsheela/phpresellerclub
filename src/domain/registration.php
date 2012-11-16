<?php

/*
  phpresellerclub - PHP abstraction for resellerclub API

  Copyright (C) 2012 Anish A

  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/* Domain Registration & Availability routines */

require '../core/parameter.php';

/*
 * function domain_availability
 *
 * Checks whether the domains are available and returns available domain names
 * 
 * Input  : domain name, including tld, string
 * Output : TRUE => available FALSE => Not available
 */

function domain_availability($domain_name) {
    $domain_name_array = explode('.', $domain_name);
    $domain = $domain_name_array[0];
    $tld = $domain_name_array[1];
    $parameter = array("domain-name" => $domain, "tlds" => $tld);
    $url = geturl("domains", "available", $parameter);
    $json = getjson($url);
    if ($json[$domain_name]["status"] == "available")
        return TRUE;
    else
        return FALSE;
}

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

/*
 * function domain_registration
 * returns Success or Failure 
 * arguments:
 * registration_details
 * module: domains function: register
 */

$registration_details = [
    "domain-name" => 'sidhu.com',
    "years" => '1',
    "ns" => ['ns1.onlyfordemo.net'],
    "customer-id" => '8997525',
    "reg-contact-id" => '24981243',
    "admin-contact-id" => '24981243',
    "tech-contact-id" => '24981243',
    "billing-contact-id" => '24981243',
    "invoice-option" => 'KeepInvoice',
    "protect-privacy" => FALSE,
];

function domain_registration($registration_details) {
    $url = geturl("domains", "register", $registration_details);
    $json = getjson($url);

    return $json;
}

print_r(domain_registration($registration_details));
?>
