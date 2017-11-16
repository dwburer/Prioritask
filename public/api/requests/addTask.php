<?php
require_once "base.php";
echo $session->addTask($task, $due, $datetc, $hourtc, $minutetc, $location, $notes) ? "1" : "0";
?>
