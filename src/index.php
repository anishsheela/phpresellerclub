<?php

// Include relevant classes
// TODO: use autoloader
if (file_exists(__DIR__ . '/../rc-config.php')) {
  require_once __DIR__ . '/../rc-config.php';
} else {
  require_once __DIR__ . '/../rc-config.sample.php';
}
require_once __DIR__ . '/core/Core.php';
require_once __DIR__ . '/validation/Validation.php';
require_once __DIR__ . '/contact/Contact.php';
require_once __DIR__ . '/customer/Customer.php';
require_once __DIR__ . '/domain/Domain.php';
require_once __DIR__ . '/billing/Billing.php';