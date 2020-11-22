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
        <img class="banner" src="/cmsc128/resources/subjects-back.jpg" alt="subjects_banner" width="1110" height="100">
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
                <div class="col-sm-2" align="right">
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
                                    <option selected>Mon</option>
                                    <option>Tue</option>
                                    <option>Wed</option>
                                    <option>Thu</option>
                                    <option>Fri</option>
                                    <option>Sat</option>
                                    <option>Sun</option>
                                </select>
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
            // Hi, this is a query to get subjects, change the user_ID to that of the logged in person
            $user_Name = $_SESSION['user_Name'];
            $user = $conn->query("SELECT * FROM user WHERE user_Name='$user_Name'")->fetch_assoc();
            $user_ID = $user['user_ID'];
            $query = "SELECT * FROM `subject` WHERE `user_ID`=$user_ID ORDER BY `subject_ID` ASC";
            $result = mysqli_query($conn, $query);

            if ($result) {
                //if there are results,
                if (mysqli_num_rows($result) > 0) {

                    //store to array named subjects
                    $inc = 4;
                    while ($subjects = mysqli_fetch_assoc($result)) {
                        //just to check what we are dealing with
                        // print_r($subjects);

                        //this portion of the code was taken from a previous activity last semester
                        $inc = ($inc == 4) ? 1 : $inc + 1;
                        if ($inc == 1) echo "<div class='card-group'>";
            ?>
                        <!--Cards Section-->

                            <!--
                                Adriel here, 16.8 is the precise approximate amount so as the card doesn't overflow its size
                                whilst maintaining its position relative to the center while the card is in a full group of 4. 
                                If you have a better number to be more precise, be my guest
                            -->
                            <div class="card" style="max-width: 16.8rem;">
                                <img class="banner" src="/cmsc128/resources/subjects-card-img.jpg" alt="subjects_banner" height="150">

                                <!--an overly long description can go past this height, so find a way to prevent that-->
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $subjects['subject_Name'] ?></h4>
                                    <!--Change the muted to Time-->
                                    <h5 class="card-subtitle mb-2 text-muted"><?php echo $subjects['subject_Instructor'] ?></h5>
                                    <p class="card-text"><?php echo $subjects['subject_Desc'] ?></p>
                                </div>
                                <div class="card-footer text-right">
                                    <a href="#deleteSubjectModal<?php echo $subjects['subject_ID']; ?>" data-toggle="modal" class="btn btn-danger btn-sm">Delete</a>
                                    <a href="#updateSubjectModal<?php echo $subjects['subject_ID']; ?>" data-toggle="modal" class="btn btn-success btn-sm">Update</a>
                                </div>
                                <!--It had to be put right here for some reason-->
                                <?php include("subject_modal.php"); ?>
                            </div>


            <?php
                        //closes card group if a row gets full
                        if ($inc == 4) echo "</div>";
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