<?php
include('header.php');
include('user_details.php');
?>

<body>
    <!-- navigation bar -->
    <?php include('sidebar.php'); ?>
    <div class="container-fluid with-sidebar" id="main">
        <div class="alert alert-light shadow sticky-top" role="alert">
            <!-- sort by | sort direction | search box | add new note -->
            <!--    2    |       4        |      4     |       2      -->
            <div class="row form-inline">
                <div class="col-sm-2">
                    <h3 class="text-primary text-center">Notebook</h3>
                </div>
                <div class="col-sm-1 text-center">Sort by: </div>
                <!-- Sort by and sort direction -->
                <div class="col-sm-3">
                    <select id="sortDir" class="btn btn-sm">
                        <?php
                        $value = isset($_GET['sortDir']) ? $_GET['sortDir'] : 0;
                        if ($value == 0) {
                        ?>
                            <option selected value="0">Ascending</option>
                            <option value='1'>Descending</option>
                        <?php
                        } elseif ($value == 1) {
                        ?>
                            <option value="0">Ascending</option>
                            <option selected value="1">Descending</option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <!-- Search box -->
                <div class="col-sm-4 input-group">
                    <input type="text" class="form-control text-truncate border-primary border-top-0 border-left-0 border-right-0 rounded-0" id="search" autocomplete="off" placeholder="Search notes by name...">
                    <div class="input-group-append">
                        <button id="search_clear" class="btn border-primary border-top-0 border-left-0 border-right-0 rounded-0" data-toggle="tooltip" title="Clear search">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <!-- New Note button -->
                <div class="col-sm-2">
                    <a href="#" data-toggle="modal" data-target="#addNoteModal" class="btn btn-sm btn-primary btn-block">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg>
                        New Note
                    </a>
                </div>
            </div>
        </div>
        <!-- show last status message as a Boostrap alert -->
        <?php include('notification.php'); ?>
        <!-- Show last status as a bootstrap alert -->

        <div id="output"></div>
        <div id="display"> <?php include('notes_list.php'); ?> </div>

    </div>

    <!-- MODAL -->
    <?php include("notes_modal.php"); ?>

    <script>
        $(document).ready(function() {
            // clears the search box 
            $("#search_clear").on('click', function(e) {
                $("#search").val("");
            });
        });

        function fill(Value) {
            $('#search').val(Value);
            $('#display').hide();
        }
        $(document).ready(function() {
            //On pressing a key on search box. This function will be called.
            $("#search").keyup(function() {
                var name = $('#search').val();
                if (name == "") {
                    $.ajax({
                        type: "POST",
                        url: "notes_list.php",
                        data: {
                            search: name
                        },
                        success: function(html) {
                            $("#display").html(html).show();
                        }
                    });
                } else {
                    $.ajax({
                        type: "POST",
                        url: "notes_search.php",
                        data: {
                            search: name
                        },
                        success: function(html) {
                            $("#display").html(html).show();
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>