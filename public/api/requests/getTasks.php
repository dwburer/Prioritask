<?php
require_once "base.php";

$tasks = $session->getTasks($session->getUID($session->sid));
if (!is_null($tasks)) {
    include '../includes/card.php';

    function calculateUrgency($task) {

    	if ($task['completed'] == 0) {

	    	$to_time = strtotime(date("Y-m-d H:i:s"));
	        $from_time = strtotime($task['when_due']);
	        $time_remaining = round(($from_time - $to_time) / 60, 2) . " minutes";

	        if ($time_remaining < 0) {
	            $time_remaining = 0;
	        }

	        $tc_splits = explode(":", $task['time_to_complete']);
	        $minutes_to_complete = (intval($tc_splits[0]) * 24 * 60) + (intval($tc_splits[1]) * 60) + intval($tc_splits[2]);
	        $urgency = $minutes_to_complete / $time_remaining;

	        return $urgency;
	    } else {
	    	return 0;
	    }
    }

    // Task urgency comparison function
	function tskcmp($a, $b) {
	    if (calculateUrgency($a) == calculateUrgency($b)) {
	        return 0;
	    }
	    return (calculateUrgency($a) < calculateUrgency($b)) ? -1 : 1;
	}

	uasort($tasks, 'tskcmp');

    foreach (array_reverse($tasks) as $task) {
        renderTask($task);
    }
}
?>