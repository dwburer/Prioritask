<?php
require_once('base.php');
if($session->isLoggedIn()) {
    echo $session->completeTask($taskid);
}