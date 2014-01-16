<?php

    session_start();
    include('GiggoConnection.php');

    $ids = $_GET['status_id'];
    $parsedids = explode(" ", $ids);
    $gig_id = $parsedids[0];
    $sender_id = $parsedids[1];
    $receiver_id = $parsedids[2];

    

?>
