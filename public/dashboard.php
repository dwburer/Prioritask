<?php include 'templates/base.php'; ?>
<?php include 'templates/require_login.php'; ?>

<?php
$tasks = $session->getTasks($session->getUID($session->sid));
$has_tasks = count($tasks) > 0;
?>

<?php startblock('content') ?>
<h1>Dashboard</h1>

<div class="card-list">
    <!-- Button trigger modal -->
    <div class="add-card-button mb-3">
        <div class="row justify-content-center">
            <div class="col col-auto">
                <button type="button" class="btn btn-primary mx-auto" data-toggle="modal" data-target="#taskModal">
                    <?= ($has_tasks ? 'Add a new task' : 'Add a task') ?>
                </button>
            </div>
        </div>
    </div>
    <div class="loader-container" id="loader" <?php if (!$has_tasks) { ?>style="display: none;"<?php } ?>>
        <div class="loader">Loading...</div>
    </div>
    <div id="task-list-wrapper">
        <?php if (!$has_tasks) { ?>
            <h5 class="getting-started pb-4">Looks like you don't have any task cards yet!  Click the 'Add a task' button to get started!</h5>
        <?php } ?>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Success</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Task list successfully updated!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="task">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New task:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="taskTitle">Title</label>
                        <input type="text" class="form-control" id="taskTitle" aria-describedby="titleHelp" placeholder="Enter title">
                        <small id="titleHelp" class="form-text text-muted">The title for your task.</small>
                    </div>
                    <div class="form-group">
                        <label for="taskDueDate">Due date</label>
                        <input class="flatpickr flatpickr-input active form-control" id="taskDueDate" type="text" placeholder="Select Date.." data-id="datetime" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label for="taskEstDays">Est. days to complete:</label>
                        <input type="number" class="form-control" id="taskEstDays">
                    </div>
                    <div class="form-group">
                        <label for="taskEstHours">Est. hours to complete:</label>
                        <input type="number" class="form-control" id="taskEstHours">
                    </div>
                    <div class="form-group">
                        <label for="taskEstMinutes">Est. minutes to complete:</label>
                        <input type="number" class="form-control" id="taskEstMinutes">
                    </div>
                    <div class="form-group">
                        <label for="taskLocation">Location</label>
                        <input type="text" class="form-control" id="taskLocation">
                    </div>
                    <div class="form-group">
                        <label for="taskNotes">Notes</label>
                        <textarea class="form-control" id="taskNotes" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php endblock() ?>

<?php startblock('footer_js') ?>
<script type="text/javascript">
    (function ($) {
        var taskContainer = $('#task-list-wrapper');
        var loaderContainer = $('#loader');

        function reloadTasks() {
            $.ajax({
                type: 'POST',
                data: 'request=getTasks',
                url: '<?php echo API_URL . 'index.php' ?>',
                async: true,
                success: function (data) {
                    // Success
                    if (data != "") {
                        taskContainer.html(data);
                        loaderContainer.hide();
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    showResultFailed(jqXHR.responseText);
                    hideWaitingFail();
                }
            });
        }

        $(document).ready(function () {
            $('#taskDueDate').flatpickr({
                enableTime: true
            });

            reloadTasks();
        });

        // Parse and submit form for task creation.
        $('form#task').submit(function (e) {
            e.preventDefault();

            var form = $(this);
            var task = form.find('input#taskTitle').val();
            var due = form.find('input#taskDueDate').val();
            var datetc = form.find('input#taskEstDays').val();
            var hourtc = form.find('input#taskEstHours').val();
            var minutetc = form.find('input#taskEstMinutes').val();
            var location = form.find('input#taskLocation').val();
            var notes = form.find('textarea#taskNotes').val();

            $.ajax({
                type: 'POST',
                data: 'request=addTask&task=' + task + '&due='
                        + due + '&datetc=' + datetc + '&hourtc=' + hourtc + '&minutetc='
                        + minutetc + '&location=' + location + '&notes=' + notes,
                url: '<?php echo API_URL . 'index.php' ?>',
                async: true,
                success: function (data) {
                    //success
                    if (data == 1) {
                        $('#taskModal').modal('hide');
                        $('#confirmationModal').modal('show');
                    } else {
                        console.log('Could not submit task.');
                    }
                },
                error: function (data) {
                    console.log('Task error!: ' + data);
                }
            });
        });

        // Parse and submit form for task modification.
        $(document).on("submit", "form#edittask", function (e) {
            e.preventDefault();

            var form = $(this);
            var title = form.find('input#taskTitle').val();
            var due = form.find('input#taskDueDate').val();
            var datetc = form.find('input#taskEstDays').val();
            var hourtc = form.find('input#taskEstHours').val();
            var minutetc = form.find('input#taskEstMinutes').val();
            var location = form.find('input#taskLocation').val();
            var notes = form.find('textarea#taskNotes').val();
            var taskid = form.find('input#taskid').val();
            $.ajax({
                type: 'POST',
                data: 'request=editTask&taskid=' + taskid + '&task=' + title + '&due='
                        + due + '&datetc=' + datetc + '&hourtc=' + hourtc + '&minutetc='
                        + minutetc + '&location=' + location + '&notes=' + notes,
                url: '<?php echo API_URL . 'index.php' ?>',
                async: true,
                success: function (data) {
                    var modalDiv = form.parent().parent();
                    modalDiv.modal('hide');
                    $('#confirmationModal').modal('show');
                },
                error: function (data) {
                    console.log('Edit error!: ' + data);
                }
            });
        });

        // Parse and submit form for task deletion.
        $(document).on("submit", "form#deletetask", function (e) {
            e.preventDefault();

            var form = $(this);
            var taskid = form.find('input#taskid').val();

            $.ajax({
                type: 'POST',
                data: 'request=deleteTask&taskid=' + taskid,
                url: '<?php echo API_URL . 'index.php' ?>',
                async: true,
                success: function (data) {
                    //success
                    if (data == 1) {
                        var modalDiv = form.parent().parent();
                        modalDiv.modal('hide');
                        $('#confirmationModal').modal('show');
                    } else {
                        console.log('Could not submit task for deletion.');
                    }
                },
                error: function (data) {
                    console.log('Task deletion error!: ' + data);
                }
            });
        });

        // Confirmation for task creation/deletion/modification.
        $('#confirmationModal').on('hidden.bs.modal', function (e) {
            taskContainer.empty();
            loaderContainer.show();

            $.get('<?php echo BASE_URL . 'task_list.php' ?>', function (data) {
                taskContainer.html(data);
                loaderContainer.hide();
            });
        });

        // Mark a task as complete, setting its urgency to zero.
        $("div.container").on("click", "#markcomplete", function () {
            var taskid = $(this).attr('taskid');
            $.ajax({
                type: "POST",
                data: 'request=completeTask&taskid=' + taskid,
                url: 'api/index.php',
                async: true,
                success: function (data) {
                    //user registered and set as logged in!
                    if (data == 1) {
                        $("a#markcomplete").html("Completed").remove('id');
                    } else {
                        alert("Couldn't mark task completed in database!");
                    }
                },
                error: function (data) {
                    console.log('Login error!: ' + data);
                }
            });
        });

        // Handle and sumbit search for task.
        $(document).on("submit", "form#search", function (e) {
            e.preventDefault();
            var form = $(this);
            var term = form.find('input#searchterm').val();
            $.ajax({
                type: 'POST',
                data: 'request=searchTasks&term=' + term,
                url: '<?php echo API_URL . 'index.php' ?>',
                async: true,
                success: function (data) {
                    //success
                    if (data != "") {
                        taskContainer.html(data);
                        loaderContainer.hide();
                    }
                },
                error: function (data) {
                    console.log('Search error!: ' + data);
                }
            });
        });

    })(jQuery)
</script>
<?php endblock() ?>
