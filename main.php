<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta charset="utf-860">
</head>
<Body>
<div id="main">
<?php
if(!empty($_POST['username']) && !empty($_POST['password']))
{
    $username = mysql_real_escape_string($_POST['username']);
    $email = mysql_real_escape_string($_POST['email']);
     
     $checkusername = mysql_query("SELECT * FROM users WHERE Username = '".$username."'");
      
     if(mysql_num_rows($checkusername) == 1)
     {
        echo "<h1>Error</h1>";
        echo "<p>Sorry, that username is taken. Please go back and try again.</p>";
     }
     else
     {
        $registerquery = mysql_query("INSERT INTO users (Username, Password, EmailAddress) VALUES('".$username."', '".$email."')");
        if($registerquery)
        {
            echo "<h1>Success</h1>";
            echo "<p>Your account was successfully created. Please <a href=../"zap.php">click here to login</a>.</p>";
        }
        else
        {
            echo "<h1>Error</h1>";
            echo "<p>Sorry, your registration failed. Please go back and try again.</p>";    
        }       
     }
}
else
{
   ?>  
   <h1 align="center">Power</h1>
     
   <p>Please enter your data so we can contact you.</p>
     
    <form method="post" action="register.php" name="registerform" id="registerform">
    <fieldset>
        <label for="username">Username:</label><input type="text" name="username" id="username" /><br />
        <label for="email">Email Address:</label><input type="text" name="email" id="email" /><br />
    </fieldset>
	<p> Services <br>
        <input type="radio" name="tip" value="Indi"> New post <br> 
        <input type="radio" name="tip" value="Indi"> Ukrpochta <br>
        <input type="radio" name="tip" value="Indi"> It by express delivery <br>
        <input type="radio" name="tip" value="Indi"> Trucking <br>
        <input type="radio" name="tip" value=""> Other <br>
        <input type="text"  name="tip" value=""><br> 
       </p>
       <p> Response <br>
         <textarea cols="50" rows="9" name="Відправити">
         </textarea>
         </p>
       <p>
         <input type="reset" value="Видалити">
         <input type="submit" name="Send" id="Send" value="Відправити" />		 
        </p>
    </form>
<?php
}
?>

</div>
</body>
</html>
 