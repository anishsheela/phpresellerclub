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

?>
