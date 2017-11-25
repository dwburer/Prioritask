<?php
require_once "base.php";

$tasks = $session->searchTasks($term);
if (!is_null($tasks)) {
    include '../includes/card.php';
    foreach (array_reverse($tasks) as $task) {
        renderTask($task);
    }
}
?>