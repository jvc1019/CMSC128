<!--php file responsible for adding, editing, maintaining and deleting subjects-->
<!--To be worked on by Mico and Jett-->
<?php 
        include("header.php");
        // include("user_details.php");
?>
<body>

    <div class="container">


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

        <!--This is only temporary--> 
        <a href="#" data-toggle="modal" data-target="#addSubjectModal">Add Subject</a>
        <br>
    <?php
        
        // Hi, this is a query to get subjects, change the user_ID to that of the logged in person
        $query = "SELECT * FROM `subject` WHERE `user_ID`=003 ORDER BY `subject_ID` ASC";
        $result = mysqli_query($conn, $query);

        if ($result){
            //if there are results,
            if (mysqli_num_rows($result)>0){
            
                //store to array named subjects
                $inc=4;
                while ($subjects = mysqli_fetch_assoc($result)){
                    //just to check what we are dealing with
                    // print_r($subjects);

                    //this portion of the code was taken from a previous activity last semester
                    $inc = ($inc == 4) ? 1 : $inc + 1;
                    if($inc == 1) echo "<div class='row'>";
    ?>
                    <!--Cards Section-->
                    <div class="col-md-3">
                        <div class="card" style="width: 16rem;">
                            <img class="card-img-top" src="img/something.jpg" alt="Image here/Maybe emoji">
                            
                            <!--an overly long description can go past this height, so find a way to prevent that-->
                            <div class="card-body" style="height: 15rem;">
                                <h4 class="card-title"><?php echo $subjects['subject_Name']?></h4>
                                <!--Change the muted to Time-->
                                <h5 class="card-subtitle mb-2 text-muted"><?php echo $subjects['subject_Instructor']?></h5>
                                <p class="card-text"><?php echo $subjects['subject_Desc']?></p>

                            </div>
                        
                        
                        </div>
                    
                    </div>
                    
    <?php
                if($inc == 4) echo "</div>";
                //end of while
                }

                //aligns the cards together by creating empty divs that take up space
                if($inc == 1) echo "<div class='col-md-3'></div><div class='col-md-3'></div><div class='col-md-3'></div></div>"; 
                if($inc == 2) echo "<div class='col-md-3'></div><div class='col-md-3'></div></div>"; 
                if($inc == 3) echo "<div class='col-md-3'></div></div>"; 

            //end of if (mysqli_num_rows($result)>0){
            }

            else{
                //format this in a pleasing way, for now its is like this for functionality
                echo "No subjects to diplsay";
            }

        //end of if ($result){
        }

    ?>

</body>
