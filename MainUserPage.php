<?php

session_start();
include('GiggoConnection.php');
include('GiggoCSS.php');
include('GiggoFunctions.php');
$_SESSION['loggedinuserid'] = $_GET['user_id'];


  if($_POST['PostGig']) {
        
        $url_userpage = "PostGig.php?user_id=$_SESSION[loggedinuserid]";
        url_Redirect($url_userpage);
        
    }

?>

<html>
    <head><meta http-equiv="refresh" content="4" > </head>
    <a href="PostGig.php?user_id=<?php echo $_SESSION['loggedinuserid']; ?>">Post Gig </a> 
    <form action="" method="POST">
    <input type="submit" name="PostGig" value="PostGig">
    </form>
    <a href="PickGiggers.php">Pick Giggers</a>
    <script type="text/javascript" src="newjavascript.js"></script>    
</html>


 
<?php


    if($_POST['RespondToGig']) {
        echo "I'm in the function";
        if($_POST['idgig'] == " ")
        {
            echo "it's empty";
        }
        echo $CreatorIdPost = $_GET['idgig'];      
    }

?>


<?php
    $extractgigsfromdatabase = mysql_query("SELECT * FROM Gigs ORDER BY id DESC"); //DESC for descending
    while($displaygig = mysql_fetch_assoc($extractgigsfromdatabase))
    {
     
        $GigId = $displaygig['id'];
        $CreatorId = $displaygig['CreatorId'];
        $CreatorUsername = $displaygig['CreatorUsername'];
        //I'm using this function due to issue with storing image data into a variable
        $CreatorPhoto = userImageFinder($CreatorId);
        $Message = $displaygig['Message'];
        //echo "<div id='div1' style='position: absolute; center: 10px; top:180px;'>";
        
        echo "<center>";
        echo "<p class='MainFont'>";
        // place the photos on the left centered side and the messages on the right side
        echo '<img class="circle" src="data:image/png;base64,' . base64_encode($CreatorPhoto) . '"/ height=50 width=50>';
        echo "   ";
        echo $CreatorUsername;
        echo " :   ";
        echo $Message;
        echo "</p>";
        echo "<br/>";
        //echo "<a href='ratingsystembackend.php?id=$idfood'><button>rate this</button></a> <br/>
        ?>
       
        <form action="MainUserPage.php?user_id='$_SESSION[loggedinuserid]'" method='POST'>
        <input type='hidden' name='idgig' value= <?php echo $GigId; ?>/>
        <input type='hidden' name='idgig' value= <?php echo $CreatorId; ?>/>
        </form>
        <script type="text/javascript" src="newjavascript.js"></script>
        <?php
  
            if(respondToGigStatus($_SESSION['loggedinuserid'], $GigId))
            {
            ?>
                <input type="button" class="roundbutton" onclick="return cancel_gig(this.name);" name="<?php echo $CreatorId . " " . $_SESSION['loggedinuserid'] . " " . $GigId; ?>" value="Cancel">    
            <?php
            }
            else 
            {
                
        ?> 
        <input type="button" class="roundbutton" onclick="return change_status(this.name);" name="<?php echo $CreatorId . " " . $_SESSION['loggedinuserid'] . " " . $GigId; ?>" value="Giggo">    
        <?php   
            
            }
    }
        ?>
        
    <?php
         
         $extractmessagesfromdatabase = mysql_query("SELECT * FROM Messages WHERE Receiver_Id = '$_SESSION[loggedinuserid]'"); //DESC for descending
         while($displaymessages = mysql_fetch_assoc($extractmessagesfromdatabase))
         {
             echo $displaymessages['Sender_Id'];   
             echo "<br/>";
             
         }
         
         echo "</center>";
         
    ?>
        
        
     

<html>
 <script>
    function ApplyForGig(CreatorId){
       alert("worked ");
       document.write(CreatorId);
        //alert(" " + CreatorId);
        //alert("<?php ApplyForGig(); ?>");
    }     
 </script>
  
 <?php
    function AppyForGig()
    {
        echo "Hey man";
        
    }
 ?>

</html>