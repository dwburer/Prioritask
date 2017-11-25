<?php

require_once(__DIR__ . '/api/config/global.php');

function __autoload($class_name) {
    require_once(__DIR__ . '/api/classes/' . $class_name . '.php');
}

$db = Database::getConnection();
$session = new Session($db);

$tasks = $session->getTasks(14);
?>
<pre>
<?php
echo var_dump($tasks);
?>
</pre>
===================================
<?php
$tasks = $session->searchTasks("abc");
?>
<pre>
<?php
echo var_dump($tasks);
?>
</pre>
