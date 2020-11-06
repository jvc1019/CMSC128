<!-- 
    A GENERAL PURPOSE NOTIFICATION THAT YOU CAN IMPLEMENT ANYWHERE ON YOUR PAGE 
    by Janley Molina
-->

<!-- 
To use, simply redirect to the target page with a 'status' GET value 

Arguments:
status_heading - (optional) a string containing the heading of the notification (shown in boldface)
status - a string containing the notification message
isNotif - (optional) either true or false, determines if the notification tone should play
isAlarm - (optional) either true or false, determines if the alarm tone should play
Note: Do not set both isAlarm and isNotif as true!

-- The alarm tone will play
    1. isAlarm=true&isNotif=false              
    2. isAlarm=true
-- The notif tone will play
    1. isAlarm=false&isNotif=true     
    2. isAlarm=false
-- No sound will play
    1. isAlarm=false&isNotif=false
    2. both are not included
              
+------------------------------------+
| This is a status heading         x |
| This is a status text              |    
+------------------------------------+

Examples:
Notification: 
    tasks.php?status_heading=This is a status heading&status=This is a status text&isNotif=true
Alarm: 
    tasks.php?status_heading=This is a status heading&status=This is a status text&isAlarm=true

-->

<!-- A Bootstrap alert -->
<?php if (!empty($_GET['status'])) { ?>
    <link href="css/notification.css" rel="stylesheet">

    <div id="notification" class="alert alert-light shadow alert-dismissible fade show position-fixed border-dark" role="alert">
        <?php if (!empty($_GET['status_heading'])) { ?>
            <h6 class="alert-heading text-primary">
                <?php echo $_GET['status_heading']; ?>
            </h6>
        <?php
        }
        ?>
        <small class="text-dark"><?php echo $_GET['status']; ?></small>
        <button id="close_notification" type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

<?php
}
?>

<script>
    if ($("#notification").length) {
        const isNotif = "<?php
                            if (!empty($_GET['isNotif'])) {
                                echo $_GET['isNotif'];
                            } else {
                                echo 'false';
                            } ?>";
        const isAlarm = "<?php
                            if (!empty($_GET['isAlarm'])) {
                                echo $_GET['isAlarm'];
                            } else {
                                echo 'false';
                            } ?>";

        // if notification is an alarm, play a sound effect
        if (isAlarm === "true") {
            var sound = new Audio("../resources/alarm.ogg");
            sound.loop = true;
            sound.play();

            $("#close_notification").click(function() {
                sound.pause();
                sound.currentTime = 0;
            });
        } else {
            // destroy notification after 4.5 seconds if it's not an alarm
            if (isNotif === "true") {
                var sound = new Audio("../resources/notification.ogg");
                sound.play();
            }

            setTimeout(function(e) {
                $("#notification").alert("close");
            }, 4500);
        }

        if (window.history.replaceState) {
            // prevents browser from storing history with each change
            // hides the GET value of notifications
            window.history.replaceState(null, "", window.location.href.split(/[?#]/)[0]);
        }
    }
</script>