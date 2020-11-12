<!-- 
    ORIGINAL CODE AND MARKUP by Janley Molina
    Derivatives of this code/markup are covered by https://opensource.org/licenses/CDDL-1.0
-->

<?php
include('conn.php');

$task_Name = "'" . $_POST['task_Name'] . "'";
$task_Desc = !empty($_POST['task_Desc']) ? "'" . $_POST['task_Desc'] . "'" : "NULL";
$task_Due = !empty($_POST['task_Due']) ? "'" . $_POST['task_Due'] . "'" : "NULL";
$task_Reminder = !empty($_POST['task_Reminder']) ? "'" . $_POST['task_Reminder'] . "'" : "NULL";
$task_Tags = !empty($_POST['task_Tags']) ? "'" . $_POST['task_Tags'] . "'" : "NULL";
$user_ID = is_numeric($_POST['user_ID']) ? $_POST['user_ID'] : "NULL";

$query = "SELECT task_Name FROM task WHERE task.user_ID=$userID";

if ($conn->query($query)->num_rows > 0) {
    $status = "Failed to add task " . $task_Name . " (possible duplicate).";
} else {
    $query = "INSERT INTO `task` (`task_Name`, `task_Desc`, `task_Due`, `task_Reminder`, `task_Tags`, `user_ID`) VALUES ($task_Name, $task_Desc, $task_Due, $task_Reminder, $task_Tags, $user_ID)";
    if ($conn->query($query)) {
        $status = "Successfully added task " . $task_Name . ".";
    } else {
        $status = "Failed to add task";
    }
}

header('Location:tasks.php?status=' . $status . "&isNotif=true");
