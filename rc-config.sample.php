<?php

/**
 * Resellerclub Configuration
 */

/** GET and POST methods **/
define('METHOD_GET', 0);
define('METHOD_POST', 1);


define('ENVIRONMENT', 'development');

if ('development' === ENVIRONMENT) {
  define('RESELLER_ID', '');
  define('RESELLER_API_KEY', '');
  define('RESELLER_DOMAIN', 'test.httpapi.com');
}
elseif ('production' === ENVIRONMENT) {
  define('RESELLER_ID', '');
  define('RESELLER_API_KEY', '');
  define('RESELLER_DOMAIN', 'httpapi.com');
}
