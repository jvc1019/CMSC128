<div id="task_list">
    <?php
    // due today tasks
    $today = date("Y-m-d"); // bug- date does not return current date
    $query = "SELECT * FROM task LEFT JOIN user ON task.user_ID=user.user_ID WHERE task_Due='$today' AND task.user_ID=$user_ID ORDER BY task_Reminder ASC";
    $due_today_tasks = $conn->query($query);

    // incomplete tasks
    $query = "SELECT * FROM task LEFT JOIN user ON task.user_ID=user.user_ID WHERE task_isDone=0 AND task.user_ID=$user_ID ORDER BY $sortBy $sortDir";
    $incomplete_tasks = $conn->query($query);

    // complete tasks
    $query = "SELECT * FROM task LEFT JOIN user ON task.user_ID=user.user_ID WHERE task_isDone=1 AND task.user_ID=$user_ID ORDER BY $sortBy $sortDir";
    $complete_tasks = $conn->query($query);
    ?>
    <!-- DUE TODAY TASKS -->
    <?php
    if (($due_today_tasks->num_rows > 0)) {
    ?>
        <h5>Due today <small class="text-muted">sorted by reminder time</small></h5>
        <ul id="due_today_tasks" class="list-group">
            <?php
            while ($row = $due_today_tasks->fetch_assoc()) {
            ?>
                <li class="list-group-item">
                    <!-- check box | task name and due | edit button | delete button -->
                    <!--     1     |         9        |     1       |      1        -->
                    <div class="row col-12 form-inline">
                        <!-- check box -->
                        <div class="col-sm-1 form-check">
                            <?php
                            if ($row['task_isDone'] == 0) {
                            ?>
                                <input class="checkbox form-check-input" type="checkbox" value=<?php echo $row['task_ID']; ?>>
                            <?php
                            } else {
                            ?>
                                <input class="checkbox form-check-input" type="checkbox" value=<?php echo $row['task_ID']; ?> checked>
                            <?php
                            }
                            ?>
                        </div>
                        <!-- task name and due -->
                        <div class="col-sm-9">
                            <?php
                            if ($row['task_isDone'] == 0) {
                            ?>
                                <h6><?php echo $row['task_Name']; ?></h6>
                            <?php
                            } else {
                            ?>
                                <h6 style='text-decoration: line-through;'><?php echo $row['task_Name']; ?></h6>
                            <?php
                            }
                            ?>
                            <small>
                                <?php if (!empty($row['task_Due'])) { ?>
                                    <!-- calendar icon --> 
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar-date" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                        <path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/>
                                    </svg>  
                                    <?php echo date("D, d M Y", strtotime($row['task_Due'])); ?>
                                <?php }; ?>
                                <?php if (!empty($row['task_Reminder'])) { ?>
                                    <!-- reminder/bell icon -->     
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                                    </svg>
                                    <?php echo date("D, d M Y h:i A", strtotime($row['task_Reminder'])); ?>
                                <?php } ?>
                            </small>
                        </div>

                        <!-- edit and delete button -->
                        <div class="col-sm-2">
                            <a href="#taskdetails<?php echo $row['task_ID']; ?>" data-toggle="modal" class="btn text-primary btn-sm">
                                <!-- info icon?--> 
                                <span>
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                        <circle cx="8" cy="4.5" r="1"/>
                                    </svg>
                                </span>
                                Details
                            </a> 
                            <a href="#taskdelete<?php echo $row['task_ID']; ?>" data-toggle="modal" class="btn text-danger btn-sm">
                                <!-- garbage bin icon-->
                                <span>
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </span> 
                                Delete
                            </a>
                        </div>
                    </div>
                    <?php include('tasks_modal.php'); ?>
                </li>
            <?php
            } ?>
        </ul>
        <br>
        <h5>More tasks</h5>
    <?php
    }
    ?>


    <!-- INCOMPLETE TASKS -->
    <?php
    if (!($incomplete_tasks->num_rows > 0)) {
    ?>
        <h6 class="text-center">☜(ﾟヮﾟ☜) There's nothing around here. You're all set!</h6>
    <?php
    } else { ?>
        <ul id="incomplete_tasks" class="list-group">
            <?php
            while ($row = $incomplete_tasks->fetch_assoc()) {
            ?>
                <li class="list-group-item">
                    <!-- check box | task name and due | edit button | delete button -->
                    <!--     1     |         9        |     1       |      1        -->
                    <div class="row col-12 form-inline">
                        <!-- check box -->
                        <div class="col-sm-1 form-check">
                            <input class="checkbox form-check-input" type="checkbox" value=<?php echo $row['task_ID']; ?>>
                        </div>
                        <!-- task name and due -->
                        <div class="col-sm-9">
                            <h6><?php echo $row['task_Name']; ?></h6>
                            <small>
                                <?php if (!empty($row['task_Due'])) { ?>
                                    <!-- calendar icon --> 
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar-date" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                        <path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/>
                                    </svg>  
                                    <?php echo date("D, d M Y", strtotime($row['task_Due'])); ?>
                                <?php }; ?>
                                <?php if (!empty($row['task_Reminder'])) { ?>
                                    <!-- reminder/bell icon -->     
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                                    </svg>
                                    <?php echo date("D, d M Y h:i A", strtotime($row['task_Reminder'])); ?>
                                <?php } ?>
                            </small>

                            <script>
                                alarms["<?php echo $row['task_Name']; ?>"] = "<?php echo $row['task_Reminder']; ?>";
                            </script>
                        </div>

                        <!-- edit and delete button -->
                        <div class="col-sm-2">
                            <a href="#taskdetails<?php echo $row['task_ID']; ?>" data-toggle="modal" class="btn text-primary btn-sm">
                                <!-- info icon?--> 
                                <span>
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                        <circle cx="8" cy="4.5" r="1"/>
                                    </svg>
                                </span>
                                Details
                            </a> 
                            <a href="#taskdelete<?php echo $row['task_ID']; ?>" data-toggle="modal" class="btn text-danger btn-sm">
                                <!-- garbage bin icon-->
                                <span>
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </span> 
                                Delete
                            </a>
                        </div>
                    </div>
                    <?php include('tasks_modal.php'); ?>
                </li>
            <?php
            } ?>
        </ul>
    <?php
    }
    ?>

    <!-- COMPLETED TASKS -->
    <button id="show_completed_tasks" data-toggle="collapse" data-target="#completed_tasks" class="btn btn-sm text-primary">&#8595; Show completed tasks</button>
    <div id="completed_tasks" class="collapse">
        <?php
        if (!($complete_tasks->num_rows > 0)) {
        ?>
            <h6 class="text-center">(┬┬﹏┬┬) No completed tasks yet.</h6>
        <?php
        } else { ?>
            <ul class="list-group">
                <?php
                while ($row = $complete_tasks->fetch_assoc()) {
                ?>
                    <li class="list-group-item">
                        <!-- check box | task name and due | edit button | delete button -->
                        <!--     1     |         9         |     1       |      1        -->
                        <div class="row col-12 form-inline">
                            <!-- check box -->
                            <div class="col-sm-1 form-check">
                                <input class="checkbox form-check-input" type="checkbox" value=<?php echo $row['task_ID']; ?> checked>
                            </div>
                            <!-- task name and due -->
                            <div class="col-sm-9">
                                <h6 style="text-decoration: line-through;"><?php echo $row['task_Name']; ?></h6>
                                <small>
                                    <?php if (!empty($row['task_Due'])) { ?>
                                        <!-- calendar icon --> 
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar-date" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                            <path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/>
                                        </svg>  
                                        <?php echo date("D, d M Y", strtotime($row['task_Due'])); ?>
                                    <?php }; ?>
                                    <?php if (!empty($row['task_Reminder'])) { ?>
                                        <!-- reminder/bell icon -->     
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                                        </svg>
                                        <?php echo date("D, d M Y h:i A", strtotime($row['task_Reminder'])); ?>
                                    <?php } ?>
                                </small>

                                <script>
                                    alarms["<?php echo $row['task_Name']; ?>"] = "<?php echo $row['task_Reminder']; ?>";
                                </script>
                            </div>
                            <!-- edit and delete button -->
                            <div class="col-sm-2">
                                <a href="#taskdetails<?php echo $row['task_ID']; ?>" data-toggle="modal" class="btn text-primary btn-sm">
                                    <!-- info icon?--> 
                                    <span>
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                            <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                            <circle cx="8" cy="4.5" r="1"/>
                                        </svg>
                                    </span>
                                    Details
                                </a> 
                                <a href="#taskdelete<?php echo $row['task_ID']; ?>" data-toggle="modal" class="btn text-danger btn-sm">
                                    <!-- garbage bin icon-->
                                    <span>
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </span> 
                                    Delete
                                </a>
                            </div>
                        </div>
                        <?php include('tasks_modal.php'); ?>
                    </li>
                <?php
                } ?>
            </ul>
        <?php
        }
        ?>
    </div>
</div>