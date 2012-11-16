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

require '../core/parameter.php';



$contact_details = [
    "name" => 'baputty',
    "company" => 'nift',
    "email" => 'baputty@helloinfinity.com',
    "address-line-1" => 'Mnajeri',
    "city" => 'Malappuram',
    "country" => 'IN',
    "zipcode" => '676122',
    "phone-cc" => '91',
    "phone" => '9995131334',
    "customer-id" => '8997525',
    "type" => 'Contact',
    "address-line-2" => 'thurakkal',
    "address-line-3" => 'bypass Jn',
    "state" => 'Kerala',
    "fax-cc" => '91',
    "fax" => '4712459094',
];




/*
 * function add_contact
 * Input : Assosiate array with contact details
 * Output: contact_id if sucess, else 0
 */

function add_contact($contact_details) {
    $url = geturl("contacts", "add", $contact_details);
    $json = getjson($url);
    if (is_integer($json))
        return $json;
    else
        return 0;
}
?>