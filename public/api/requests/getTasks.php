<?php
require_once "base.php";

$tasks = $session->getTasks($session->getUID($session->sid));
if (!is_null($tasks)) {
    include '../includes/card.php';
    foreach (array_reverse($tasks) as $task) {
        renderTask($task);
    }
}
?>