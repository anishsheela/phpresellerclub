<?php

require '../core/parameter.php';

/* function getting_promo_prices
 * returns Reseller's  Promo prices
 * module: resellers function: promo-details
 */

$arguments=[''];

function getting_promo_prices() {
    $url = geturl("resellers", "promo-details", $arguments);
    $json = getjson($url);
    
    return $json;
}

 getting_promo_prices();
?>
