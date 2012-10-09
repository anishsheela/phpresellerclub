<?php

/*
 *  phpresellerclub
 *  
 *  Copyright 2012 Anish A <aneesh.nl@gmail.com>.
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 * 
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 * 
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/*
 * The abstraction of parameters passed. This file handles the encoding of
 * parameters. Other modules just need to pass the module, method name and
 * parameters to this module.
 */

/*
 * function parameter_format
 * 
 * Accepts: the parameters as assosiative array
 * 
 * Returns: Validated and URLencoded parameters in string format
 * 
 */

function parameter_format($parameters_array) {
    $output_parameter_list = array();
    foreach ($parameters_array as $key => $value) { // get each key value parameters
        if (is_array($value)) { // if multiple arguments to a parameter
            foreach ($value as $sub_values) { // add the values with same key
                array_push($output_parameter_list, urlencode($key) . "=" . urlencode($sub_values));
            }
        } else {
            array_push($output_parameter_list, urlencode($key) . "=" . urlencode($value));
        }
    }
    return join('&', $output_parameter_list); // joins using &
}

/*
 * function getauth
 * Accepts: Optional configuration file relative path
 * Returns: Array of auth_userid and auth_password
 * api_domain and api_protocol respectiveley, 0 if error
 */

function getauth($config_file = "../../config.php") {
    // Check if configuration file exists, else error
    if (file_exists($config_file)) {
        require $config_file;
        return $config;
    } else {
        return 0;
    }
}

/*
 * function geturl
 * Accepts: module name, function name, parameters array and format
 * Returns: URL for getting the json/xml output
 */

function geturl($module, $function, $parameters_array, $format = "json") {
    $credentials = getauth();
    $parameters = parameter_format($parameters_array);
    $url = urlencode($credentials["api_protocol"]) . "://" .
            $credentials['api_domain'] . "/api/$module/$function.$format" .
            "?" . 'auth-userid=' . $credentials['auth_userid'] .
            '&auth-password=' . urlencode($credentials['auth_password']) .
            '&' . $parameters;
    return $url;
}

/*
 * function getjson
 * Accepts: url
 * Returns: decoded JSON
 */
function getjson($url) {
    $json = file_get_contents($url);
    return json_decode($json, TRUE);
}
?>