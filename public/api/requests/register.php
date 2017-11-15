<?php
require_once('base.php');
$registered = $session->register($email,$password,$passwordconf);
if($registered === true) {
    $loginResponse = $session->login($email,$password);
    if($loginResponse === true) {
        echo 1;
    } else {
        echo "Failed to log you in automagically!";
    }
} else {
    echo $registered;
}
?>