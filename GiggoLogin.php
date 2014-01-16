<?php
    session_start();
    include('GiggoCSS.php');
    include('GiggoFunctions.php');
    include('GiggoConnection.php');
?>

<?php
    //$findloginusername = " ";
    
    if(isset($_POST['submit']))
    {
        
        $findloginusername = $_POST['loginusername'];
        $findloginpassword = $_POST['loginpassword'];
        
        $founduser = attempt_Login($findloginusername , $findloginpassword);
        
        if($founduser)
        {
             //Store current user data into session
             $_SESSION['loggedinuserusername'] = $founduser['username'];
             $_SESSION['loggedinuserid'] = $founduser['id'];
             $_SESSION['loggedinuserphoto'] = $founduser['photo'];
             $_SESSION['loggedinuserskill'] = $founduser['skill'];
             //Directs to main page when user is verified
             $url_userpage = "MainUserPage.php?user_id=$_SESSION[loggedinuserid]";
             url_Redirect($url_userpage);
       
        }
        else
        {
            //When user is not found 
            echo "<script type=\"text/javascript\">alert(':( Sorry you did not put in the right username and password');</script>";
            
        }
        
    }


?>



<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Giggo</title>
    </head>
    <body>
        
       <center>
       <fieldset>

                <legend align ="center"><p class="MainFont">Login User</p></legend>   
                <form action="GiggoLogin.php" method="post"/>
                   <p class="MainFont">Username</p> <br/> 
                   <input type="text" name="loginusername" placeholder="Enter Username" required="required" class="roundrect" value="<?php echo htmlentities($findloginusername); ?>"/> <br/>
                   <p class="MainFont">Password</p> <br/>
                   <input type="password" name="loginpassword" placeholder="Enter Password" required="required" class="roundrect"/> <br/>
                   <br/>
                   <br/>
                   <br/>
                   <input type="submit"  name="submit" value="Login" class="roundbutton">
                </form> 
                
       </fieldset> 
       </center>   

    </body>
</html>
