<?php

    session_start();
    include('GiggoConnection.php');

    $ids = $_GET['status_id'];
    $parsedids = explode(" ", $ids);
    $receiver_id = $parsedids[0];
    $sender_id = $parsedids[1];
    $gig_id = $parsedids[2];
    
    mysql_query("INSERT INTO Messages VALUES ('','$sender_id','$receiver_id','$gig_id')");

?>
