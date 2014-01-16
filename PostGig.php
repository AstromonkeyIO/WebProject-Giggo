<?php

session_start();

include('GiggoConnection.php');
include('GiggoFunctions.php');

$_SESSION['loggedinuserid'] = $_GET['user_id'];
?>



<?php

echo $_SESSION['loggedinuserid'] = $_GET['user_id'];
echo " ";
echo $getuserid = $_POST['idgig'];

if($_POST['submitgig'])
{
    
    $retrievegigcontent = $_POST['gigcontent'];   
    if($retrievegigcontent == "")
    {
        echo "<script type=\"text/javascript\">alert(':( Sorry your review is blank!')</script>";
    }
    else
    {
        //echo $_SESSION['loggedinuserid']; 
        mysql_query("INSERT INTO Gigs VALUES ('','$_SESSION[loggedinuserid]','$_SESSION[loggedinuserusername]','', '$retrievegigcontent')");
        $url = "MainUserPage.php?user_id=".$_SESSION['loggedinuserid'];
        echo $url;
        url_Redirect($url);
        
    }
}

?>

<form action="PostGig.php?user_id=<?php echo $_SESSION['loggedinuserid']; ?>" method="POST">
<p class="title"> Ask Someone To Help You Out? </p>
<textarea class="inputcat" type="text" cols="40" rows="5" name="gigcontent"></textarea>
<br>
<input type="submit" name="submitgig" value="SubmitGig"/>
</form>