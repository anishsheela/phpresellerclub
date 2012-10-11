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
require 'parameter.php';

function testfunction($function_name, $required_input, $required_output) {
    $current_output = call_user_func($function_name, $required_input);
    if ($current_output == $required_output)
        echo "Test $function_name passed\n";
    else
        echo "Test $function_name failed\n";
}

/*
 * Test for parameter format
 */
$required_input_parameter_format = array(
    "auth-userid" => "0",
    "auth-password" => 'p@$$W0rd',
    "domain-name" => ["domain1", "domain2"],
    "tlds" => ["com", "net"],
    "test" => TRUE
);
$required_output_parameter_format = 'auth-userid=0&auth-password=p%40%24%24W0rd&domain-name=domain1&domain-name=domain2&tlds=com&tlds=net&test=true';

testfunction("parameter_format", $required_input_parameter_format, $required_output_parameter_format);

/*
 * Test for getauth
 */
$required_input_getauth = "../../config.php";
$required_output_getauth = array("0", "password");
testfunction("getauth", $required_input_getauth, $required_output_getauth);


$required_input_geturl = array(
    "domain-name" => ["6yuvhj"],
    "tlds" => ["com", "net"]
);
geturl("domains", "available", $required_input_geturl);


?>
