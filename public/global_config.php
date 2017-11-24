<?php
// If there's a better way to do this, just let me know.
// I wanted to keep non-api contants for template use in a separate place.

// For local dev change to "localhost" - otherwise keep set as the droplet's IP (104.236.250.1)
// Be mindful of trailing slashes when using.
define('BASE_URL', 'http://104.236.250.1/');
define('API_URL', BASE_URL . 'api/');
?>