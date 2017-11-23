<?php

function renderTask($task) { ?>
    <div class="task card mb-5" id="<?= $task['taskid'] ?>">

        <!-- Displays the task's title -->
        <div class="card-header"><?= $task['title'] ?></div>

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
    <?= $task['due'] ?>
                            </p>
                        </div>
                        <div class="col">
                            <p class="card-complete-time-header mb-0">
                                Estimated time to complete:
                            </p>
                            <p class="card-complete-time text-muted mb-0">
    <?= $task['tc'] ?>
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between">
                        <div class="col col-sm-auto">
                            <?php if ($task['completed'] > 0) { ?>
                                <a href="#" class="btn btn-primary">Completed</a>
                            <?php } else { ?>
                                <a href="#" id="markcomplete" class="btn btn-primary">Mark as complete</a>
                            <?php } ?>
                        </div>
                        <div class="col col-sm-auto">
                            <a href="#" class="btn btn-secondary">Edit</a>
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
<?php } ?>
