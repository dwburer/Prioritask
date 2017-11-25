<?php

function renderTask($task) { ?>
    <div class="task card mb-5" id="<?= $task['taskid'] ?>">

        <!-- Displays the task's title -->
        <div class="card-header"><?= $task['task_name'] ?></div>

        <div class="card-block">
            <div class="row no-gutters">
                <!--
                                <div class="col col-sm-auto">
                                    <div class="progress blue">
                                        <span class="progress-left">
                                            <span class="progress-bar"></span>
                                        </span>
                                        <span class="progress-right">
                                            <span class="progress-bar"></span>
                                        </span>
                                        <div class="progress-value">0%</div>
                                    </div>
                                </div>
                -->
                <div class="col">
                    <!-- Text for the card -->
                    <div class="row col">
                        <p><?= $task['notes'] ?></p>
                    </div>

                    <div class="row">
                        <!-- Display the time information for the card -->
                        <div class="col">
                            <p class="card-due-on-header mb-0">
                                Due on:
                            </p>
                            <p class="card-due-on text-muted mb-0">
                                <?= $task['when_due'] ?>
                            </p>
                        </div>
                        <div class="col">
                            <p class="card-complete-time-header mb-0">
                                Estimated time to complete:
                            </p>
                            <p class="card-complete-time text-muted mb-0">
                                <?= $task['time_to_complete'] ?>
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between">
                        <div class="col col-sm-auto">
                            <?php if ($task['completed'] > 0) { ?>
                                <a href="#" taskid="<?= $task['taskid'] ?>" class="btn btn-primary">Completed</a>
                            <?php } else { ?>
                                <a href="#" taskid="<?= $task['taskid'] ?>" id="markcomplete" class="btn btn-primary">Mark as complete</a>
                            <?php } ?>
                        </div>
                        <div class="col col-sm-auto">
                            <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#editModal<?= $task['taskid'] ?>">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <?php
            $to_time = strtotime(date("Y-m-d H:i:s"));
            $from_time = strtotime($task['due']);
            $time_remaining = round(abs($to_time - $from_time) / 60, 2) . " minutes";

            $tc_splits = explode(":", $task['tc']);
            $minutes_to_complete = (intval($tc_splits[0]) * 24 * 60) + (intval($tc_splits[1]) * 60) + intval($tc_splits[2]);
            $urgency = $minutes_to_complete / $time_remaining;
            ?>
            <p><i>TODO: visually indicate these metrics (urgency) in the with the card formatting/styling</i></p>
            <p>Time remaining from today until due date (minutes): <?= $time_remaining ?></p>
            <p>Estimated time left needed to spend on task until it is complete (inlcuding % done): <?= $minutes_to_complete ?></p>
            <p>Calculated urgency: <?= $urgency ?></p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editModal<?= $task['taskid'] ?>" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="edittask">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit task:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="taskTitle">Title</label>
                            <input type="text" class="form-control" id="taskTitle" aria-describedby="titleHelp" value="<?= $task['title'] ?>">
                            <small id="titleHelp" class="form-text text-muted">The title for your task.</small>
                        </div>
                        <div class="form-group">
                            <label for="taskDueDate">Due date</label>
                            <input id="taskDueDate" type="date" data-id="datetime">
                        </div>
                        <div class="form-group">
                            <label for="taskEstDays">Est. days to complete:</label>
                            <input type="number" class="form-control" id="taskEstDays" value="<?= $tc_splits['1'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="taskEstHours">Est. hours to complete:</label>
                            <input type="number" class="form-control" id="taskEstHours" value="<?= $tc_splits['1'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="taskEstMinutes">Est. minutes to complete:</label>
                            <input type="number" class="form-control" id="taskEstMinutes" value="<?= $tc_splits['2'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="taskLocation">Location</label>
                            <input type="text" class="form-control" id="taskLocation" value="<?= $task['location'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="taskNotes">Notes</label>
                            <textarea class="form-control" id="taskNotes" rows="3"><?= $task['notes'] ?></textarea>
                        </div>
                        <input type="hidden" id="taskid" value="<?= $task['taskid'] ?>" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php } ?>
