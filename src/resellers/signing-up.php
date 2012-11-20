<?php

/*
 *  phpresellerclub
 *  
 *  Copyright 2012 Sidhu p k <sidhupkonline@gmail.com>.
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

require '../core/parameter.php';


/* function add_reseller
 * returns Reseller account
 * arguments:
 * reseller_details
 * module: reseller function: signup
 */

$reseller_details = [
"username" => 'siduv@helloinfinity.com',
"passwd" => '%^&TU9uhu',
"name" => 'Abbobacker Siddique P. K.',
"company" => 'HelloInfinity',
"address-line-1" => 'TBIC, MCET',
"city" => 'Thiruvananthapuram',
"state" => 'Kerala',
"country" => 'IN',
"zipcode" => '695544',
"phone-cc" => '91',
"phone" => '8907509611',
"lang-pref" => 'en',
"accounting-currency-symbol" => '',    
"selling-currency-symbol" => '',
"sales-contact-id" => '',    
"address-line-2" => 'Anad',
"address-line-3" => 'Nedumangaud',
"alt-phone-cc" => '91',
"alt-phone" => '9746825270',
"fax-cc" => '91',
"fax" => '4712459094',
"mobile-cc" => '91',
"mobile" => '9995131334'
];


function add_reseller($reseller_details) {
    $url = geturl("resellers", "signup", $reseller_details);
    $json = getjson($url);
   
        return $json;
   
}

/*
 * 
 */

echo add_reseller($reseller_details);

?>
