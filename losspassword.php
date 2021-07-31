<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Reset Password</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
    $username = mysqli_real_escape_string($con,$username);
    $mobile = stripslashes($_REQUEST['mobile']);
    $mobile = mysqli_real_escape_string($con,$mobile);
    //Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username'
and mobile='".$mobile."'";
    $result = mysqli_query($con,$query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
    
        if($rows){
            $password=rand();
            $query = "UPDATE users SET password='".sha1($password)."' WHERE username='".$username."'";
    $result = mysqli_query($con,$query) or die(mysql_error());
            echo "<div class='form'>
<h3>successfully Update Password.</h3> New password
'".$password."'
<br/>Click here to <a href='login.php'>Login</a></div>";
        }
        else{
           echo "<div class='form'>
<h3>You are Username Not have!.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>"; 
        }
    }else{
?>
<div class="form">
<h1>Reset password</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required />
<input type="mobile" name="mobile" placeholder="Mobile" required />

<input type="submit" name="submit" value="Resetpassword" />
</form>
</div>
<?php } ?>
</body>
</html>