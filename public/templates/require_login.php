<?php

// Includable mixin to verify a user login status before loading the current page, redirecting otherwise.

require_once(__DIR__ . '/../api/config/global.php');

function __autoload($class_name) {
    require_once(__DIR__ . '/../api/classes/' . $class_name . '.php');
}

$db = Database::getConnection();
$session = new Session($db);

if (!$session->isLoggedIn()) {
    $session->redirect("index.php");
}

?>