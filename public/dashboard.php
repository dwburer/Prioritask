<?php include 'templates/base.php'; ?>
<?php include 'templates/require_login.php'; ?>

<?php

$tasks = $session->getTasks($session->getUID($session->sid));
$has_tasks = count($tasks) > 0;
echo var_dump($tasks);

?>

<?php startblock('content') ?>
	<h1>Dashboard</h1>

	<div class="card-list">
		<?php if($has_tasks) {?>
        	<p>You got tasks!</p>

        	<?php 

			include 'templates/card.php';
        	foreach ( $tasks as $task ) {
    			renderTask($task);
        	}

        	?>

        <?php } else {?>
	    	<h5 class="getting-started pb-4">Looks like you don't have any task cards yet!  Click the 'Add a task' button to get started!</h5>
	    <?php } ?>
	</div>

	<div class="add-card-button">
	    <div class="col row">
	        <a href="edit_task.php" class="btn btn-primary mx-auto"><?=($has_tasks ? 'Add a new task' : 'Add a task')?></a>
	    </div>
	</div>
<?php endblock() ?>
