<?php
    session_start();
    include('GiggoConnection.php');
    include('GiggoFunctions.php');
    include('GiggoCSS.php');
    
    echo "loggedinuserid ".$_SESSION[loggedinuserid]; 
    $temp = $_SESSION[loggedinuserid]; 
    //I'm retreiving all the gig ids so that I can sort them
    $gigids = array();
    $extractgigidsfromdatabase = mysql_query("SELECT * FROM Messages WHERE Receiver_Id = '$temp'");
    while($storegigids = mysql_fetch_assoc($extractgigidsfromdatabase))
    {
        $gigids[] = $storegigids['Gig_Id'];
    }
    
    $gigidswithnoduplicates = array_unique($gigids); //removing duplicate ids in the array
    //print_r($gigidswithnoduplicates);
    $sizeofgigidswithnoduplicates = sizeof($gigidswithnoduplicates);
    
    $extractmessagesfromdatabase = mysql_query("SELECT * FROM Messages WHERE Receiver_Id = '$_SESSION[loggedinuserid]'"); //DESC for descending
    
    while($data = mysql_fetch_assoc($extractmessagesfromdatabase)) {
        
        $displaymessages[] = $data;
        
    }
    
    $iterator = new RecursiveIteratorIterator(new RecursiveArrayIterator($displaymessages));
     
    for($i = 0; $i <= sizeof($gigidswithnoduplicates); $i++)
    {
        
        foreach($iterator as $key=>$value) {
            
            if($key == "Gig_Id" && $value == $gigidswithnoduplicates[$i])
            {
                
                $processgigfromdatabase = mysql_query("SELECT * FROM Gigs WHERE id = '$gigidswithnoduplicates[$i]'");
                $g = mysql_fetch_assoc($processgigfromdatabase);
                echo "<br/>";
                
                $senderdata = mysql_query("SELECT * FROM Messages WHERE Gig_Id = '$gigidswithnoduplicates[$i]'");
                while($displaysender = mysql_fetch_assoc($senderdata))
                {
                    $displayuser = userInfoFinder($displaysender['Sender_Id']);
                    echo $displayuser['username'];
                    echo "<br/>";
                    
                }
        
                echo " replied in response to ";
                echo "Gig id" . $g['id'];
                $tempgigid = $g['id'];
                echo "    ". $g['Message'];
                ?>
                
                <script type="text/javascript" src="newjavascript.js"></script>
                <input type="button" class="roundbutton" onclick="return change_status(this.name);" name="<?php echo $g['id'] . " " . $_SESSION['loggedinuserid'] . " " . $displayuser['id']; ?>" value="Giggo">      

                <?php
                
                echo "<br/>";
                echo "<br/>";
               
            }
    
        }
        
        echo "<br/>"; 
        echo "<br/>";
    }
    
    
    
    
    /*
    while($displaymessages = mysql_fetch_assoc($extractmessagesfromdatabase))
    {
             //echo $displaymessages['Sender_Id'];
             
             for($i = 0; $i < $sizeofgigidswithnoduplicates; $i++)
             {
                 
                if($displaymessages['Gig_Id'] == $gigidswithnoduplicates[$i])
                {
                    
                    echo "<br/>";
                    echo $displaymessages['Gig_Id'] ." ";
                    $displaysenderinfo = userInfoFinder($displaymessages['Sender_Id']);
                    echo $displaysenderinfo['id'];
                    echo $displaysenderinfo['username'];
                    echo "<br/>";
                    echo " replied in response to gig: ";
                    echo "Gig id" . $displaymessages['Gig_Id'];
                    $displaygiginfo = gigInfoFinder($displaymessages['Gig_Id']);
                    echo "     " .$displaygiginfo['Message'];
                    echo "<br/>";
                
                
                }
             
             }
             
     }
     * 
     */
    
    


?>
