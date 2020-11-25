<!--php file responsible for adding, editing, maintaining and deleting subjects-->
<!--To be worked on by Mico and Jett-->
<?php
include("header.php");
include("user_details.php");
include("notification.php");
?>

<body>

    <!-- navigation bar -->
    <?php include('navbar.php'); ?>
    <div class="container">
        <div class="alert alert-light shadow sticky-top">
            <div class="row form-inline">
                <div class="col-sm-2">
                    <h3 class="text-primary text-center">Subjects</h3>
                </div>
                <h5 class="text-secondary text-center">Sort by:</h5>
                <div class="col-sm-7">
                    <select id="sortBy" class="btn btn-sm">
                        <?php
                        $value = isset($_GET['sortBy']) ? $_GET['sortBy'] : 0;
                        if ($value == 0) {
                        ?>
                            <option selected value='0'>Type</option>
                            <option value="1">Name</option>
                            <option value="2">Day</option>
                        <?php
                        } elseif ($value == 1) {
                        ?>
                            <option value='0'>Type</option>
                            <option selected value="1">Name</option>
                            <option value="2">Day</option>
                        <?php
                        } elseif ($value == 2) {
                        ?>
                            <option value='0'>Type</option>
                            <option value="1">Name</option>
                            <option selected value="2">Day</option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <!-- New Subject button -->
                <div class="col-sm-2">
                    <button href="#" data-toggle="modal" data-target="#addSubjectModal" class="btn btn-sm btn-primary btn-block">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg>
                        New Subject
                    </button>
                </div>
            </div>
        </div>
        <!--Modal Area-->

        <!--Add subject modal-->
        <div class="modal fade" id="addSubjectModal">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                        <h4>Add Subject</h4>
                    </div>
                    <!--Body-->
                    <div class="modal-body">
                        <form method="POST" action="subjects_add.php">
                            <div class="form-group">
                                <label for="addSubjectName">Subject Name</label>
                                <input type="text" class="form-control form-control-sm" id="addSubjectName" name="subjectName" required>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="subjectType" id="addLecture" value="Lecture" checked>
                                <label class="form-check-label" for="addLecture">Lecture</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="subjectType" id="addLaboratory" value="Laboratory">
                                <label class="form-check-label" for="addLaboratory">Laboratory</label>
                            </div>
                            <div style="height: 10px;">
                                <!--space-->
                            </div>
                            <div class="form-group">
                                <label for="addSubjectInstructor">Instructor</label>
                                <input type="text" class="form-control form-control-sm" id="addSubjectInstructor" name="subjectInstructor">
                            </div>
                            <div class="form-group">
                                <label for="addSubjectDesc">Description</label>
                                <textarea class="form-control" id="addSubjectDesc" rows="2" name="subjectDesc"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="addSubjectDay">Day of the Week</label>
                                <select id="addSubjectDay" class="form-control form-control-sm" name="subjectDay">
                                    <option selected>Monday</option>
                                    <option>Tuesday</option>
                                    <option>Wednesday</option>
                                    <option>Thursday</option>
                                    <option>Friday</option>
                                    <option>Saturday</option>
                                    <option>Sunday</option>
                                </select>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label for="addSubjectTimeStart">Time Start:</label>
                                    <input class="form-control form-control-sm" id="addSubjectTimeStart" type="time" name="subjectTimeStart">
                                </div>
                                <div class="col">
                                    <label for="addSubjectTimeEnd">Time End:</label>
                                    <input class="form-control form-control-sm" id="addSubjectTimeEnd" type="time" name="subjectTimeEnd">
                                </div>
                            </div>
                            <input type="text" name="user_ID" value=<?php echo $user_ID; ?> hidden>

                    </div>
                    <!--Footer-->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add Subject</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <div class="shadow-none p-3 mb-8 bg-light rounded">
            <?php
            // Hi, this is a query to get subjects
            $user_Name = $_SESSION['user_Name'];
            $user = $conn->query("SELECT * FROM user WHERE user_Name='$user_Name'")->fetch_assoc();

            //fix this line, there is already something for this @ user_details
            $user_ID = $user['user_ID'];

            // $subjects = "SELECT * FROM `subject` WHERE `user_ID`=$user_ID ORDER BY `subject_ID` ASC";
            // $result = mysqli_query($conn, $query);

            //The one you see above is an old version, delete that soon
            $subjects = "SELECT * FROM `subject` WHERE `user_ID`=$user_ID ORDER BY `subject_ID` ASC";
            $result = $conn->query($subjects);

            if ($result) {
                //if there are results,
                if (mysqli_num_rows($result) > 0) {

                    //store to array named subjects
                    $inc = 4;
                    while ($subjects = mysqli_fetch_assoc($result)) {

                        //this portion of the code was similar to the activity last semester
                        $inc = ($inc == 4) ? 1 : $inc + 1;
                        if ($inc == 1) echo "<div class='card-group'>";
            ?>
                        <!--Cards Section-->

                        <!--
                                Adriel here, through trial and error 16.8rem is the precise approximate amount so as the card 
                                doesn't overflow its size in width whilst maintaining its position relative to the center of 
                                the screen while they are in a full group of 4. If you have a better number to be more precise,
                                then be my guest
                            -->
                        <div class="card" style="max-width: 16.8rem;">

                            <!--
                                Replaced it for a little while, change it back
                                Will provide different alternative pics to choose from
                             -->
                            <img class="banner" src="/cmsc128/resources/subjects-back.jpg" alt="subjects_banner" height="150">

                            <!--an overly long description can go past this height, so find a way to prevent that-->
                            <div class="card-body">
                                <h3 class="card-title"><?php echo $subjects['subject_Name'] ?>: <?php echo $subjects['subject_Type'] ?></h3>
                                <!--Change the muted to Time-->
                                <p class="card-subtitle mb-2 text-muted"><?php echo $subjects['subject_Instructor'] ?></p>
                                <p class="card-text"><?php echo $subjects['subject_Desc'] ?></p>
                                <!--This formats the time into AM and PM and also removes the seconds-->
                                <p class="card-subtitle mb-2 text-muted"><?php echo date('g:ia', strtotime($subjects['subject_Time_Start'])); ?> - <?php echo date('g:ia', strtotime($subjects['subject_Time_End'])); ?></p>

                            </div>
                            <div class="card-footer">
                                <div class="row form-inline">
                                    <div class="col-sm-4">
                                        <h7 class="text-secondary text-center"><?php echo $subjects['subject_Day'] ?></h7>
                                    </div>
                                    <a href="#deleteSubjectModal<?php echo $subjects['subject_ID']; ?>" data-toggle="modal" class="btn btn-sm text-danger margin-left">
                                        <span>
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z" />
                                                <circle cx="8" cy="4.5" r="1" />
                                            </svg>
                                        </span>
                                        Delete
                                    </a>
                                    <a href="#detailsSubjectModal<?php echo $subjects['subject_ID']; ?>" data-toggle="modal" class="btn btn-sm text-primary">
                                        <span>
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                            </svg>
                                        </span>
                                        Details
                                    </a>
                                </div>
                            </div>
                            <!--It had to be put right here for some reason-->
                            <?php include("subject_modal.php"); ?>
                        </div>


            <?php
                        //closes card group if a row gets full, also adds some space, remove <br> if need be
                        if ($inc == 4) echo "</div><br>";
                        //end of while
                    }

                    //since the card group doesn't close at all if it doesn't get full, we have this if statemenet on the ready
                    //this is positioned right after the end of while since that's the point where subjects are done being displayed
                    if ($inc != 4) echo "</div>";

                    //end of if (mysqli_num_rows($result)>0){
                } else {

                    //format this in a pleasing way, for now its is like this for functionality
                    echo "No subjects to diplsay";
                }

                //end of if ($result){
            }

            ?>
        </div>
    </div>
    <script>
        // Enable all tooltips
        $(function() {
            $("[data-toggle='tooltip']").tooltip()
        })
    </script>
</body>