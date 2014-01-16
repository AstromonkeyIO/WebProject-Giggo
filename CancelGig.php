<?php
    
    session_start();
    include('GiggoConnection.php');

    $ids = $_GET['status_id'];
    $parsedids = explode(" ", $ids);
    $receiver_id = $parsedids[0];
    $sender_id = $parsedids[1];
    $gig_id = $parsedids[2];
    
    mysql_query("DELETE FROM Messages WHERE Sender_Id='".$sender_id."' AND Receiver_Id='".$receiver_id."' AND Gig_Id='".$gig_id."'");

?>
