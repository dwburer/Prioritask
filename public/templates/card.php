<?php function renderTask ($task) { ?>
    <div class="card">

        <!-- Displays the task's title -->
        <div class="card-header"><?=$task['title']?></div>

        <div class="card-block">
            <div class="container-fluid">
            <div class="row">
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
                <div class="col">
                    <!-- Text for the card -->
                    <div class="row col">
                        <p><?=$task['notes']?></p>
                    </div>

                    <div class="row">
                        <!-- Display the time information for the card -->
                        <div class="col">
                            <p class="card-due-on-header mb-0">
                                Due on:
                            </p>
                            <p class="card-due-on text-muted mb-0">
                                <?=$task['due']?>
                            </p>
                        </div>
                        <div class="col">
                            <p class="card-complete-time-header mb-0">
                                Time to complete:
                            </p>
                            <p class="card-complete-time text-muted mb-0">
                                <?=$task['tc']?>
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between">
                        <div class="col col-sm-auto">
                            <a href="#" class="btn btn-primary">Mark as complete</a>
                        </div>
                        <div class="col col-sm-auto">
                            <a href="#" class="btn btn-secondary">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="card-footer text-muted"></div>
    </div>
<?php } ?>
