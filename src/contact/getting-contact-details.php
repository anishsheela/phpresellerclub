<?php

/*
 *  phpresellerclub
 *  
 *  Copyright 2012 Sidhu p k <sidhupkonline@gmail.com>.
 *  This program is free software: you can redistribute it and/or details
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
    "contact-id" => '9011832'
   
];


/*
 * function getting_contact_details
 * Input : Assosiate array with contact details
 * Output: Contact Details
 * module: contacts function: details
 */

function getting_contact_details($contact_details) {
    $url = geturl("contacts", "details", $contact_details);
    $json = getjson($url);
   echo $url;
        return $json;
    
}

getting_contact_details($contact_details);


?>


