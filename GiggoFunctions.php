<?php

function url_Redirect($gotothisurl) {
    
    echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$gotothisurl.'">';
    
}

function userImageFinder($userid) {
  
     $processusersfromdatabase = mysql_query("SELECT * FROM Users");
     while($listofusers = mysql_fetch_array($processusersfromdatabase))
     {
 
         if($listofusers['id'] == $userid)
         {
             return $listofusers['photo'];      
         }
             
     }
          
}

function userInfoFinder($userid) {
     
    $processuserfromdatabase = mysql_query("SELECT * FROM Users WHERE id = '$userid'");
    $userfound = mysql_fetch_array($processuserfromdatabase);
    return $userfound;
    
}

function gigInfoFinder($gigid) {
    
    $processgigfromdatabase = mysql_query("SELECT * FROM Gigs");
    while($data =  mysql_fetch_assoc($processgigfromdatabase)) {
        
        if($data['id'] == $gigid)
        {
           return $data; 
        }
        
    }
    
}

function respondToGigStatus($userid, $gigid) {
   
    echo "this is user id : ". $userid . "   this is gig id : ". $gigid;
    $processdata = mysql_query("SELECT * FROM Messages");
    while($g = mysql_fetch_assoc($processdata)) {
        if($g['Sender_Id'] == $userid && $g['Gig_Id'] == $gigid)
        {
            return true;
        }     
    }
    return false;   
}


function attempt_Login($findusername , $findpassword) {
    

    $processusersfromdatabase = mysql_query("SELECT * FROM Users");
    $userfound = false;
    
  
    while($listofusers = mysql_fetch_array($processusersfromdatabase))
    {
    
      if($listofusers['username'] == $findusername && $listofusers['password'] == $findpassword)
      {
          $userfound = true;
          return $listofusers;
      }
    
    
    }
    
    if($userfound == false)
    {
        return null; 
    }
    
    
}



?>
