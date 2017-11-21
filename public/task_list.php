<?php include 'templates/require_login.php'; ?>

<?php


$tasks = $session->getTasks($session->getUID($session->sid));

?>

<?php 

include 'includes/card.php';
foreach ( array_reverse($tasks) as $task ) {
    renderTask($task);
}

?>
