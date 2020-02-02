<?php 
    ob_start();
    session_start();
    
    # connects database to local timezone
    $timezone = date_default_timezone_set("America/New_York");
    # connects to server with username, password, and databse name
    $con = mysqli_connect("localhost","root","","slotify");
    if(mysqli_connect_errno()) {
        echo "Fail to connect: " . mysqli_connect_errno();
    }

?>