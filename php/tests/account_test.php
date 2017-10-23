<?php

/**
 * @package com.Prioritiask.tests.AccountTest
 * @author Mitchell M.
 * @version 1.0.0
 */
require_once(__DIR__ . '/../config/global.php');

function __autoload($class_name) {
    require_once(__DIR__ . '/../classes/' . $class_name . '.php');
}

$db = Database::getConnection();
$session = new Session($db);

Echo "Test to pass for completed user account functionality... </br>";

if ($session->register("jerry32", "password123", "jerry@gmail.com")) {
    echo "Registered a user account successfully, attempting to login...";
    if ($session->login("jerry32", "password123")) {
        echo "Logged in a user account successfully, verifying logged in status.";
        if ($session->isLoggedIn()) {
            echo "Verified is logged in";
            if ($session->logout()) {
                echo "Logged out successfully. Passed account test.";
            } else {
                echo "Error S4: " . $session->last_error;
            }
        } else {
            echo "Error S3: " . $session->last_error;
        }
    } else {
        echo "Error S2: " . $session->last_error;
    }
} else {
    echo "Error S1: " . $session->last_error;
}
