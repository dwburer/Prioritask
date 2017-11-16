<?php

require_once('base.php');
$return = $session->login($email, $password);
if ($return) {
    echo 1;
} else {
    echo "Unable to log you in...";
}
?>