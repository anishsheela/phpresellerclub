<?php
/**
 * ResellerClub is one of the leading providers of domain name
 * reseller system. However, their API is very hard to use
 * directly in applications and will be prone to bugs. This is a
 * PHP abstraction for the resellerclub API and is compatible with
 * all resellers under it.
 *
 */
// Include relevant classes
// TODO: use autoloader, yes we definitely need. This is a mess.
if (file_exists(__DIR__ . '/../rc-config.php')) {
  require_once __DIR__ . '/../rc-config.php';
} else {
  require_once __DIR__ . '/../rc-config.sample.php';
}
// Exceptions
require_once __DIR__ . '/exception/ApiConnectionException.php';
require_once __DIR__ . '/exception/InvalidArrayException.php';
require_once __DIR__ . '/exception/InvalidItemException.php';
require_once __DIR__ . '/exception/InvalidParameterException.php';
require_once __DIR__ . '/exception/InvalidUrlArrayException.php';
require_once __DIR__ . '/exception/InvalidValidationException.php';
require_once __DIR__ . '/exception/MissingParameterException.php';

require_once __DIR__ . '/core/Core.php';
require_once __DIR__ . '/validation/Validation.php';
require_once __DIR__ . '/contact/Contact.php';
require_once __DIR__ . '/customer/Customer.php';
require_once __DIR__ . '/domain/Domain.php';
require_once __DIR__ . '/billing/Billing.php';