<?php
require_once('base.php');
$return = $session->register($email,$password,$passwordconf);
if(!$return)
{
    echo $return;
} else {
    echo $session->login($email, $password);
}
?>